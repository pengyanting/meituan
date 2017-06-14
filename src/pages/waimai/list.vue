<template>
    <div style='padding:25px 15px;border-bottom:1px solid #DFDDD8;display:flex;'>
        <div class='food_pic'>
            <img src="../../assets/images/kfc.png" alt="肯德基">
        </div>
        <div class='food_text'>
            <section>
                <h3 class='food_title'>
                    <img src="../../assets/images/pinpai.png" alt="">
                    <span>肯德基宅急送（聚丰店）</span>
                    <span>保</span>
                </h3>
                <div class='sell'>
                    <StarLevel></StarLevel>
                    <span>月售1122单</span>
                </div>
                <div class='peisong'>
                    <ul class='peisongfei'>
                        <li>￥0元起送</li>
                        <li>配送费￥10</li>
                        <li>￥45/人</li>
                    </ul>
                    <ul class='distance'>
                        <li>450m</li>
                        <li>40分钟</li>
                    </ul>
                </div>
                <div class='active'>
                    <li>
                        <span>新</span>
                        <span>新用户下单立减11元</span>
                    </li>
                    <li>
                        <span>减</span>
                        <span>满50减30</span>
                    </li>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
    import StarLevel from '../../components/starLevel.vue'
    export default {
        data() {
            return {

            }
        },
        methods: {

        },
        components: {
            StarLevel
        }
    }

</script>
<style lang="sass">
    .food_pic {
        width: 80px;
        img {
            width: 100%;
        }
    }
    
    .food_text {
        margin-left: 15px;
        .food_title {
            width: 100%;
            padding: 5px 0;
            display: flex;
            overflow: hidden;
            line-height: 21px;
            img {
                width: 45px;
                height: 21px;
            }
            span:nth-of-type(1) {
                font-size: 15px;
                color: #313131;
                text-overflow: ellipsis;
                overflow: hidden;
                white-space: nowrap;
                margin-left: 8px;
            }
            span:nth-of-type(2) {
                font-size: 12px;
                color: #959595;
                display: block;
                width: 23px;
                height: 20px;
                border: 1px solid #dbdbdb;
                border-radius: 3px;
                text-align: center;
                font-weight: normal;
                align-self: stretch;
            }
        }
    }
</style>