<template>
    <div style='background: #f5f5f5;width: 100%;height:100%;'>
        <mt-header fixed>
            <mt-button icon="back" slot='left' @click='handleBack'>绑定手机</mt-button>
        </mt-header>
        <div class='space' style="margin-top: 40px;"></div>
        <div class='filed'>
            <div class='checkCode'>
                <input type="text" placeholder="手机号" autofocus>
                <div class='getCode'>获取验证码</div>
            </div>
            <input type="text" placeholder="验证码">
            <div class='btnBox'>
                <mt-button size="large">确定</mt-button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {

            }
        },
        methods: {
            handleBack() {
                this.$router.push({ path: '/my/accountSafe' });
            }
        }
    }

</script>
<style lang='sass'>
    .checkCode {
        position: relative;
        input {
            margin-bottom: 0;
            border-bottom:none;
        }
        .getCode {
            position: absolute;
            width: 100px;
            height: 45px;
            right: 15px;
            top:4px;
            background:#ccc;
            color:#fff;
            font-size:16px;
            text-align: center;
            line-height: 45px;
            border-radius: 3px;
        }
    }
</style>