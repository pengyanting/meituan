<template>
    <div>
        <HeadTop title='我的收藏' style='margin-bottom:39px;'></HeadTop>
        <div v-for='item in $root._data.list.list' :key='item' @touchstart='start' @touchmove='move' @touchend='end'>
            <List :foodList='item'></List>
        </div>
        <section class='more'>
            <h6 @click='showMore'>展开超出配送范围的商家</h6>
            <div v-if='more'  >
                <div v-for='item in $root._data.list.list' :key='item' @touchstart='start' @touchmove='move' @touchend='end'>
                    <List :foodList='item'></List>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import HeadTop from '../../../components/HeadTop.vue'
import List from '../../../components/List.vue'
import { MessageBox, Toast } from 'mint-ui';
export default {
    data() {
        return {
            more: false,
            timeOutEvent: 0
        }
    },
    methods: {
        showMore() {
            this.more = true;
        },
        start(e) {
            this.timeOutEvent = setTimeout(this.longTouch, 1000);
        },
        move(e) {
            clearTimeout(this.timeOutEvent);
            this.timeOutEvent = 0;
            
        },
        end(e) {
            clearTimeout(this.timeOutEvent);
            if (this.timeOutEvent != 0) {
                // alert('不是长按')
                this.$router.push({'path':'/waimai/listDetail'})
            }
            return false;
        },
        longTouch() {
            this.timeOutEvent = 0;
            // alert('长按')
            MessageBox.confirm('确定删除该收藏的商家?', '删除收藏').then(val=>{
                if(val=='confirm'){
                     Toast('删除成功');
                }
            });
        }
    },
    components: {
        HeadTop,
        List
    }
}
</script>
<style lang='sass' scoped>
  .more{
      h6{
          width:100%;
          padding:10px;
          text-align:center;
      }
  }
</style>


