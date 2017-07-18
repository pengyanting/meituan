<template>
    <div ref="container">
        <div class="nlBox">
            <img :src="imgUrl" alt="">
            <p>{{text}}</p>
            <mt-button type="default" class="btn">立即登录</mt-button>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                isBtn: true
            }
        },
        props: ['imgUrl', 'text', 'isBtn', 'btnText'],
        mounted() {
            var container = this.$refs.container
            var windowH = document.documentElement.clientHeight
            container.style.height = windowH - 96 - 49 + 'px'
        }
    }

</script>
<style lang="sass">
    @import "../../assets/scss/common.scss";
    .nlBox {
        width: 100%;
        height: 100%;
        background: #f5f5f5;
        padding: 80px 0 0 0;
        img {
            width: 30%;
            display: block;
            margin: 0px auto 40px;
        }
        p {
            text-align: center;
            color: #646464;
            margin-bottom: 20px;
        }
        .btn {
            margin: 0 auto;
            display: block;
            padding: 0 30px;
            @include loginBtn;
        }
    }
</style>