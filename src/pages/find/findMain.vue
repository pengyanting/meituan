<template>
    <div>
        <mt-header fixed>
            <span slot="left">发现</span>
        </mt-header>
        <section class="bannerBottom" style="margin-top:40px;">
            <div class="bannerBottomList" v-for="index in bannerBottomList" :key="index">
                <div class="bbl-item">
                    <h4>{{index.title}}</h4>
                    <span>{{index.desc}}</span>
                </div>
                <img :src="index.imgUrl" alt="">
            </div>
        </section>
        <div class="space"></div>
        <div>
            <img src="../../assets/images/find-active.png" alt="" width="100%">
        </div>
        <div class="space"></div>
        <div v-for="n in list" :key="n">
            <FindList :title="n.title" :list="n.list" :desc="n.desc"></FindList>
            <div class="space" v-if="n!==4"></div>
        </div>
        <FootBottom title='发现'></FootBottom>
    </div>
</template>
<script>
    import FindList from '../../components/findList.vue'
    import FootBottom from '../../components/FootBottom.vue'
    export default {
        data() {
            return {
                bannerBottomList: [
                    {
                        title: '积分商城',
                        desc: '0元好物在这里',
                        imgUrl: './src/assets/images/find-item1.png'
                    }, {
                        title: '外卖热榜',
                        desc: '甄选特色好店',
                        imgUrl: './src/assets/images/find-item2.png'
                    }, {
                        title: '推荐有奖',
                        desc: '5元现金拿不停',
                        imgUrl: './src/assets/images/find-item1.png'
                    }, {
                        title: '后红包快抢',
                        desc: '礼包福利领不停',
                        imgUrl: './src/assets/images/find-item2.png'
                    }
                ],
                list: [
                    {
                        title: '美食热推',
                        desc:'你的口味，我都懂得',
                        list: [
                            {
                                title: '金牌酸菜鱼+1份米饭',
                                price: '27.9'
                            }, {
                                title: '葱油饼6只装',
                                price: '15'
                            }, {
                                title: '糖醋排条饭',
                                price: '17'
                            }
                        ]
                    },{
                        title:'天天特价',
                        desc:'特价商品，一网打尽',
                        list:[
                             {
                                title: '金牌酸菜鱼+1份米饭',
                                price: '27.9',
                            }, {
                                title: '葱油饼6只装',
                                price: '15'
                            }, {
                                title: '糖醋排条饭',
                                price: '17'
                            }
                        ]
                    },{
                        title:'大家都爱吃',
                        desc:'总有美味在身边',
                        list:[
                             {
                                title: '金牌酸菜鱼+1份米饭',
                                price: '27.9',
                            }, {
                                title: '葱油饼6只装',
                                price: '15'
                            }, {
                                title: '糖醋排条饭',
                                price: '17'
                            }
                        ]
                    },{
                        title:'限时好礼',
                        desc:'小积分换豪礼',
                        list:[
                             {
                                title: '金牌酸菜鱼+1份米饭',
                                price: '27.9',
                            }, {
                                title: '葱油饼6只装',
                                price: '15'
                            }, {
                                title: '糖醋排条饭',
                                price: '17'
                            }
                        ]
                    }
                ]
            }
        },
        components: {
            FindList,
            FootBottom
        }
    }

</script>
<style lang="sass">
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
            }
            .bbl-item {
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
</style>