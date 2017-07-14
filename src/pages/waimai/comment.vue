<template>
    <div>
        <section class='score'>
            <div class='overall'>
                <li>4.7</li>
                <li>综合评分</li>
                <li>高于周围商家9.3%</li>
            </div>
            <ul class='other'>
                <li class='service'>
                    <span>服务态度</span>
                    <StartLevel :score='score.overall_score'></StartLevel>
                </li>
                <li class='shop'>
                    <span>商品评分</span>
                    <StartLevel :score='score.overall_score'></StartLevel>
                </li>
                <li class='time'>
                    <span>送达时间</span>
                    <span>20分钟</span>
                </li>
            </ul>
        </section>
        <section class='commentBox'>
            <div class="nav">
                <mt-button :class="{'btn':true,'dissatisfied':item.name=='不满意','active':item.name==active}" v-for='item in commentType' :key='item' size="small" @click.native.prevent="getCommentList(item)">{{item.name}}({{item.count}})</mt-button>
            </div>
            <div class="page-loadmore-wrapper" ref="wrapper" :style="{ height: wrapperHeight + 'px',background:'#fff' }">
                <mt-loadmore :bottom-method="loadBottom" @bottom-status-change="handleBottomChange" :bottom-all-loaded="allLoaded" ref="loadmore">
                    <ul class="commentList">
                        <li class='commentItem' v-for='item in commentList' :key='item'>
                            <img :src="getImgPath(item.avatar)" alt="">
                            <div class='commentList_r'>
                                <div class='name'>
                                    <span>{{item.username}}</span>
                                    <span>{{item.rated_at}}</span>
                                </div>
                                <div class='service'>
                                    <p>
                                        <span>商家服务：</span>
                                        <span>满意</span>
                                    </p>
                                    <p>
                                        <span>商品：</span>
                                        <span>满意</span>
                                    </p>
                                </div>
                                <div class='business'>商家回复：阿卡电脑卡死你看看见爱上你看啥看ask家电脑不卡机是拿不到阿克江睡不好觉三星</div>
                                <div class='category'>
                                    <span>娃娃菜：</span>
                                    <span>味道更好</span>
                                </div>
                                <img src="../../assets/images/my-head.png" alt="">
                            </div>
                        </li>
                    </ul>
                    <div slot="bottom" class="mint-loadmore-bottom">
                        <span v-show="bottomStatus !== 'loading'" :class="{ 'is-rotate': bottomStatus === 'drop' }">↑</span>
                        <span v-show="bottomStatus === 'loading'">
                            <mt-spinner type="snake"></mt-spinner>
                        </span>
                    </div>
                </mt-loadmore>
            </div>
        </section>
    </div>
</template>
<script>
import axios from 'axios'
import StartLevel from '../../components/starLevel.vue'
export default {
    data() {
        return {
            active: 'tab-container1',
            commentList: [],
            commentType: [],
            active: '全部',
            list: [],
            allLoaded: false,
            bottomStatus: '',
            wrapperHeight: 0
        }
    },
    props: ['score', 'id'],
    created() {
        this.getCommentType();
        this.getCommentList();
    },
    mounted() {
        this.wrapperHeight = document.documentElement.clientHeight - this.$refs.wrapper.getBoundingClientRect().top;
    },
    methods: {
        getCommentList(item) {
            var vm = this;
            vm.active=item == undefined?'全部':item.name
            axios.get(vm.$root._data.apiUrl + 'ugc/v2/restaurants/' + vm.id + '/ratings', {
                params: {
                    offset: 0,
                    limit: 10,
                    tag_name: vm.active
                }
            }).then(res=>{
                vm.commentList=res.data
                console.log(res.data)
            })
        },
        getCommentType() {
            var vm = this;
            axios.get(vm.$root._data.apiUrl + 'ugc/v2/restaurants/' + vm.id + '/ratings/tags').then(res => {
                vm.commentType = res.data;
            })
        },
        handleBottomChange(status) {
            this.bottomStatus = status;
        },

        loadBottom() {
            setTimeout(() => {
                let lastValue = this.list[this.list.length - 1];
                if (lastValue < 40) {
                    for (let i = 1; i <= 10; i++) {
                        this.list.push(lastValue + i);
                    }
                } else {
                    this.allLoaded = true;
                }
                this.$refs.loadmore.onBottomLoaded();
            }, 1500);
        },
        getImgPath(path){
            
        }
    },
    watch: {

    },
    components: {
        StartLevel
    }
}
</script>
<style lang='sass' scoped>
  .score{
      width:100%;
      padding:15px 0px;
      height:auto;
      border-top:1px solid #f2f2f2;
      border-bottom:1px solid #f2f2f2;
      display:flex;
      .overall{
          text-align:center;
          border-right:1px solid #f2f2f2;
          padding:0 20px;
          li{
              margin:5px 0;
          }
          li:first-child{
              color:#fe5337;
              font-size:30px;
          }
          li:nth-child(2){
              color:#696969;
              font-size:12px;
          }
           li:nth-child(3){
              color:#989898;
              font-size:12px;
          }
      }
      .other{
          padding:0 20px;
          li{
              display:flex;
              align-content:space-around;
              margin-bottom:17px;
              &>span{
                 color:#666666;
                 font-size:14px;
                 margin-right:10px;
              }
          }
          .time{
              margin:0;
          }
          .time>span:nth-child(2){
              color:#989898;
          }
      }
  }
  .commentBox{
      padding:10px 15px;
      background:#fff;
      .nav{
          padding:10px 0 0;
          border-bottom:1px dashed #f2f2f2;
          .btn{
              margin:0 10px 10px 0;
              border:none;
              background:#ebf5fe;
              color:#6a7682;
          }
          .dissatisfied{
              background:#f5f5f5;
              color:#ababab;
          }
          .active{
              background:#2194fe;
              color:#fff;

          }
      }
  }
  .commentList{
      padding-top:10px;
      background:#fff;
      .commentItem{
          display:flex;
          border-bottom:1px solid #f2f2f2;
          padding: 10px 0;
            &>img{
                width:40px;
                height:40px;
                margin-right:10px;
                border-radius:50%;
            }
            .commentList_r{
                img{
                    width:50px;
                    height:50px;
                }
                &>div{
                    margin-bottom:5px;
                    font-size:12px;
                }
                .name{
                    font-size:14px;
                    span:first-child{
                        color:#2f2f2f;
                        margin-right:5px;
                    }
                    span:nth-child(2){
                        color:#bbbbbb;
                    }
                }
                .service{
                    
                    display:flex;
                    p>span:first-child{
                        color:#646464;
                    }
                    
                    p:first-child{
                        padding-right:10px;
                        border-right:1px solid #f2f2f2;
                        margin-right:10px;
                    }
                }
                .business{
                    padding:10px;
                    background:#f2f2f2;
                    color:#636363;
                    border-radius:4px;
                    line-height:20px;
                    position:relative;
                    margin-top:13px;
                }
                .business:after{
                    content: '';
                    position: absolute;
                    left: 10px;
                    top: -7px;
                    width: 0;
                    height: 0;
                    border-left: 6px solid transparent;
                    border-right: 6px solid transparent;
                    border-bottom: 8px solid #f2f2f2;
                }
                .category{
                    span:first-child{
                        color:#0882c1;
                    }
                     span:last-child{
                        color:#323232;
                    }
                }
            }
        }
  }
  
</style>


