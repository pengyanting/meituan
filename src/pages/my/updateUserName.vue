<template>
    <div style='background: #f5f5f5;width: 100%;height:100%;'>
        <mt-header fixed>
            <mt-button icon="back" slot='left' @click='handleBack'>用户名</mt-button>
        </mt-header>
        <div class='space' style="margin-top: 40px;"></div>
        <div class='filed'>
            <input type="text" placeholder="用户名" autofocus>
            <span>用户名只能修改一次（5-24个字）</span>
            <div class='btnBox'>
                <mt-button size="large">确认修改</mt-button>
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
        },
        mounted() {

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
    }
</style>