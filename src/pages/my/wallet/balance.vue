<template>
    <div style='background:#f4f4f4;width: 100%;height: 100%;'>
       <HeadTop title='我的余额'></HeadTop>
       <section class='box'>
           <div class='boxInner'>
               <div class='boxInner_l'>
                   <span @click='goBalanceProblem'>
                       当前余额
                   </span>
                   <div class='balance'>￥0.00</div>
               </div>
               <div class='boxInner_r'>
                   提现
               </div>
           </div>
       </section>
       <section class='balanceDetail'>
           <h5>余额明细</h5>
           <ImgTip text='暂无明细记录' isBtn imgUrl='./src/assets/images/order-nologin1.png'></ImgTip>
       </section>
    </div>
</template>
<script>
import HeadTop from '../../../components/HeadTop.vue'
import ImgTip from '../../order/noLogin.vue'
    export default {
        data() {
            return {

            }
        },
        methods: {
            goBalanceProblem(){
                this.$router.push({'path':'/my/wallet/balanceProblem'})
            }
        },
        components:{
            HeadTop,
            ImgTip
        }
    }

</script>
<style lang='sass' scoped>
   .box{
       width: 100%;
       background: #0098f8;
       margin-top:40px;
       padding:10px;
       .boxInner{
          width: 100%;
          height: 6rem;
          background:#fff;
          border-radius:4px;
          display:flex;
          padding:10px;
           align-items: center;
          .boxInner_l{
              flex: 1;
              span{
                  font-size:12px;
                  color:#636363;
              }
              .balance{
                font-size: 20px;
                color: #0f0f0f;
                margin-top:5px;
              }
          }
          .boxInner_r{
              width: 5rem;
              height: 2.5rem;
              background: #fe6000;
              color: #fdb180;
              text-align: center;
              vertical-align: middle;
              font-size:14px;
              border-radius:4px;
              line-height: 2.5rem;
          }
       }
   }
   .balanceDetail{
       h5{
           padding:10px;
           color:#979797;
           font-size:14px;
       }
   }
</style>