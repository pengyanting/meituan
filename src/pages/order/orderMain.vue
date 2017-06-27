<template>
    <div>
        <mt-header fixed>
            <span slot="left">订单</span>
        </mt-header>
        <div style="margin-top: 40px;">
            <mt-navbar v-model="selected">
                <mt-tab-item id="1">外卖</mt-tab-item>
                <mt-tab-item id="2">早餐</mt-tab-item>
            </mt-navbar>
            <mt-tab-container v-model="selected">
                <mt-tab-container-item id="1">
                    <NoLogin text='登陆后查看外卖订单' imgUrl='./src/assets/images/order-nologin2.png'></NoLogin>
                </mt-tab-container-item>
                <mt-tab-container-item id="2">
                    <NoLogin text='登陆后查看早餐订单' imgUrl='./src/assets/images/order-nologin1.png'></NoLogin>
                </mt-tab-container-item>
            </mt-tab-container>
        </div>
        <FootBottom title='订单'></FootBottom>
    </div>
</template>
<script>
    import NoLogin from '../order/noLogin.vue'
    import FootBottom from '../../components/FootBottom.vue'
    export default {
        data() {
            return {
                selected: '1'
            }
        },
        components: {
            NoLogin,
            FootBottom
        }
    }

</script>
<style lang="sass">
    .mint-tab-item-label {
        color: inherit!important;
    }
    
    .mint-navbar .mint-tab-item.is-selected {
        margin-bottom: 0!important;
    }
</style>