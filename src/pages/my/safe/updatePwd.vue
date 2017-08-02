<template>
    <div>
        <HeadTop title='修改密码'></HeadTop>
        <div class='space' style="margin-top: 40px;"></div>
        <div class='filed'>
            <input type="text" placeholder="旧密码" autofocus v-model='oldPwd'>
            <input type="text" placeholder="新密码"  v-model='newPed'>
            <div :class='{"btnBox":true,"btnBox-g":check}'>
                <mt-button size="large" @click='doConfirm'>确认修改</mt-button>
            </div>
        </div>
    </div>
</template>
<script>
import HeadTop from '../../../components/HeadTop.vue'
export default {
    data() {
        return {
            newPwd:'',
            oldPwd:''
        }
    },
    components: {
        HeadTop
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

