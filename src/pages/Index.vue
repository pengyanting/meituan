<template>
<div style='background:#fff;'>
    <mt-header>
        <div slot="left">
            <span class="icon-pos"></span>
            <span id='XSDFXPage'>上海市普陀区中江路</span>
        </div>
    </mt-header>
    <Search></Search>
    <div class='searchList clearfix'>
        <div v-for="(item,index) in searchList" :key='index'>{{item.name}}</div>
    </div>
    <div class="foodTypeBox">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide foodType">
                    <div class="foodTypeList" v-for='(item,index) in categoryList' v-if='index<8' :key='item'>
                        <img :src="$root._data.url+item.image_url" alt="">
                        <span>{{item.title}}</span>
                    </div>
                </div>
                <div class="swiper-slide foodType">
                    <div class="foodTypeList" v-for='(item,index) in categoryList' v-if='index>7' :key='item'>
                        <img :src="$root._data.url+item.image_url" alt="">
                        <span>{{item.title}}</span>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="waimaiActive">
            <img src="../assets/images/waimai-active.png" alt="">
        </div>
    </div>
    <div class="space"></div>
    <section class="bannerBottom">
        <div class="bannerBottomList" v-for="index in bannerBottomList" :key="index">
            <div class="bbl-item">
                <h4>{{index.title}}</h4>
                <span>{{index.desc}}</span>
            </div>
            <img src="../assets/images/banner-img.png" alt="">
        </div>
    </section>
    <div class="space"></div>
    <section class="flashSale">
        <div class="flashSaleTitle">
            <h4>限时抢购</h4>
            <div class="flashSaleTime">距离结束
                <span>00</span>:
                <span>12</span>:
                <span>12</span>
            </div>
            <span class="more right">更多&gt;</span>
        </div>
        <div class="flashSaleList">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" v-for="item in flashSaleList" :key="item">
                        <img src="../assets/images/flashSale.png" alt="">
                        <p>{{item.title}}</p>
                        <p>
                            <span>￥{{item.price}}</span>
                            <span>{{item.oldPrice}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="space"></div>
    <section class="pinzhi">
        <div class="pinzhiTitle">
            <h4>品质优选</h4>
            <span class="more right">更多&gt;</span>
        </div>
        <div class="pinzhiList">
            <div class="pinzhiListItem" v-for="item in pinzhiList" :key="item">
                <img src="../assets/images/pinzhi-img.png" alt="">
                <h4>{{item.title}}</h4>
                <span :class="{'color1':item.desc=='点评高分','color2':item.desc=='热销好店','color3':item.desc=='大牌精选'}">{{item.desc}}</span>
            </div>
        </div>
    </section>
    <div class="space"></div>
    <section class="bannerBottom">
        <div class="bannerBottomList" v-for="index in pinzhiBottomList" :key="index">
            <div class="bbl-item">
                <h4>{{index.title}}</h4>
                <span>{{index.desc}}</span>
            </div>
            <img src="../assets/images/banner-img.png" alt="">
        </div>
    </section>
    <div class='space'></div>
    <section class='introList'>
        <h4 class='title'>推荐商家</h4>
        <div v-for='item in recommendList' :key='item' @click='toDetail(item)'>
            <List :foodList='item' active></List>
        </div>
    </section>
    <div class='space'></div>
    <FootBottom title='外卖'></FootBottom>
  </div>
</template>
<script>
import Search from "../components/search.vue"
import '../libs/js/swiper.min.js'
import '../libs/css/swiper.min.css'
import List from '../pages/waimai/list.vue'
import BMap from 'BMap'
import axios from "axios"
import FootBottom from '../components/FootBottom.vue'
import HeadTop from '../components/HeadTop.vue'
import myjs from '../libs/js/myjs.js'
import qs from 'querystring'
export default {
    data() {
        return {
            categoryList: [],
            recommendList: [],
            searchList: [
                {
                    name: '粥'
                }, {
                    name: '周黑鸭'
                }, {
                    name: '阿拉丁麻辣烫'
                }, {
                    name: '米粉'
                }, {
                    name: '麦当劳'
                }, {
                    name: '必胜客'
                }
            ],
            bannerBottomList: [
                {
                    title: '天天特价',
                    desc: '美食1折起'
                }, {
                    title: '霸王餐',
                    desc: '领20元红包'
                }, {
                    title: '营养快餐',
                    desc: '15元吃饱'
                }, {
                    title: '下单减10元',
                    desc: '治愈系甜食'
                }
            ],
            flashSaleList: [
                {
                    title: '原味鸡排+红茶+可乐',
                    price: '9.9',
                    oldPrice: '30'
                }, {
                    title: '香辣鸡排+布丁+红茶',
                    price: '9.9',
                    oldPrice: '30'
                }, {
                    title: '爆浆鸡块+原味奶茶+薯条',
                    price: '9.9',
                    oldPrice: '25'
                }, {
                    title: '黑芝麻鸡蛋仔+抹茶冰激凌',
                    price: '9.9',
                    oldPrice: '20'
                }, {
                    title: '火腿牛油果沙拉+草莓西米露',
                    price: '19.9',
                    oldPrice: '40'
                }, {
                    title: '金牌蛋挞（2个）+卡布奇诺',
                    price: '9.9',
                    oldPrice: '30'
                }
            ],
            pinzhiList: [
                {
                    title: '食之秘',
                    desc: '大牌精选'
                }, {
                    title: '千秋膳房',
                    desc: '点评高分'
                }, {
                    title: '食其家',
                    desc: '大牌精选'
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
            pinzhiBottomList: [
                {
                    title: '推荐有奖',
                    desc: '5元现金拿不停'
                }, {
                    title: '领券中心',
                    desc: '代金券免费领'
                }
            ]
        }
    },
    created() {
       console.log(myjs.other.getEndTime('2017/8/1 16:0:0'))
    },
    mounted() {
        //初始化swiper
        new Swiper('.foodTypeBox .swiper-container', {
            pagination: '.swiper-pagination',
            loop: true
        });
        var mySwiper = new Swiper('.flashSaleList .swiper-container', {
            slidesPerView: 3.5,
            slidesPerGroup: 1,
        })
        this.getCategoryList();
        this.getRecommendList();
    },
    methods: {
        getCategoryList() {
            var vm = this;
            axios.get(vm.$root._data.apiUrl + 'v2/index_entry').then(res => {
                var res = res.data;
                if (res.length > 0) {
                    vm.categoryList = res;
                }
            }).catch(error => {
                console.log(error)
            })
        },
        getRecommendList() {
            var geolocation = new BMap.Geolocation()
            var vm = this;
            geolocation.getCurrentPosition(function (position) {
                var x = position.point.lng;
                var y = position.point.lat;
                axios.get(vm.$root._data.apiUrl + 'shopping/restaurants', {
                    params: {
                        latitude: y,
                        longitude: x
                    }
                }).then(res => {
                    var res = res.data;
                    if (res.length > 0) {
                        vm.recommendList = res;
                    }
                }).catch(error => {
                    console.log(error)
                })

            });
        },
        toDetail(val){
           this.$router.push({'path':'/waimai/listDetail','query':{id:val.id}})
        }
    },
    props: ['foodList'],
    components: {
        Search,
        List,
        FootBottom,
        HeadTop
    }

}

</script>
<style lang="sass" scoped>
    @import 'src/assets/scss/iconFont.scss';
    @import 'src/assets/scss/common.scss';
    .searchList {
        width: 100%;
        padding: 0 10px;
        background-color: #3594ee;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        div {
            font-size: 12px;
            color: #fff;
            margin-bottom: 5px;
            font-size: 12px;
        }
    }
     h4{
         font-size:16px;
     }
    .foodTypeBox {
        width: 100%;
        background: #fff;
        .foodType {
            display: flex;
            flel-direction: row;
            flex-wrap: wrap;
            padding: 10px 10px 30px 10px;
            .foodTypeList {
                width: 25%;
                text-align: center;
            }
            img {
                width: 36px;
                height: 36px;
                display: block;
                margin: 0 auto;
            }
            span {
                font-size: 12px;
            }
        }
        .waimaiActive {
            width: 100%;
            padding: 0 20px 10px 20px;
            text-align: center;
            img {
                width: 100%;
            }
        }
    }
    
    .bannerBottom {
        width: 100%;
        display: flex;
        flel-direction: row;
        flex-wrap: wrap;
        .bannerBottomList {
            width: 50%;
            padding: 10px;
            img {
                width: 45px;
                float: right;
            }
            .bbl-item {
                float: left;
                span {
                    font-size: 12px;
                }
                h4 {
                    margin: 0;
                }
            }
        }
        .bannerBottomList:nth-child(1),
        .bannerBottomList:nth-child(2) {
            border-bottom: 1px solid #f8f8f8;
        }
        .bannerBottomList:nth-child(1),
        .bannerBottomList:nth-child(3) {
            border-right: 1px solid #f8f8f8;
        }
    }
    
    .flashSale {
        padding: 10px;
        .flashSaleTitle {
            width: 100%;
            height: 30px;
            line-height: 30px;
            margin-bottom: 10px;
            h4 {
                float: left;
                margin: 0;
                display: block;
                margin-right: 5px;
            }
            .flashSaleTime {
                float: left;
                font-size: 14px;
                color: #979797;
                span {
                    padding: 2px 4px;
                    background: #343434;
                    color: #fff;
                    margin: 0 3px;
                    border-radius: 2px;
                    font-size: 12px;
                }
            }
        }
        .flashSaleList {
            .swiper-slide {
                padding-right: 5px;
            }
            img {
                width: 100%;
            }
            p {
                margin: 0;
                font-size: 14px;
                color: #313131;
                @include textHidden;
                span:first-child {
                    color: #fd5e00;
                    font-size: 13px;
                    margin-right: 3px;
                }
                span:last-child {
                    color: #989898;
                    font-size: 12px;
                    text-decoration: line-through;
                }
            }
        }
    }
    
    .pinzhi {
        .pinzhiTitle {
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
        .pinzhiList {
            display: flex;
            flex-wrap: wrap;
            .pinzhiListItem {
                width: 25%;
                padding: 0 10px;
            }
            .pinzhiListItem {
                margin-bottom: 20px;
            }
            h4 {
                font-size: 14px;
                @include textHidden;
                text-align: center;
                margin: 5px 0;
            }
            span {
                display: block;
                text-align: center;
                margin: 0 auto;
                font-size: 10px;
                border-radius: 3px;
                width: 50px;
                height: 20px;
                line-height: 20px;
                text-align: center;
            }
            .color1 {
                border: 1px solid #fd5e00;
                color: #fd5e00;
            }
            .color2 {
                border: 1px solid #e05a59;
                color: #e05a59;
            }
            .color3 {
                border: 1px solid #02abfc;
                color: #02abfc;
            }
            img {
                width: 100%;
            }
        }
    }
    
    .introList {
        .title {
            margin-left: 10px;
            padding: 10px 0px;
            border-bottom: 1px solid #f1f1f1;
            color: #646464;
            font-size: 14px;
        }
    }
</style>