<template>
    <div class='box'>
        <HeadTop title='交易明细列表' style='margin-bottom:40px;'></HeadTop>
        <div style='border-bottom: 1px solid #f2f2f2;background:#fff;'>
            <div class="nav" @touchstart='start' ref='nav' @touchmove='move'>
                <mt-button size="small" @click.native.prevent="active = 'tab-container1'">全部</mt-button>
                <mt-button size="small" @click.native.prevent="active = 'tab-container2'">订单退款</mt-button>
                <mt-button size="small" @click.native.prevent="active = 'tab-container3'">提现退款</mt-button>
                <mt-button size="small" @click.native.prevent="active = 'tab-container3'">消费</mt-button>
                <mt-button size="small" @click.native.prevent="active = 'tab-container3'">提现</mt-button>
                <mt-button size="small" @click.native.prevent="active = 'tab-container3'">拉新奖励</mt-button>
            </div>
        </div>
        <div class='tips' v-if='isShowTip'>
            <span class='close' @click='closeTip'>+</span>
            <p>交易明信展示近一个月资金交易数据；</p>
            <p>余额交易明细搭建中，可在[我的余额]中查看完整交易流水</p>
        </div>
        <ImgTip text='暂无明细记录' isBtn imgUrl='./src/assets/images/order-nologin1.png'></ImgTip>
    </div>
</template>
<script>
import HeadTop from '../../../components/HeadTop.vue'
import ImgTip from '../../order/noLogin.vue'
export default {
    data() {
        return {
            startX: '',
            moveX: '',
            isShowTip:true
        }
    },
    methods: {
        start(e) {
            const nav = this.$refs.nav;
            this.startX = e.changedTouches[0].clientX;
        },
        move(e) {
            const nav = this.$refs.nav;
            this.moveX = e.changedTouches[0].clientX - this.startX;
            if (this.moveX > 0) {
                this.moveX = 0;
            } else if (this.moveX < (nav.offsetWidth - document.documentElement.clientWidth)) {
                this.moveX = -(nav.offsetWidth - document.documentElement.clientWidth);
            }
            nav.style.marginLeft = this.moveX + 'px';
        },
        closeTip(){
            this.isShowTip=false;
        }
    },
    components: {
        HeadTop,
        ImgTip
    }
}

</script>
<style lang='sass' scoped>
    .box {
        overflow-x: hidden;
        width:100%;
        height:100%;
        background:#f4f4f4;
    }
    .nav {
        padding: 10px;
        width: 510px;
        button {
            background: #fff;
            border: 1px solid #dcdcdc;
            border-radius: 40px;
            height: 24px;
            box-shadow: none;
            margin-right: 10px;
        }
    }
    .tips{
        margin-top:5px;
        width: 100%;
        background:#fefadd;
        padding:10px;
        position:relative;
        p{
            font-size:12px;
        }
    }
    .close{
        display:block;
        position:absolute;
        transform:rotate(45deg);
        right:5px;
        font-size:30px;
        top:50%;
        margin-top:-20px;
        color:#999999;
    }
</style>