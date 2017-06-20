<template>
    <div>
        <router-link to="/waimai/listDetail" style='padding:25px 10px;border-bottom:1px solid #DFDDD8;display:flex;'>
            <div class='food_pic'>
                <img src='../../assets/images/kfc.png' alt="肯德基">
            </div>
            <div class='food_text'>
                <section>
                    <h3 class='food_title'>
                        <img v-show='foodList.isadImg' src="../../assets/images/pinpai.png" alt="">
                        <span>{{foodList.title}}</span>
                        <span class='bao'>保</span>
                        <span class='bao'>保</span>
                    </h3>
                    <div class='sell'>
                        <StarLevel class='satrScore' :score='foodList.score'></StarLevel>
                        <span class='sellNum'>月售{{foodList.sellNum}}单</span>
                    </div>
                    <div class='peisong'>
                        <ul class='peisongfei'>
                            <li>￥{{foodList.qisongfei}}元起送</li>
                            <span>|</span>
                            <li>配送费￥{{foodList.peisongfei}}</li>
                            <span>|</span>
                            <li>￥{{foodList.renjun}}/人</li>
                        </ul>
                        <ul class='distance'>
                            <li>450m</li>
                            <span>|</span>
                            <li>40分钟</li>
                        </ul>
                    </div>
                    <div class='active'>
                        <ul :class="{'activeClass':isActive}">
                            <li v-for='(item,index) in foodList.activelist' :key='item'>
                                <span :class="{'jian':item.youhui=='减','te':item.youhui=='特','zhe':item.youhui=='折','xin':item.youhui=='新','ling':item.youhui=='领'}">
                            {{item.youhui}}
                            </span>
                                <span>{{item.title}}</span>
                            </li>
                        </ul>
                        <div class='activeNum' @click.stop='handleActive' v-if='foodList.activelist.length>2'>
                            {{foodList.activelist.length}}个活动<img src="../../assets/images/sanjiao.png" alt="">
                        </div>
                    </div>
                </section>
            </div>
        </router-link>
    </div>
</template>
<script>
    import StarLevel from '../../components/starLevel.vue'
    export default {
        data() {
            return {
                isActive: false
            }
        },
        methods: {
            handleActive() {
                this.isActive = !this.isActive;
            },
            toListDetail() {

            }
        },
        mounted() {

        },
        props: ['foodList'],
        components: {
            StarLevel
        }
    }

</script>
<style lang="sass">
    .food_pic {
        width: 60px;
        flex-shrink: 0;
        img {
            width: 100%;
        }
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
                color: #313131;
                text-overflow: ellipsis;
                overflow: hidden;
                white-space: nowrap;
            }
            .bao {
                font-size: 12px;
                color: #959595;
                display: block;
                width: 23px;
                height: 20px;
                border: 1px solid #dbdbdb;
                border-radius: 3px;
                text-align: center;
                font-weight: normal;
                margin-left: 8px;
            }
        }
        .sell {
            display: flex;
            margin-top: 5px;
            .sellNum {
                color: #636363;
                font-size: 12px;
                line-height: 20px;
            }
        }
        .peisong {
            display: flex;
            margin-top: 5px;
            justify-content: space-between;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
            ul {
                padding: 0;
                margin: 0;
            }
            li {
                float: left;
                font-size: 12px;
                color: #636363;
            }
            span {
                float: left;
                margin: 0 3px;
                font-size: 12px;
                color: #e9e9e9;
            }
            .distance li:nth-child(3) {
                color: #1e91fb;
            }
        }
        .active {
            display: flex;
            justify-content: space-between;
            ul {
                margin: 0;
                padding: 0;
                height: 40px;
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
            .activeNum {
                font-size: 12px;
                color: #979797;
                display: flex;
                line-height: 19px;
                img {
                    width: 8px;
                    height: 5px;
                    margin: 6px 0 0 3px;
                }
            }
        }
    }
</style>