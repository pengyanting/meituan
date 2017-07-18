<template>
    <div class='footBottom'>
        <mt-tabbar class='footBox' v-model='selected'>
            <mt-tab-item id="外卖">
                <i class="icon-wai"></i> <span>外卖</span>
            </mt-tab-item>
            <mt-tab-item id="发现">
                <i class="icon-order"></i><span>发现</span>
            </mt-tab-item>
            <mt-tab-item id="订单">
                <i class="icon-find"></i><span>订单</span>
            </mt-tab-item>
            <mt-tab-item id="我的">
                <i class="icon-my"></i><span>我的</span>
            </mt-tab-item>
        </mt-tabbar>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                selected: this.title
            }
        },
        watch: {
            selected: function (val, oldVal) {
                switch (val) {
                    case '外卖':
                        this.$router.push({ path: '/home' });
                        break;
                    case '发现':
                        this.$router.push({ path: '/find' });
                        break;
                    case '订单':
                        this.$router.push({ path: '/order' });
                        break;
                    case '我的':
                        this.$router.push({ path: '/my' });
                        break;
                    default:
                }
            }
        },
        methods: {
            
        },
        props:['title'],
        mounted() {
            //默认打开外卖频道
            // this.$router.push({ path: '/my' });
        }
    }

</script>
<style lang="sass">
    @import "../assets/scss/iconfont.scss";
    .mint-tab-item-label {
        color: #656565!important;
    }
    
    .mint-tabbar {
        position: fixed!important;
        left: 0!important;
        bottom: 0!important;
        z-index: 99999;
    }
    
    .footBox {
        display: flex;
        a {
            flex: 1;
        }
    }
</style>