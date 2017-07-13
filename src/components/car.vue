<template>
    <div>
        <section class='footer'>
            <div class='tips'>满20减5</div>
            <div class='shopCar'>
                <div class='car'>
                    <span :class='{"shop-car":true,"shop-car-color":totalList.length>0}'></span>
                    <mt-badge type="error" size="small" class='carNum'>{{total.num}}</mt-badge>
                </div>
                <span>{{total.price}}</span>
            </div>
            <div class='btn'>还差￥66起送</div>
        </section>
    </div>
</template>
<script>
export default {
    data() {
        return {

        }
    },
    props: ['totalList'],
    computed: {
        total: function () {
            var num = 0;
            var price=0;
            for (var i = 0; i < this.totalList.length; i++) {
                num += this.totalList[i].quantity;
                price+=new Number(this.totalList[i].price)*this.totalList[i].quantity
            }
            if(price==0){
                price=''
            }
            price=price==0?'未选购商品':('￥'+price)
            return {
                num:num,
                price:price
            }
        }
    }
}
</script>
<style lang='sass' scoped>
@import '../assets/scss/iconFont.scss';
  .footer{
      width:100%;
      height:50px;
      position:fixed;
      left:0;
      bottom:0;
      background:rgba(0,0,0,0.96);
      color:#9a9a9a;
      .shopCar{
          position:relative;
          float:left;
          &>span{
            display:block;
            line-height:50px;
            margin-left:80px;
            font-size:12px;
          }
          .car{
              width:60px;
              height:60px;
              background:#333333;
              border:10px solid rgba(0,0,0,0.96);
              border-radius:50%;
              text-align:center;
              position:absolute;
              left:10px;
              top:-15px;
              line-height:45px;
              box-shadow:0px -4px 18px rgba(0,0,0,0.4);
              .carNum{
                  position: absolute;
                  right: -11px;
                  top: -17px;
                  line-height: 20px;
                  height:25px;
                  width: 25px;
                  border-radius:50%;
              }
          }
          .shop-car:before{
              color:#757575;
              font-size:20px;
          }
          .shop-car-color:before{
              color:#2F90E5;
          }
         
      }
       .tips{
            width:100%;
            height:30px;
            background:#fefad7;
            opacity:0.9;
            color:#0f0f0f;
            line-height:30px;
            text-align:center;
            position:absolute;
            left:0px;
            top:-30px;
            font-size:12px;
           }
      .btn{
          float:right;
          height:100%;
          padding:0 10px;
          background:#525355;
          display:flex;
          align-items:center;
          font-size:12px;
      }
  }
</style>

