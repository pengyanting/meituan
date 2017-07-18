<template>
  <div>
       <HeadTop title='设置' style='margin-bottom:45px;'></HeadTop>
       <mt-cell title='账户与安全' value='开启小额免密支付' to='/my/accountSafe'></mt-cell>
       <mt-cell title='通用' ></mt-cell>
       <div class='space'></div>
       <mt-cell title='关于饿了么' ></mt-cell>
       <div class='space'></div>
       <mt-button class='button' @click="logout">退出登录</mt-button>
  </div>
</template>
<script>
import HeadTop from '../../../components/HeadTop.vue'
export default {
  data(){
     return {

     }
  },
  methods:{
      logout(){
          localStorage.removeItem('phone');
          this.$router.push({'path':'/login'})
      }
  },
  components:{
      HeadTop
  }
}
</script>
<style lang='sass' scoped>
  .button{
      width:100%;
      border:none;
      background:#fff;
      color:#d45546;
      border-radius:0;
  }
</style>



