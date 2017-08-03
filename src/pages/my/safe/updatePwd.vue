<template>
    <div>
        <HeadTop title='修改密码'></HeadTop>
        <div class='space' style="margin-top: 40px;"></div>
        <div class='filed'>
            <input type="text" placeholder="旧密码" autofocus v-model='oldPwd'>
            <input type="text" placeholder="新密码" v-model='newPwd'>
            <div class='btnBox btnBox-g'>
                <mt-button size="large" @click='doConfirm'>确认修改</mt-button>
            </div>
        </div>
    </div>
</template>
<script>
import HeadTop from '../../../components/HeadTop.vue'
import { updatePwd } from '../../../service/getData.js'
import { Toast, Indicator } from 'mint-ui'
export default {
    data() {
        return {
            newPwd: '',
            oldPwd: ''
        }
    },
    vuerify: {
        oldPwd: [{
            test: /\S+$/,
            message: '请填写原密码'
        }],
        newPwd: [{
            test: /\S+$/,
            message: '请填写新密码'
        }, {
            test: /\w{8,}/,
            message: '密码有效长度为8'
        }]
    },
    components: {
        HeadTop
    },
    computed: {
        check() {
            return this.$vuerify.check(['oldPwd','newPwd'])
        }
    },
    methods: {
        doConfirm() {
            var vm = this;
            if (!vm.check) {
                console.log(vm.$vuerify)
                let message = this.$vuerify.$errors.oldPwd ? this.$vuerify.$errors.oldPwd : this.$vuerify.$errors.newPwd;
                Toast({
                    message: message[0] ? message[0] : '',
                    position: 'bottom',
                    duration: 5000
                });
                return;
            }
            Indicator.open();
            updatePwd({ id: vm.$route.query.id, newPwd: vm.newPwd, password: vm.oldPwd }, res => {
                if (res.data.code == 0) {
                    setTimeout(() => {
                        Indicator.close();
                        this.$router.push({ 'path': '/my/accountSafe' })
                    }, 2000);
                } else {
                    setTimeout(() => {
                        Indicator.close();
                        Toast({
                            message: res.data.error,
                            position: 'bottom',
                            duration: 5000
                        })
                    }, 2000);
                }
            })
        }
    }
}
</script>
<style lang='sass' scoped>
  .filed {
        input {
            margin-bottom: 0px;
            border-top:none;
        }
    }
</style>

