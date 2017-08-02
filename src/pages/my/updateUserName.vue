<template>
    <div style='background: #f5f5f5;width: 100%;height:100%;'>
        <mt-header fixed>
            <mt-button icon="back" slot='left' @click='handleBack'>用户名</mt-button>
        </mt-header>
        <div class='space' style="margin-top: 40px;"></div>
        <div class='filed'>
            <input type="text" placeholder="用户名" autofocus v-model='name'>
            <span>用户名只能修改一次（5-24个字）</span>
            <div :class='{"btnBox":true,"btnBox-g":check}'>
                <mt-button size="large" @click='doConfirm'>确认修改</mt-button>
            </div>
        </div>
    </div>
</template>
<script>
import { updateName } from '../../service/getData'
import { Toast, Indicator, MessageBox } from 'mint-ui'
export default {
    data() {
        return {
            name: ''
        }
    },
    vuerify: {
        name: [{
            test: /\S+$/,
            message: ''
        }, {
            test: /\w{5,}/,
            message: ''
        }]
    },
    methods: {
        handleBack() {
            this.$router.push({ path: '/my/accountSafe' });
        },
        doConfirm() {
            var vm=this;
            if (!this.check) { return; }
            MessageBox.confirm('用户名仅限修改一次').then(action => {
                console.log(action)
               if(action!="confirm"){return;}
               vm.doUpdate()
            });
        },
        doUpdate() {
            var vm = this;
            Indicator.open();
            updateName({ id: vm.$route.query.id, name: vm.name }, res => {
                if (res.data.code == 0) {
                    setTimeout(() => {
                        Indicator.close();
                        this.$router.push({ 'path': '/my/accountSafe' })
                    }, 2000);
                }
            })
        }
    },
    mounted() {

    },
    computed: {
        check() {
            return this.$vuerify.check(['name'])
        }
    },
    components: {

    }
}

</script>
<style lang='sass'>
    .filed {
        input {
            ouline: none;
            border: none;
            width: 100%;
            height: 35px;
            border-top: 1px solid #eaeaea;
            border-bottom: 1px solid #eaeaea;
            padding: 25px;
            font-size: 16px;
            color: #7d7d7d;
            box-sizing: border-box;
            margin-bottom: 15px;
        }
        input:focus {
            outline: none;
        }
        span {
            /*padding: 20px 25px;*/
            color: #7d7d7d;
            font-size: 14px;
            margin: 0 25px;
        }
        .btnBox {
            padding:0 15px;
            button {
                margin: 30px 0;
                background:#ccc;
                border:none;
                color:#fff;
            }
        }
        .btnBox-g{
            button{
                background:#4cc05f;
            }
        }
    }
</style>