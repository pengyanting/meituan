<template>
    <div>
        <mt-header fixed>
            <mt-button icon="back" slot='left' @click='handleBack'>账户与安全</mt-button>
        </mt-header>
        <div class='space' style="margin-top: 40px;"></div>
        <section>
            <div @click='updateHead'>
                <mt-cell title='头像'>
                    <img :src="imgUrl" width="40" height="40">
                </mt-cell>
            </div>
            <router-link :to="{path:'/my/accountSafe/updateUserName',query:{id:userInfo.id}}">
                <mt-cell title='用户名'>
                    <span>{{userInfo.name}}</span>
                </mt-cell>
            </router-link>
        </section>
        <div class='space'></div>
        <section>
            <mt-cell title='账号绑定'></mt-cell>
            <mt-cell title='手机' to="/my/accountSafe/bindMobile" v-if='!userInfo.phone'>
                <img slot="icon" src="../../assets/images/phone.png" width="24" height="24">
                <span class='weibangding'>未绑定</span>
            </mt-cell>
            <div v-else>
                <mt-cell title='手机'>
                    <img slot="icon" src="../../assets/images/phone.png" width="24" height="24">
                    <span>{{formdataPhone(userInfo.phone)}}</span>
                </mt-cell>
            </div>
            <mt-cell title='微信'>
                <img slot="icon" src="../../assets/images/weixin.png" width="24" height="24">
                <span class='weibangding'>未绑定</span>
            </mt-cell>
            <mt-cell title='QQ'>
                <img slot="icon" src="../../assets/images/qq.png" width="24" height="24">
                <span class='weibangding'>未绑定</span>
            </mt-cell>
            <mt-cell title='微博'>
                <img slot="icon" src="../../assets/images/weibo.png" width="24" height="24">
                <span class='weibangding'>未绑定</span>
            </mt-cell>
            <mt-cell title='淘宝'>
                <img slot="icon" src="../../assets/images/taobao.png" width="24" height="24">
                <span class='weibangding'>未绑定</span>
            </mt-cell>
        </section>
        <div class='space'></div>
        <section>
            <mt-cell title='安全设置'></mt-cell>
            <mt-cell title='登录密码' to='/my/accountSafe/updatePwd'>
                <span class='weibangding'>修改</span>
            </mt-cell>
            <mt-cell title='支付密码'>
                <span class='weibangding'>未设置</span>
            </mt-cell>
            <mt-cell title='小额免密支付'></mt-cell>
        </section>
        <input type="file" accept="image/*">
        <!--弹框-->
        <div class='maskBox' v-if='head' @touchmove='maskMove' @click.self='maskHide'>
            <div class='maskInner'>
                <div>
                    <h3>上传头像</h3>
                    <ul>
                        <li @click='captureImage'>拍照</li>
                        <li>从手机相册选择</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { getUser } from '../../service/getData.js'
import myjs from '../../libs/js/myjs.js'
export default {
    data() {
        return {
            username: '',
            userInfo: {},
            head: false,
            imgUrl: require('../../assets/images/my-head.png')
        }
    },
    mounted() {

    },
    created() {
        var vm = this;
        getUser({
            phone: localStorage.getItem('phone')
        }, res => {
            if (res.data.code == 0) {
                vm.userInfo = res.data.result
            }
        })
    },
    beforeRouteLeave(to, from, next) {
        //用户名只能修改一次逻辑
        if (to.path == '/my/accountSafe/updateUserName') {
            if (this.userInfo.isUpdateName == 1) { return; }
        }
        next();
    },
    methods: {
        handleBack() {
            this.$store.dispatch("SELECT_TYPE", '我的');
            this.$router.push({ path: '/' });
        },
        updateHead(e) {
            this.head = true;
        },
        maskMove(e) {
            //阻止浏览器默认行为
            e.preventDefault();
        },
        maskHide() {
            this.head = false;
        },
        captureImage() {
            var cmr = plus.camera.getCamera();
            var res = cmr.supportedImageResolutions[0];
            var fmt = cmr.supportedImageFormats[0];
            var vm = this;
            cmr.captureImage(function (path) {
                vm.imgUrl = path;
                // alert("Capture image success: " + path);
            },
                function (error) {
                    alert("Capture image failed: " + error.message);
                },
                { resolution: res, format: fmt }
            );
        },
        formdataPhone(phone) {

            return phone ? myjs.str.replaceStr(phone, [3, 5, 3], 0) : ''
        }
    }
}

</script>
<style lang='sass'>
    .weibangding {
        color: #368ed8;
    }
    a{
        color: #333;
    }
    .maskBox {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 40;
        background: rgba(0, 0, 0, .5);
        z-index: 300;
        .maskInner {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            padding: 3rem;
            background: #fff;
            border-radius: 5px;
            width: 28rem;
            height: 15rem;
            box-sizing: border-box;
            z-index: 301;
            h3 {
                font-size: 18px;
            }
            ul {
                padding: 0;
                margin: 10px 0 0 0;
                li {
                    font-size: 14px;
                    color: #737373;
                    line-height: 35px;
                }
            }
        }
    }
</style>