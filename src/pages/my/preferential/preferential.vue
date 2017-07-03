<template>
  <div>
    <HeadTop title='我的优惠' rightText='兑换红包' style='margin-bottom:39px;'></HeadTop>
    <div class='navBar'>
      <mt-navbar v-model="selected">
        <mt-tab-item id="1">红包0个</mt-tab-item>
        <mt-tab-item id="2">代金券2张</mt-tab-item>
      </mt-navbar>
    </div>
    <router-view></router-view>
  </div>
</template>
<script>
  import HeadTop from '../../../components/HeadTop.vue'
  export default {
    data() {
      return {
        selected: '1'
      }
    },
    methods: {

    },
    components: {
      HeadTop
    },
    mounted() {
      this.$router.push({ 'path': '/my/preferential/gift' });
    },
    watch: {
      selected(val, oldval) {
        switch (val) {
          case '1':
            this.$router.push({ 'path': '/my/preferential/gift' });
            break;
          case '2':
            this.$router.push({ 'path': '/my/preferential/cash' });
            break;
          default:
            break;
        }
      }
    }
  }

</script>
<style lang='sass' scoped>
  .navBar {
    position: fixed;
    left: 0;
    top: 40px;
    width: 100%;
    z-index: 300;
  }
  
  .mint-navbar {
    background: #0096ff;
  }
  
  .mint-navbar .mint-tab-item.is-selected {
    color: #fff;
    border: none;
    position: relative;
  }
  
  .mint-navbar .mint-tab-item.is-selected:after {
    content: "";
    display: block;
    width: 80px;
    height: 2px;
    background: #fff;
    position: absolute;
    left: 50%;
    margin-left: -40px;
    bottom: 10px;
  }
</style>
<style lang='sass'>
  .mint-tab-item-label {
    font-size: 14px!important;
    color: #addfff!important;
  }
</style>