<template>
    <div style='overflow:auto;height:100%;'>
        <div class='hd_box'>
            <mt-header>
                <router-link to="/my" slot="left">
                    <mt-button icon="back"></mt-button>
                </router-link>
                <mt-button slot="right" icon="more"></mt-button>
                <mt-button slot="right" icon="more"></mt-button>
            </mt-header>
            <div class="page-cell">
                <mt-cell icon="more" is-link>
                    <div>
                        <div class='food_text'>
                            <section>
                                <h3 class='food_title'>
                                    <img v-if='detail.is_premium' src="../../assets/images/pinpai.png" alt="">
                                    <span>{{detail.name}}</span>
                                </h3>
                                <div class='peisongs'>
                                    <span v-if='detail.delivery_mode' class='fengniao'>{{detail.delivery_mode.text}}</span>
                                    <ul class='peisongfei'>
                                        <li>￥4{{foodList.float_minimum_order_amount}}元起送</li>
                                        <span>|</span>
                                        <li v-if='detail.piecewise_agent_fee'>{{detail.piecewise_agent_fee.tips}}</li>
                                    </ul>
                                </div>
                                <p class='gonggao'>{{detail.promotion_info}}</p>
                            </section>
                        </div>
                    </div>
                    <img slot="icon" :src="$root._data.imgUrl+detail.image_path" width="100" height="100">
                </mt-cell>
            </div>
        </div>
        <div class="page-navbar" ref='menu' @touchmove='move' @touchstart='start' @touchend='end'>
            <mt-navbar class="page-part" v-model="selected">
                <mt-tab-item id="1">商品</mt-tab-item>
                <mt-tab-item id="2">评价
                    <span style='color: #ff5f00;'>（{{score.overall_score}}分）</span>
                </mt-tab-item>
            </mt-navbar>
            <mt-tab-container v-model="selected" style='height:100%;overflow:auto;background:#fff;'>
                <mt-tab-container-item id="1">
                    <div style='display:flex;height:100%;overflow:auto;'>
                        <div class='goodsType'>
                            <ul>
                                <li v-for='n in foodList' @click='handleclick(n)' :key='n' :class="{'active':isActive==n.name}">{{n.name}}</li>
                            </ul>
                        </div>
                        <div class='goodsList'>
                            <div v-for='(n,index) in foodList' :key='n'>
                                <div class='goodsList-title'>
                                    <span>{{n.name}}</span>{{n.description}}
                                </div>
                                <div class='goodsList-item' v-for='item in n.foods' :key='item'>
                                    <mt-cell title="" icon="more">
                                        <ul>
                                            <li class='foodName'>{{item.name}}</li>
                                            <li class='foodSell'>
                                                <span>月售{{item.month_sales}}份</span>
                                                <span>好评{{item.rating_count}}</span>
                                            </li>
                                            <li class='foodPrice'>￥{{item.specfoods[0].price}}</li>
                                        </ul>
                                        <div class='quantity'>
                                            <img v-if='quantity.id==item.item_id' src="../../assets/images/reduce.png" width="20" height="20" @click='reduceFood(item,index)'>
                                            <span v-if='quantity.id==item.item_id'>{{quantity.quantity}}</span>
                                            <img src="../../assets/images/add.png" width="20" height="20" @click='addFood(item,index)'>
                                        </div>
                                        <img slot="icon" :src="$root._data.imgUrl+item.image_path" width="62" height="57">
                                    </mt-cell>
                                </div>
                            </div>
                        </div>
                    </div>
                    <Car :totalList='products'></Car>
                </mt-tab-container-item>
                <mt-tab-container-item id="2">
                    <Comment :score='score' :id='id'></Comment>
                </mt-tab-container-item>
            </mt-tab-container>
        </div>
    
    </div>
</template>
<script>
import axios from 'axios'
import { mapGetters } from 'vuex'
import Car from '../../components/car.vue'
import Comment from './comment.vue'
export default {
    data() {
        return {
            selected: '2',
            moveY: '',
            startY: '',//触摸点的位置
            endY: '',
            id: '',
            detail: {},
            foodList: [],
            isActive: '',
            tips: {},
            entities: {},
            itemId: '',
            score: {}
        }
    },
    methods: {
        start(e) {
            //触摸点的初始位置
            this.startY = e.changedTouches[0].pageY;
        },
        move(e) {
            //触摸点距离浏览器顶部的大小
            this.moveY = e.changedTouches[0].pageY;
            var y = Math.abs(this.moveY - this.startY)

            // if(y>){
            //     alert('aa')
            // }
            var actualTop = this.$refs.menu.offsetTop;
            var current = this.$refs.menu.offsetParent;

            while (current !== null) {
                actualTop += current.offsetTop;
                current = current.offsetParent;
            }
            // console.log(actualTop)
        },
        end(e) {
            this.endY = e.changedTouches[0].clientY;
        },
        getDetail() {
            var vm = this;
            axios.get('http://cangdu.org:8001/shopping/restaurant/' + vm.id).then(res => {
                vm.detail = res.data;
            })

        },
        getFood() {
            var vm = this;
            axios.get('http://cangdu.org:8001/shopping/v2/menu', {
                params: {
                    restaurant_id: vm.id
                }
            }).then(res => {
                vm.foodList = res.data
                vm.isActive = vm.foodList[0].name;


                // console.log(vm.foodList);
            })
        },
        getRateScore() {
            var vm = this;
            axios.get(vm.$root._data.apiUrl + 'ugc/v2/restaurants/' + vm.id + '/ratings/scores').then(res => {
                console.log(res.data)
                vm.score = res.data
                vm.score.overall_score=vm.score.overall_score.toFixed(1)
            })
        },
        handleclick(obj) {
            this.isActive = obj.name;
        },
        addFood(obj, index) {
            // this.item=obj;
            // console.log(this.item.quantity)
            // if (this.item.quantity == undefined) {
            //     this.item.quantity = 1;
            // } else {
            //     this.item.quantity += 1;
            // }
            // console.log(this.reversedMessage)
            this.itemId = obj.item_id;
            this.$store.dispatch('addToCart', { 'obj': obj, 'index': index });
            this.$store.dispatch('GET_ALL_FOODS', this.foodList[index].foods)
        },
        reduceFood(obj) {
            if (obj.quantity == undefined) {
                obj.quantity = 1;
            } else {
                obj.quantity += 1;
            }
        }
    },
    created() {
        this.id = this.$route.query.id;
        this.getDetail();
        this.getFood();
        this.getRateScore();
    },
    mounted() {
    },
    components: {
        Car,
        Comment
    },
    computed: {
        ...mapGetters({
            products: 'cartProducts',
            quantity: 'quantity'
        }),
        quantity: function () {
            for (var i = 0; i < this.products.length; i++) {
                if (this.itemId == this.products[i].id) {
                    return this.products[i]
                }
            }
            return ''
        }
    }
}

</script>
<style lang='sass' scoped>
  
</style>

<style lang='sass'>
    .hd_box {
        background: url(../../assets/images/bg.png) no-repeat center;
        background-size: cover;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        .mint-header {
            background-color: transparent!important;
        }
        header,
        .food_text {
            position: relative;
            z-index: 200;
        }
        .mint-cell {
            position: relative;
            z-index: 200;
            background-color: transparent!important;
        }
        .mint-cell:last-child,
        .mint-cell-wrapper {
            background-image: none!important;
        }
        .mint-cell-wrapper {
            padding: 0 10px 10px 10px;
        }
        .mint-cell-title {
            flex: 0;
        }
        .food_text {
            margin-top: 5px;
            margin-left: 10px;
            flex-shrink: 0;
            flex-grow: 1;
            .food_title {
                width: 100%;
                padding: 5px 0;
                display: flex;
                overflow: hidden;
                line-height: 21px;
                img {
                    width: 45px;
                    height: 21px;
                    margin-right: 8px;
                }
                span:nth-of-type(1) {
                    font-size: 15px;
                    color: #fff;
                    text-overflow: ellipsis;
                    overflow: hidden;
                    white-space: nowrap;
                }
            }
            .peisongs {
                margin-top: 5px;
                padding-bottom: 10px;
                margin-bottom: 20px;
                border: none;
                ul {
                    padding: 0;
                    margin: 0;
                    line-height: 18px;
                }
                li {
                    float: left;
                    font-size: 12px;
                    color: #fff;
                }
                span {
                    float: left;
                    margin: 0 3px;
                    font-size: 12px;
                    color: #fff;
                }
                .fengniao {
                    padding: 3px 5px;
                    background: #3792ed;
                    border-radius: 3px;
                    margin-left: 0;
                }
                .distance li:nth-child(3) {
                    color: #1e91fb;
                }
            }
            .gonggao {
                font-size: 12px;
                color: #fff;
            }
        }
    }
    
    .hd_box:after {
        content: '';
        position: absolute;
        display: inline-block;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        left: 0;
        top: 0;
    }
    
    .page-navbar {
        margin-top: 150px;
        height:100%;
        overflow:auto;
        .mint-tab-container-item {
            background: #fff;
        }
        .mint-tab-container-wrap{
            height:100%!important;
            overflow:auto!important;
        }
    }
    
    .page-part {
        position: relative;
        z-index: 201;
    }
    
    .goodsType {
        font-size: 16px;
        height:100%;
        overflow:auto;
        ul {
            padding: 0;
            width: 70px;
            margin-top: 0px;
            li {
                height: 50px;
                line-height:50px;
                text-align: center;
                background: #f6f6f6;
                border-bottom: 1px solid #e8e8e8;
            }
            .active {
                background: #fff;
                border-left: 3px solid #2195fc;
            }
        }
    }
    
    .goodsList {
        flex-shrink: 0;
        flex-grow: 1;
         height:100%;
        overflow:auto;
        .goodsList-title {
            background: #f7f7f7;
            border-left: 3px solid #eeeeee;
            height: 40px;
            line-height: 40px;
            padding-left: 15px;
            color: #979797;
            font-size: 14px;
            span {
                font-size: 14px;
                color: #333;
                margin-right: 5px;
            }
        }
        .goodsList-item {
            padding-left: 10px;
            ul {
                padding: 0;
                margin: 0;
            }
            img {
                margin: 25px 5px 25px 0 ;
            }
            .quantity{
               padding-top:35px;
               span{
                   margin: 0 3px;
               }
               img{
                    margin:  0;
               }
            }
            .mint-cell-value{
                flex-grow:1;
                justify-content:space-between;
            }
            .mint-cell-title {
                flex: 0;
            }
            .foodName {
                font-size: 16px;
                color: #2e2e2e;
            }
            .foodSell {
                color: #606060;
                font-size: 12px;
                margin: 7px 0;
            }
            .foodPrice {
                font-size: 16px;
                color: #fc6202;
            }
        }
    }
</style>
