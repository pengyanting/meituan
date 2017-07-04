<template>
    <div>
        <HeadTop title='我的优惠' rightText='兑换红包' style='background:#f7f7f7;margin-bottom:55px;width: 100%;height: auto;'></HeadTop>
        <div class='giftBox'>
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
                            <img src="../../../assets/images/guoqi.png" alt="">
                        </div>
                    </div>
                </div>
                <div class='line'></div>
                <ul class='bottom'>
                    <li v-for='index in item.xian1'>{{index}}</li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
    import HeadTop from '../../../components/HeadTop.vue'
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
            HeadTop
        },
        mounted() {

        }
    }

</script>
<style lang='sass' scoped>
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
                        color: #cccccc;
                        font-size: 28px;
                        span {
                            font-size: 14px;
                        }
                        margin-top:10px;
                    }
                    p:nth-child(2) {
                        font-size: 12px;
                        margin: 5px 0;
                        color: #cbcbcb;
                    }
                }
                ul {
                    padding: 7px 0 0;
                    h4 {
                        margin-bottom: 10px;
                        color:#cccccc;
                    }
                    li {
                        color: #cbcbcb;
                        margin-bottom: 5px;
                        font-size: 12px;
                    }
                }
                .giftbtn {
                    position: relative;
                    width: 54px;
                    &>div {
                        position: absolute;
                        left: 0;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        margin: auto;
                        height: 40px;
                    }
                    img{
                        width: 100%;
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
                    color: #cbcbcb;
                    line-height: 10px;
                }
            }
        }
    }
</style>