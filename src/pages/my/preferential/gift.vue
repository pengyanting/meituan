<template>
  <div style='background:#f7f7f7;height:700px;width:100%;'>
    <section class='giftList'>
      <div class='giftItem'>
        <div>
          <h5>推荐有奖</h5>
          <p>5元现金拿不停</p>
        </div>
        <img src="../../../assets/images/gift2.png" alt="">
      </div>
      <div class='giftItem'>
        <div>
          <h5>免费霸王餐</h5>
          <p>领20元红包</p>
        </div>
        <img src="../../../assets/images/gift1.png" alt="">
      </div>
    </section>
  </div>
</template>
<script>
export default {
  data() {
    return {

    }
  },
  methods: {

  },
  components: {
  }
}
</script>
<style lang='sass' scoped>
    .giftList{
       display:flex;
       justify-content: space-between;
       padding:0 5px;
       width:100%;
       .giftItem{
         display:flex;
         background:#fff;
         box-shadow:2px 2px 10px #ccc;
         margin:15px 5px 0;
         flex:1;
         justify-content: space-between;
         padding:10px;
         img{
           width:6rem;
           height:6rem;
         }
         h5{
           font-size:14px;
         }
         p{
           font-size:12px;
           color:#9c9a9c;
         }
       }
    }
</style>
