<template>
    <div>
        <mt-header>
            <router-link to="/login" slot="left">
                <mt-button icon="back">密码登录</mt-button>
            </router-link>
    
        </mt-header>
        <div class='space'></div>
        <div class='page-field'>
            <div class="page-part">
                <mt-field placeholder="手机" type="text" v-model='phone'></mt-field>
                <mt-field placeholder="密码" type="password" v-model='password'></mt-field>
            </div>
        </div>
        <div style='padding: 10px;'>
            <mt-button type="default" class="loginbtn" @click='doLogin'>登录</mt-button>
            <span class="right findPw">忘记密码？</span>
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
            password: ''
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
        password: [
            {
                test: /\S+$/,
                message: '请填写密码'
            }
        ]
    },
    computed: {
        errors() {
            return this.$vuerify.$errors
        }
    },
    methods: {
        doLogin() {
            var vm = this;
            var vm = this;
            if (this.$vuerify.check(['phone', 'password'])) {
                login({
                    phone: vm.phone,
                    password: vm.password
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
                let message = this.errors.phone ? this.errors.phone : this.errors.password;
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
    
    .findPw {
        margin-top: 10px;
        font-size: 14px;
        color: #009bff;
    }
</style>