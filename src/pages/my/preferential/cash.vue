<template>
  <div style='margin-top:103px;background: #f5f5f5;'>
    <div class='giftBox'>
      <div class='giftItem' v-for='item in giftList'>
        <div class='top'>
          <div class='giftMoney'>
            <p><span>￥</span>{{item.price}}</p>
          </div>
          <ul>
            <h4>{{item.title}}</h4>
            <li v-for='xian in item.xian'>{{xian}}</li>
          </ul>
          <div class='line'></div>
          <div class='giftbtn'>
            <p class='liji'>进店使用</p>
          </div>
        </div>
      </div>
    </div>
    <div class='btnBox'>
      <mt-button slot="right" class='btn' >更多好券，去领券中心看看</mt-button>
    </div>
    <router-link to="path" class='explain'>商家代金券说明</router-link>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        giftList: [
          {
            title: '鲜果超市红包',
            price: '15',
            man: '满49元可用',
            xian: ['限2017-07-03当天使用', '限收货手机号未18017556806'],
            xian1: ['限品类：果蔬生鲜、商店超市', '限时段：17：00-21:00'],
            new: true,
            isToday: false
          },
          {
            title: '鲜果超市红包',
            price: '15',
            man: '满49元可用',
            xian: ['限2017-07-03当天使用', '限收货手机号未18017556806'],
            xian1: ['限品类：果蔬生鲜、商店超市', '限时段：17：00-21:00'],
            new: true,
            isToday: false
          }
        ]
      }
    },
    methods: {

    },
    components: {
    }
  }

</script>
<style lang='sass' scoped>
  .giftBox {
    padding: 0 15px;
    .giftItem {
      background: #fff;
      border: 1px solid #eaeaea;
      margin-bottom: 10px;
      border-radius: 3px;
      box-shadow: 0px 4px 10px #ccc;
      .top {
        display: flex;
        justify-content: space-between;
        padding: 0 15px;
        border-left: 3px solid #ef435d;
        .giftMoney {
          padding: 1px 0 0;
          text-align: center;
          display: flex;
          align-items: center;
          p:first-child {
            color: #ef435d;
            font-size: 28px;
            span {
              font-size: 14px;
            }
          }
        }
        ul {
          padding: 7px 0 0;
          h4 {
            margin-bottom: 10px;
            color: #0f0f0f;
          }
          li {
            color: #cbcbcb;
            margin-bottom: 5px;
            font-size: 12px;
          }
        }
        .giftbtn {
          width: 54px;
          display:flex;
          align-items: center;
          .liji {
            border: 1px solid #ce112d;
            color: #ce112d;
            border-radius: 10px;
            font-size: 12px;
            text-align: center;
            padding: 2px;
            vertical-align: middle;
          }
        }
      }
      .line {
        width: 10px;
        background: url(../../../assets/images/shu_line.png) no-repeat center;
        background-size: cover;
      }
    }
  }
  .btnBox{
    margin-top:20px;
    width: 100%;
    display:flex;
    justify-content: center;
  }
  .btn{
    border:1px solid #dcdcdc;
    background:#fff;
   }
   .explain{
     color: #989898;
     text-align: center;
     width: 100%;
     display: inline-block;
     margin-top:10px;
   }
</style>