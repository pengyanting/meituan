<template>
    <div style='background:#fff;'>
        <div>
            <mt-header fixed>
                <span slot="left">我的</span>
                <router-link to='' slot='right' class='mui-icon mui-icon-chat'></router-link>
                <router-link to='/my/setting' slot="right" class='mui-icon mui-icon-gear'></router-link>
            </mt-header>
            <div style="margin-top: 40px;" class='myLogin'>
                <mt-cell to="/my/accountSafe" is-link>
                    <div style="margin-left: 10px;" v-if='$store.state.loginType'>
                        <h4 class="title">哈哈哈哈</h4>
                        <span class="desc">{{phone}}</span>
                    </div>
                    <div style="margin-left: 10px;" v-else>
                        <h4 class="title">立即登录</h4>
                        <span class="desc">登陆后可享受更多特权</span>
                    </div>
                    <img slot="icon" src="../../assets/images/my-head.png" width="50" height="50">
                </mt-cell>
            </div>
            <section class='myItems clearfix'>
                <div v-for="item in myItems" :key="item" @click='clickItems(item)'>
                    <p v-if='$store.state.loginType' :class='{"greenColor":item.title=="积分","redColor":item.title=="优惠","orangeColor":item.title=="余额"}'>
                        {{item.value}}{{item.desc}}
                    </p>
                    <img :src="item.icon" alt="" v-else>
                    <span>{{item.title}}</span>
                </div>
            </section>
            <div class="space"></div>
            <section>
                <mt-cell v-for='item in myList' :title="item.title" :key='item' :to="item.links">
                    <img slot="icon" :src="item.icon" width="20" height="20">
                </mt-cell>
            </section>
            <FootBottom title='我的'></FootBottom>
        </div>
    </div>
</template>
<script>
import FootBottom from '../../components/FootBottom.vue'
export default {
    data() {
        return {
            phone: '',
            myItems: [
                {
                    title: '余额',
                    icon: require('../../assets/images/my-icon1.png'),
                    value: 123.5,
                    desc: '元'
                }, {
                    title: '优惠',
                    icon: require('../../assets/images/my-icon2.png'),
                    value: 0,
                    desc: '个'
                }, {
                    title: '积分',
                    icon: require('../../assets/images/my-icon3.png'),
                    value: 0,
                    desc: '分'
                }
            ],
            myList: [
                {
                    title: '收货地址',
                    icon: require('../../assets/images/my-left-icon1.png'),
                    links: '/my/address/addressList'
                }, {
                    title: '我的收藏',
                    icon: require('../../assets/images/my-left-icon2.png'),
                    links: '/my/collection/collection'
                }, {
                    title: '积分商城',
                    icon: require('../../assets/images/my-left-icon3.png')
                }, {
                    title: '饿了么会员卡',
                    icon: require('../../assets/images/my-left-icon4.png')
                }, {
                    title: '服务中心',
                    icon: require('../../assets/images/my-left-icon5.png')
                }, {
                    title: '欢迎评分',
                    icon: require('../../assets/images/my-left-icon6.png')
                }
            ]
        }
    },
    methods: {
        clickItems(item) {
            switch (item.title) {
                case '余额':
                    this.$router.push({ 'path': '/my/wallet/myWallet' });
                    break;
                case '优惠':
                    this.$router.push({ 'path': '/my/preferential' })
                    break;
                case '积分':
                    break;
                default:
                    break;
            }
        }
    },
    mounted() {
        this.$store.dispatch('LOGIN_TYPE', localStorage.getItem('phone'));
        this.phone = localStorage.getItem('phone');
    },
    components: {
        FootBottom
    }
}

</script>
<style lang='sass' scoped>
 .mui-icon-chat{
    font-size:18px;
    margin-right:10px;
}
</style>

<style lang="sass">
    @import "../../assets/scss/common.scss";
    .myLogin {
        .mint-cell:last-child {
            background-image: none!important;
        }
        .mint-cell-wrapper {
            background-image: none!important;
            padding: 10px 10px 20px 10px;
        }
        .mint-cell {
            background: $color;
        }
        .mint-cell-title {
            -webkit-box-flex: none;
            -ms-flex: none;
            flex: none;
        }
        .title {
            color: #fff;
            margin: 5px 0;
        }
        .desc {
            color: #fff;
            font-size: 14px;
        }
        .mint-cell-allow-right::after {
            border: solid 2px #fff;
            border-bottom-width: 0;
            border-left-width: 0;
            content: " ";
            top: 50%;
            right: 20px;
            position: absolute;
            width: 10px;
            height: 10px;
            -webkit-transform: translateY(-50%) rotate(45deg);
            transform: translateY(-50%) rotate(45deg);
        }
    }
    
    .myItems {
        div {
            width: 33.333%;
            float: left;
            border-right: 1px solid $bordercolor;
            padding: 10px 0;
            img {
                display: block;
                margin: 0 auto 5px;
                width: 30px;
            }
            span {
                display: block;
                text-align: center;
                font-size: 12px;
            }
            p {
                text-align: center;
                margin-bottom: 5px;
                font-size:14px;
            }
        }
        div:last-child {
            border: none;
        }
        .orangeColor {
            color: #ff9900;
        }
        .redColor {
            color: #ff5d37;
        }
        .greenColor {
            color: #67c107;
        }
    }
    
    .router-slid-enter-active,
    .router-slid-leave-active {
        transition: all .4s;
    }
    
    .router-slid-enter,
    .router-slid-leave-active {
        transform: translate3d(2rem, 0, 0);
        opacity: 0;
    }
</style>