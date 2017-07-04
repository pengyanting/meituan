<template>
  <div style='background:#f7f7f7;width:100%;margin-top:88px;'>
    <section class='giftAd'>
      <div class='giftItem'>
        <div class='giftInner'>
          <div>
            <h5>推荐有奖</h5>
            <p>5元现金拿不停</p>
          </div>
          <img src="../../../assets/images/gift2.png" alt="">
        </div>
      </div>
      <div class='giftItem'>
        <div class='giftInner'>
          <div>
            <h5>免费霸王餐</h5>
            <p>领20元红包</p>
          </div>
          <img src="../../../assets/images/gift1.png" alt="">
        </div>
      </div>
    </section>
    <section class='giftList'>
      <div class='noGift' v-if='giftList.length<=0'>
        <img src="../../../assets/images/nogift.png" alt="">
        <p>没有红包</p>
        <mt-button type="default" class="btn">去领券中心看看</mt-button>
      </div>
      <div v-else class='giftBox'>
        <div class='giftItem' v-for='item in giftList'>
          <div class='top'>
            <div class='giftMoney'>
              <p><span>￥</span>{{item.price}}</p>
              <p>{{item.man}}</p>
            </div>
            <ul>
              <h4>{{item.title}}</h4>
              <li v-for='xian in item.xian'>{{xian}}</li>
            </ul>
            <div class='giftbtn'>
              <div>
                <p v-if='item.isToday' class='jinri'>限今日</p>
                <p class='liji'>立即使用</p>
              </div>
            </div>
          </div>
          <div class='line'></div>
          <ul class='bottom'>
            <li v-for='index in item.xian1'>{{index}}</li>
          </ul>
        </div>
      </div>
      <ul class='giftHistory'>
        <li><router-link to="/my/preferential/historyGift">查看历史红包</router-link></li>
        <span>|</span>
        <li><router-link to='/my/preferential/giftExplain'>红包说明</router-link></li>
      </ul>
    </section>
    <section class='like'>
      <div class='title'>
        <h4>猜你喜欢</h4>
      </div>
      <div class="list">
        <div class="item" v-for="item in list" :key="item">
          <div class='itemInner'>
            <img src="../../../assets/images/like.png" alt="">
            <h4>{{item.title}}</h4>
            <ul>
              <li>月售1223份</li>
              <li>好评率90%</li>
            </ul>
            <div class='money'>
              <div class='nowMoney'><span>￥</span>20</div>
              <span v-if='item.desc' class='tag'>{{item.desc}}</span>
              <span v-else class='oldMoney'>￥15</span>
            </div>
            <div class='shopName'>
              <div>
                壹杯卤肉饭（118广场店）
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        list: [
          {
            title: '食之秘',
            desc: '满20减4'
          }, {
            title: '千秋膳房',
            desc: ''
          }, {
            title: '食其家',
            desc: ''
          }, {
            title: '肯德基宅急送',
            desc: '大牌精选'
          }, {
            title: '必胜客宅急送',
            desc: '大牌精选'
          }, {
            title: '红料理',
            desc: '点评高分'
          }, {
            title: '唐质保中式料理',
            desc: '热销好店'
          }, {
            title: '静安面包房',
            desc: '热销好店'
          }
        ],
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
          },
          {
            title: '鲜果超市红包',
            price: '15',
            man: '满49元可用',
            xian: ['限2017-07-03当天使用', '限收货手机号未18017556806'],
            xian1: ['限品类：果蔬生鲜、商店超市', '限时段：17：00-21:00'],
            new: true,
            isToday: true
          },
          {
            title: '鲜果超市红包',
            price: '15',
            man: '满49元可用',
            xian: ['限2017-07-03当天使用', '限收货手机号未18017556806'],
            xian1: ['限品类：果蔬生鲜、商店超市', '限时段：17：00-21:00'],
            new: true,
            isToday: true
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
  @import "../../../assets/scss/common.scss";
  .giftAd {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding: 5px;
    .giftItem {
      flex: 1;
      padding: 10px;
      .giftInner {
        display: flex;
        background: #fff;
        box-shadow: 2px 2px 10px #ccc;
        justify-content: space-between;
      }
      .giftInner>div {
        padding: 15px 5px;
      }
      img {
        width: 6rem;
        height: 6rem;
      }
      h5 {
        font-size: 14px;
        margin-bottom: 5px;
      }
      p {
        font-size: 12px;
        color: #9c9a9c;
      }
    }
  }
  
  .giftList {
    width: 100%;
    .noGift {
      img {
        width: 100%;
      }
      p {
        text-align: center;
        color: #6b696b;
        font-size: 14px;
        margin-bottom: 20px;
      }
      .btn {
        margin: 0 auto;
        display: block;
        padding: 0 30px;
        @include loginBtn;
        font-size: 14px;
      }
    }
    .giftBox {
      padding: 0 15px;
      .giftItem {
        border: 1px solid #eaeaea;
        background: #fff;
        margin-bottom: 10px;
        border-radius: 3px;
        box-shadow: 0px 4px 10px #ccc;
        .top {
          display: flex;
          justify-content: space-between;
          padding: 0 15px;
          .giftMoney {
            padding: 1px 0 0;
            text-align: center;
            p:first-child {
              color: #ff0023;
              font-size: 28px;
              span {
                font-size: 14px;
              }
              margin-top:10px;
            }
            p:nth-child(2) {
              font-size: 12px;
              margin: 5px 0;
            }
          }
          ul {
            padding: 7px 0 0;
            h4 {
              margin-bottom: 10px;
            }
            li {
              color: #313131;
              margin-bottom: 5px;
              font-size: 12px;
            }
          }
          .giftbtn {
            position: relative;
             width:54px;
            &>div{
              position: absolute;
              left:0;
              top:0;
              right:0;
              bottom:0;
              margin:auto;
              height:40px;
            }
            .jinri {
              color: #ce112d;
              text-align:center;
              margin-bottom:5px;
            }
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
          width: 100%;
          height: 10px;
          background: url(../../../assets/images/giftbg.png) no-repeat center;
          background-size: cover;
        }
        .bottom {
          background: #fcfcfc;
          margin: 0;
          padding: 10px 10px 15px 10px;
          li {
            color: #646464;
            line-height: 10px;
          }
        }
      }
    }
    .giftHistory {
      display: flex;
      color: #9c9e9c;
      justify-content: center;
      span {
        margin: 0 10px;
        color: #c6c7c6;
      }
    }
    ul {
      padding: 0;
    }
  }
  
  .like {
    background: #fff;
    .title {
      width: 100%;
      padding: 10px;
      display: flex;
      h4 {
        position: relative;
        margin: 0;
        text-align: center;
        flex: 1;
      }
      @mixin hLine {
        content: "";
        display: block;
        width: 10px;
        height: 2px;
        background: #313131;
        position: absolute;
        top: 50%;
        margin-top: -1px;
      }
      h4:after {
        @include hLine;
        left: 50%;
        margin-left: -50px;
      }
      h4:before {
        @include hLine;
        right: 50%;
        margin-right: -50px;
      }
    }
    .list {
      display: flex;
      flex-wrap: wrap;
      padding: 0 5px;
      .item {
        width: 50%;
        padding: 0 6px;
        margin-bottom: 20px;
      }
      .itemInner {
        border: 1px solid #ccc;
      }
      h4 {
        font-size: 14px;
        @include textHidden;
        margin: 5px 0;
        padding: 0 10px;
      }
      ul {
        padding: 0px 10px;
        margin: 0;
        color: #636563;
        display: flex;
        li:first-child {
          margin-right: 10px;
        }
      }
      .money {
        display: flex;
        padding: 5px 10px;
        .nowMoney {
          span:first-child {
            font-size: 12px;
          }
          color: #ff8a42;
          font-size: 16px;
        }
        .tag {
          display: block;
          font-size: 12px;
          border-radius: 3px;
          width: 50px;
          height: 20px;
          line-height: 20px;
          text-align: center;
          color: #f76d6b;
          border: 1px solid #f76d6b;
          line-height: 20px;
          margin-left: 10px;
        }
        .oldMoney {
          color: #9c9a9c;
          text-decoration: line-through;
          margin-top: 4px;
          margin-left: 5px;
        }
      }
      .shopName {
        padding: 0 10px;
        &>div {
          padding: 10px 0;
          border-top: 1px dashed #ccc;
          color: #636563;
          font-size: 12px;
        }
      }
      img {
        width: 100%;
      }
    }
  }
</style>