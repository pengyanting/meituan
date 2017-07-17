<template>
    <div>
        <div class='hd_box'>
            <mt-header>
                <router-link :to="{path:'/waimai/listDetail',query:{id:id}}" slot="left">
                    <mt-button icon="back"></mt-button>
                </router-link>
            </mt-header>
        </div>
        <section class='basic'>
            <img :src="$root._data.imgUrl+detail.image_path"  width='80' height='80' alt="">
            <h4 class='title center'>
                <img v-if='detail.is_premium' src="../../assets/images/pinpai.png" alt="">{{detail.name}}</h4>
            <div class='score center'>
                <starLevel :score='detail.rating'></starLevel>
                <span>月售1234单</span>
            </div>
            <div class='gonggao'>[公告]{{detail.promotion_info}}</div>
            <ul class='shopImg'>
                <li>
                    <img src="../../assets/images/shop.png" alt="">
                </li>
                <li>
                    <img src="../../assets/images/shop.png" alt="">
                </li>
                <li>
                    <img src="../../assets/images/shop.png" alt="">
                </li>
            </ul>
        </section>
        <div class='space'></div>
        <section class='commonBox'>
            <div class='boxInner'>
                <h4>配送信息</h4>
                <ul class='delivery_info'>
                    <li v-if='detail.delivery_mode'>
                        <span class='fengniao'>{{detail.delivery_mode.text}}</span>约50分钟送达，距离666m</li>
                    <li v-for='n in detail.supports' :key='n'>
                        <span class='supports'>{{n.icon_name}}</span>{{n.description}}</li>
                    <li>配送费约￥{{detail.float_delivery_fee}}</li>
                </ul>
            </div>
        </section>
        <div class='space'></div>
        <section class='commonBox'>
            <div class='boxInner'>
                <h4>活动与服务</h4>
                <div class='active'>
                    <ul>
                        <li v-for='(item,index) in detail.activities' :key='item'>
                            <span :class="{'jian':item.icon_name=='减','te':item.icon_name=='特','zhe':item.icon_name=='折','xin':item.icon_name=='新','ling':item.icon_name=='领'}">
                                {{item.icon_name}}
                            </span>
                            <span>{{item.description}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <div class='space'></div>
        <section class='commonBox'>
            <div class='boxInner single'>
                <h4>商家评价</h4>
                <div>
                    <span>{{detail.rating}}分</span>
                    <span>|</span>
                    <span>高于周边商家77%</span>
                    <span class='right_arrow'></span>
                </div>
            </div>
        </section>
        <div class='space'></div>
        <section class='commonBox'>
            <div class='boxInner'>
                <h4>商家信息</h4>
                <mt-cell :title="detail.name"></mt-cell>
                <mt-cell title="品类" :value="detail.category"></mt-cell>
                <mt-cell title="商家电话" :value="detail.phone" is-link></mt-cell>
                <mt-cell title="地址" :value="detail.address"></mt-cell>
                <mt-cell title="营业时间" :value="detail.opening_hours"></mt-cell>
            </div>
        </section>
        <div class='space'></div>
        <section class='commonBox'>
            <div class='boxInner single'>
                <h4>营业资质</h4>
                <div>
                    <span class='right_arrow'></span>
                </div>
            </div>
        </section>
        <div class='space'></div>
        <section class='commonBox'>
            <div class='boxInner single'>
                <h4>举报商家</h4>
                <div>
                    <span class='right_arrow'></span>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import axios from 'axios'
import StarLevel from '../../components/starLevel.vue'
export default {
    data() {
        return {
            id: '',
            detail: {}
        }
    },
    components: {
        StarLevel
    },
    methods: {
        getDetail() {
            var vm = this;
            axios.get('http://cangdu.org:8001/shopping/restaurant/' + vm.id).then(res => {
                vm.detail = res.data;
            })

        },
    },
    created() {
        this.id = this.$route.query.id;
        this.getDetail();
    },
    mounted() {

    }
}
</script>
<style lang='sass' scoped>
@import '../../assets/scss/common.scss';
 .hd_box {
    .mint-header {
        height:80px;
    }
}
.basic{
    margin-top:80px;
    position:relative;
    background:#fff;
    padding:50px 10px 15px;
    &>img{
      position:absolute;
      left:50%;
      margin-left:-40px;
      top:-40px;
    }
    .title{
        font-size:20px;
        color:#0f0f0f;
        font-weight:normal;
        img{
           width:45px;
           height:21px;
           margin-right:5px;
        }
    }
    .score{
        padding:15px 0;
        &>span{
            margin-left:15px;
            font-size:12px;
            color:#2f2f2f;
        }
    }
    .gonggao{
        padding:10px 0;
        border-top:1px solid #f2f2f2;
        font-size:12px;
    }
    .shopImg{
        display:flex;
        align-items:center;
        img{
             width:100px;
           height:100px;
            border-radius:5px;
            margin-right:10px;
        }
    }
  
}
.commonBox{
    padding:0 10px;
    background:#f5f5f5;
    position:relative;
    .boxInner{
        background:#fff;
        border-radius:4px;
        border-bottom:1px solid #f2f2f2;
        padding:15px;
        h4{
            font-size:16px;
            font-weight:normal;
            color:#0f0f0f;
            margin-bottom:20px;
        }
        .delivery_info{
            li{
               @include textHidden;
               color:#626262;
               height:30px; 
               font-size:14px;
               span{
                   margin-right:10px;
               }
            }
        }
        .active {
            display: flex;
            justify-content: space-between;
            ul {
                margin: 0;
                padding: 0;
                overflow: hidden;
            }
            .activeClass {
                height: auto;
            }
            .errorClass {
                height: 40px;
            }
            li {
                span {
                    font-size: 14px;
                    line-height: 19px;
                    display: inline-block;
                }
                span:nth-child(1) {
                    width: 23px;
                    height: 18px;
                    color: #fff;
                    border-radius: 3px;
                    text-align: center;
                }
                .xin {
                    background: #70bb44;
                }
                .te {
                    background: #f1884e;
                }
                .ling {
                    background: #ffac28;
                }
                .jian {
                    background: #ef7375;
                }
                .zhe {
                    background: #f07371;
                }
                span:nth-child(2) {
                    color: #636363;
                }
            }
        }
    }
    .single{
      display:flex;
      align-items:center;
      justify-content:space-between;
      h4{
          margin:0;
      }
      span{
          font-size:14px;
          color:#646464;
      }
    }
}
.space{
    position:relative;
}
</style>


