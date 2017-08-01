<template>
    <div style='background: #F5F5F5;'>
        <mt-header>
            <router-link to="/" slot="left">
                <mt-button icon="back">登录</mt-button>
            </router-link>
            <router-link slot="right" to='/pwLogin'>
                <mt-button>密码登录</mt-button>
            </router-link>
        </mt-header>
        <div class='space'></div>
        <div class='page-field'>
            <div class="page-part">
                <mt-field placeholder="手机号" type="phone" v-model='phone'></mt-field>
                <mt-field placeholder="验证码" type="text" v-model='checkCode'></mt-field>
            </div>
        </div>
        <p class="warn">温馨提示未注册饿了么账号的手机号，登录时将自动注册，且代表您已同意《用户服务协议》</p>
        <div style='padding: 0 10px;'>
            <mt-button type="default" class="loginbtn" @click='handleLogin'>登录</mt-button>
        </div>
    </div>
</template>
<script>
import { Toast } from 'mint-ui';
import { login } from '../../service/getData.js'
export default {
    data() {
        return {
            phone: '',
            checkCode: ''
        }
    },
    vuerify: {
        phone: [
            {
                test: /\S+$/,
                message: '请填写手机号'
            }, {
                test: /\w{11,}/,
                message: '请输入正确的手机号码'
            }
        ],
        checkCode: [
            {
                test: /\S+$/,
                message: '请填写验证码'
            }, {
                test: /\w{6,}/,
                message: '请输入有效验证码'
            }
        ]
    },
    computed: {
        errors() {
            return this.$vuerify.$errors
        }
    },
    methods: {
        handleLogin() {
            var vm = this;
            if (this.$vuerify.check(['phone', 'checkCode'])) {
                login({
                    phone: vm.phone,
                    checkCode: vm.checkCode
                }, res => {
                    if (res.data.code == 0) {
                        localStorage.setItem('phone', vm.phone);
                        vm.$router.push({ path: '/' });
                        vm.$store.dispatch('LOGIN_TYPE', localStorage.getItem('phone'));
                    } else {
                        Toast({
                            message: res.data.message,
                            position: 'bottom',
                            duration: 5000
                        });
                    }
                })

            } else {
                let message = this.errors.phone ? this.errors.phone : this.errors.checkCode;
                Toast({
                    message: message[0] ? message[0] : '',
                    position: 'bottom',
                    duration: 5000
                });
            }
        }
    }
}

</script>
<style lang="sass">
    @import "../../assets/scss/common.scss";
    .warn {
        width: 100%;
        /*color: #333;*/
        font-size: 12px;
        padding: 10px;
        line-height: 20px;
    }
    
    .mint-cell-value {
        font-size: 14px;
    }
    
    .loginbtn {
        margin: 0 auto;
        display: block;
        padding: 0 30px;
        width: 100%;
        @include loginBtn;
    }
    
    .error {
        color: red;
    }
    .page-part input{
        padding:0!important;
        margin:0!important;
        border:none !important;
    }
</style>