<template>
    <div>
        <mt-tab-container class="page-tabbar-container" v-model="selected">
        <mt-tab-container-item id="外卖">
          <waimaiMain></waimaiMain>
        </mt-tab-container-item>
        <mt-tab-container-item id="发现">
          <FindMain></FindMain>
        </mt-tab-container-item>
        <mt-tab-container-item id="订单">
          <orderMain></orderMain>
        </mt-tab-container-item>
        <mt-tab-container-item id="我的">
          <MyMain></MyMain>
        </mt-tab-container-item>
      </mt-tab-container>
        <mt-tabbar v-model="selected"  @click="handleClick">
            <mt-tab-item id="外卖">
                <i class="icon-wai"></i> <span>外卖</span>
            </mt-tab-item>
            <mt-tab-item id="发现">
                <i class="icon-order"></i><span>发现</span>
            </mt-tab-item>
            <mt-tab-item id="订单">
                <i class="icon-find"></i><span>订单</span>
            </mt-tab-item>
            <mt-tab-item id="我的">
                <i class="icon-my"></i><span>我的</span>
            </mt-tab-item>
        </mt-tabbar>
    </div>
</template>
<script>
import WaimaiMain from '../pages/waimai/waimaiMain.vue'
import FindMain from '../pages/find/findMain.vue'
import OrderMain from '../pages/order/orderMain.vue'
import MyMain from '../pages/my/myMain.vue'
    export default {
        data() {
            return {
                selected: this.$store.state.selectType,
                active: 'tab-container1'
            }
        },
        methods: {
            handleClick() {
                alert(1)
                console.log('aaa')
            }
        },
        components: {
            WaimaiMain,
            FindMain,
            OrderMain,
            MyMain
        }
    }

</script>
<style lang="sass">
    @import "../assets/scss/iconfont.scss";
    .mint-tab-item-label {
        color: #656565!important;
    }
    .mint-tabbar{
        position: fixed!important;
        left: 0!important;
        bottom: 0!important;
        z-index: 99999;
    }
</style>