<template>
    <div>
         <HeadTop title='余额问题' style='margin-bottom:40px;'></HeadTop>
         <article>
             <h5>Q1:使用余额的条件？</h5>
             <p>为了账户的安全，使用余额前必须先绑定手机号。</p>
         </article>
         <article>
             <h5>Q2:余额可以怎么用？</h5>
             <p>余额可以在饿了么外卖平台上使用（当余额大于等于消费金额时可使用余额支付）。</p>
         </article>
         <article>
             <h5>Q3:余额提现有什么规则？</h5>
             <p>为了保护账号和资金安全，每个用户（拥有相同手机号、支付账号、饿了么账号与硬件设备的用户，均视为同一个账户）单日仅可提现一次，提现最高限额为50元。</p>
         </article>
         <article>
             <h5>Q4:提现到账支持哪些银行？</h5>
             <p>目前在银行列表可选择的银行都支持。请认证填写银行卡信息（银行卡号、持卡人姓名、银行名称）。不正确的信息会造成提现失败。</p>
         </article>
         <article>
             <h5>Q5:提现申请成功后多久可以到账？</h5>
             <p>由于收款银行不同，到账速度也会不同。一般提现到账时间为3-5个工作日。</p>
         </article>
         <article>
             <h5>Q6：为什么我的提现会失败？</h5>
             <p>提现失败的原因可能有：银行开信息填写错误；账号存在风险被饿了么风控拦截；超出当日提现规则。</p>
         </article>
    </div>
</template>
<script>
    import HeadTop from '../../../components/HeadTop.vue'
    export default {
        data(){
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
   article{
       padding: 15px 10px;
       h5{
           margin-bottom:5px;
           font-size:14px;
           color:#323232;
       }
       p{
           color: #606060;
           line-height: 20px;
       }
   }
</style>