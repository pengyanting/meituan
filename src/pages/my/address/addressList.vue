<template>
    <div>
        <HeadTop title='收货地址' style='margin-bottom:40px;'></HeadTop>
        <section class='addressList'>
            <div class='addressItem'>
                <div class='text'>
                    <p><span>家</span>上海市普陀区中江路879号天地软件园</p>
                    <p><span>哈哈哈</span><span>女士</span><span>18017556806</span></p>
                </div>
                <img src="../../../assets/images/edit.png" width='20' height='20' alt="">
            </div>
        </section>
        <router-link class='footer' to="/my/address/addAddress"><span>+</span>新增地址</router-link>
    </div>
</template>
<script>
    import HeadTop from '../../../components/HeadTop.vue'
    export default {
        data() {
            return {

            }
        },
        components: {
            HeadTop
        }
    }

</script>
<style lang='sass' scoped>
    .addressList {
        .addressItem {
            background: #fff;
            border-bottom: 1px solid #f2f2f2;
            display: flex;
            padding: 10px;
            justify-content: space-between;
            align-items: center;
            .text {
                p {
                    line-height: 20px;
                }
                p:first-child {
                    display: flex;
                    align-items: center;
                    font-size: 14px;
                    color: #303030;
                    span {
                        display: inline-block;
                        color: #eb7454;
                        border: 1px solid #eb7454;
                        border-radius: 3px;
                        width: 25px;
                        height: 15px;
                        text-align: center;
                        line-height: 15px;
                        font-size: 12px;
                        margin-right: 3px;
                    }
                }
                p:nth-child(2) {
                    color: #646464;
                    font-size: 12px;
                    span {
                        margin-right: 5px;
                    }
                }
            }
        }
    }
    
    .footer {
        display: flex;
        justify-content: center;
        background: #fff;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        border-top: 1px solid #f2f2f2;
        height: 40px;
        align-items: center;
        font-size: 12px;
        color: #308ee5;
        span {
            display: block;
            border: 1px solid #308ee5;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            text-align: center;
            margin-right: 3px;
            line-height:20px;
        }
    }
</style>