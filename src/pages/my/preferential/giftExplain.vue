<template>
    <div>
        <HeadTop title='红包说明' style='margin-bottom:40px;'></HeadTop>
        <article>
            <h5>Q1:怎么获得红包？</h5>
            <ul>
                <li>抢微信朋友的火爆获得；</li>
                <li>玩游戏得红包（仅限Android客户端）；</li>
            </ul>
        </article>
        <article>
            <h5>Q2:红包如何使用？</h5>
            <ul>
                <li>红包仅限订单在线支付时使用；</li>
                <li>每个订单限使用一个红包,每天最多可使用2个红包；</li>
                <li>每个红包只能使用一次，不能叠加或拆分使用；</li>
                <li>红包如有使用金额门槛，则购物车金额需满足金额门槛才能使用;</li>
                <li>红包如有品类、商家、手机号或时段限制，订单需满足相应条件后才可使用；</li>
                <li>红包使用不设找零，如红包可抵扣金额大于订单金额，则订单需支付0.01元。</li>
            </ul>
        </article>
        <article>
            <h5>Q3:下单的时候使用了红包，但是后来订单取消了，红包还会返还吗？</h5>
            <ul>
                <li>会的，订单无效后红包会自动返还到您的账户里。</li>
            </ul>
        </article>
        <article>
            <h5>Q4:红包兑换码怎样兑换成红包，怎样查看红包？</h5>
            <ul>
                <li>在个人中心>我的红包>兑换红包，输入兑换码进行兑换。</li>

            </ul>
        </article>
        <article>
            <h5>Q5:预定早餐、预定午餐的红包怎么使用？在哪里查询？</h5>
            <ul>
                <li>预定早餐、预定晚餐的红包暂时不支持点外卖使用，并且当前点外卖的红包也暂时不支持在预定早餐、预定午餐时使用；</li>
                <li>于东早餐、预定午餐的红包从App首页点击“预定早餐”按钮进入后在右上角的个人中心查找预定早餐、预定晚餐的红包。</li>
            </ul>
        </article>
        <article>
            <h5>Q6：互拆红包怎么使用？</h5>
            <ul>
               <li>互拆红包不去其他优惠活动（包含单不限于：新用户专享、满X元减X元、满X元赠X元）同时使用。</li>
            </ul>
        </article>
         <article>
            <h5>Q7：互拆红包怎么使用？</h5>
            <ul>
               <li>互拆红包不去其他优惠活动（包含单不限于：新用户专享、满X元减X元、满X元赠X元）同时使用。</li>
            </ul>
        </article>
         <article>
            <h5>Q8：互拆红包怎么使用？</h5>
            <ul>
               <li>互拆红包不去其他优惠活动（包含单不限于：新用户专享、满X元减X元、满X元赠X元）同时使用。</li>
            </ul>
        </article>
    </div>
</template>
<script>
    import HeadTop from '../../../components/HeadTop.vue'
    export default {
        data() {
            return {

            }
        },
        methods: {

        },
        components: {
            HeadTop
        }
    }

</script>
<style lang='sass' scoped>
    article {
        padding: 15px 10px;
        h5 {
            margin-bottom: 5px;
            font-size: 14px;
            color: #323232;
        }
        ul {
            color: #606060;
            line-height: 20px;
            padding: 0 0 0 30px;
            li {
                list-style-type: disc;
            }
        }
    }
</style>