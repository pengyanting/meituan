<template>
    <div>
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
                                    <img src="../assets/images/pinpai.png" alt="">
                                    <span>必胜客宅急送（锦秋店）</span>
                                </h3>
                                <div class='peisongs'>
                                    <span class='fengniao'>蜂鸟专送</span>
                                    <ul class='peisongfei'>
                                        <li>￥4元起送</li>
                                        <span>|</span>
                                        <li>配送费￥4</li>
                                    </ul>
                                </div>
                                <p class='gonggao'>公告：显示‘蜂鸟专送’门店，配送由饿了么全程提供！！！</p>
                            </section>
                        </div>
                    </div>
                    <img slot="icon" src="../assets/images/kfc.png" width="100" height="100">
                </mt-cell>
            </div>
        </div>
        <div class="page-navbar" ref='menu' @touchmove='move' @touchstart='start' @touchend='end'>
            <mt-navbar class="page-part" v-model="selected">
                <mt-tab-item id="1">商品</mt-tab-item>
                <mt-tab-item id="2">评价<span style='color: #ff5f00;'>（4.6分）</span></mt-tab-item>
            </mt-navbar>
            <mt-tab-container v-model="selected">
                <mt-tab-container-item id="1" style='display:flex;'>
                    <div class='goodsType'>
                        <ul>
                            <li>热销榜</li>
                            <li>优惠</li>
                            <li>招牌特卖</li>
                            <li>爆款优惠</li>
                            <li>6月特惠菜</li>
                            <li>套餐</li>
                            <li>招牌特卖</li>
                            <li>爆款优惠</li>
                            <li>6月特惠菜</li>
                            <li>套餐</li>
                        </ul>
                    </div>
                    <div class='goodsList'>
                        <div class='goodsList-title'>
                            <span>热销榜</span>大家喜欢吃，菜才是真好吃。
                        </div>
                        <div class='goodsList-item' v-for='item in 15'>
                            <mt-cell title="" icon="more">
                                <ul>
                                    <li class='foodName'>现磨豆浆（热/甜）</li>
                                    <li class='foodSell'>
                                        <span>月售666份</span>
                                        <span>好评率100%</span>
                                    </li>
                                    <li class='foodPrice'>￥6</li>
                                </ul>
                                <img slot="icon" src="../assets/images/food.png" width="62" height="57">
                            </mt-cell>
                        </div>
                    </div>
                </mt-tab-container-item>
                <mt-tab-container-item id="2">
                    <mt-cell v-for="n in 4" :title="'测试 ' + n" />
                </mt-tab-container-item>
            </mt-tab-container>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                selected: '1',
                moveY: '',
                startY: '',//触摸点的位置
                endY: ''
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
                console.log(actualTop)
            },
            end(e) {
                this.endY = e.changedTouches[0].clientY;
            }
        },
        mounted() {

        }
    }

</script>
<style lang='sass'>
    .hd_box {
        background: url(../assets/images/bg.png) no-repeat center;
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
        .mint-tab-container-item {
            background: #fff;
        }
    }
    
    .page-part {
        position: relative;
        z-index: 201;
    }
    
    .goodsType {
        font-size: 16px;
        ul {
            padding: 0;
            width: 100px;
            margin-top: 0px;
            li {
                height: 80px;
                line-height: 80px;
                text-align: center;
                background: #f6f6f6;
                border-bottom: 1px solid #e8e8e8;
            }
            li:nth-child(1) {
                background: #fff;
                border-left: 3px solid #2195fc;
            }
        }
    }
    
    .goodsList {
        flex-shrink: 0;
        flex-grow: 1;
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
                margin: 25px 0;
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