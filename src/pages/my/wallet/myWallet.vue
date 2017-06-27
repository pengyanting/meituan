<template>
    <div style='background:#f4f4f4;width: 100%;height: 100%;'>
        <mt-header fixed>
            <mt-button icon="back" slot='left' @click='handleBack'>我的钱包</mt-button>
        </mt-header>
        <div class='space' style='margin-top:40px;'></div>
        <section class='myWallet'>
            <h4>我的余额</h4>
            <router-link to="/my/wallet/balance">
                <mt-cell title="￥0.00" is-link>
                    <span>不可提现</span>
                    <img slot="icon" src="src/assets/images/wallet.png" width="40" height="40">
                </mt-cell>
            </router-link>
        </section>
        <div class='space'></div>
        <mt-cell title="交易明细" is-link>
            <img slot="icon" src="src/assets/images/traderecord.png" width="20" height="20">
        </mt-cell>
        <div class='space'></div>
        <mt-cell title="支付设置" is-link>
            <img slot="icon" src="src/assets/images/setting.png" width="20" height="20">
        </mt-cell>
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
                this.$router.push({ 'path': '/my' })
            }
        }
    }

</script>
<style lang='sass' scoped>
    /*scoped*/
    
    .myWallet {
        h4 {
            background: #fff;
            font-weight: normal;
            padding: 10px;
            font-size: 14px;
            color: #2f2f2f;
        }
        .mint-cell-wrapper {
            background-image: none!important;
            padding: 10px !important;
        }
    }
</style>