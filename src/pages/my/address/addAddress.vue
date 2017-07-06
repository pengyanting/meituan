<template>
    <div>
        <HeadTop title='新增地址' style='margin-bottom:40px;'></HeadTop>
        <section>
            <div class='pageSide'>
                <mt-field label="联系人" placeholder="姓名" :attr="{ maxlength: 10 }"></mt-field>
                <Tag :list='list' @valueChange='selectSex' value=''></Tag>
                <mt-field label="电话" placeholder="请输入手机号" type="tel"></mt-field>
                <div @click='toMap'><mt-field label="地址" placeholder="选择收货地址" disabled class='address' v-model='position.address' ></mt-field></div>
                <mt-field label="门牌号" placeholder="例：26号楼205室"></mt-field>
                <Tag :list='Taglist' @valueChange='selectTag' value=''></Tag>
            </div>
            <div class='btnBox'>
                <mt-button class='btn'>确定</mt-button>
            </div>
        </section>
    </div>
</template>
<script>
    import HeadTop from '../../../components/HeadTop.vue'
    import Tag from '../../../components/tag.vue'
    export default {
        data() {
            return {
               list:[
                   {
                       value:'女士'
                   },{
                       value:'先生'
                   }
               ],
               Taglist:[{
                   value:'家'
               },{
                   value:'公司'
               },{
                   value:'学校'
               }],
               sex:'',
               tag:'',
               position:{}
            }
        },
        methods:{
            selectSex(value){
                this.sex=value;
            },
            selectTag(value){
                this.tag=value;
            },
            toMap(){
                this.$router.push({'path':'/my/address/confirmAddress'})
            }
        },
        components: {
            HeadTop,
            Tag
        },
        mounted () {
           this.position=this.$store.state.address;
           this.$store.dispatch('ADDRESS' ,{})
        }
    }

</script>
<style lang='sass'>
    .pageSide {
         .address{
             .mint-field-core{
                 background:#fff;
             }
         }
    }
</style>
<style lang='sass' scoped>
    .pageSide {
        .address{
            position: relative;

        }
        .address:after{
            content:'>';
            position:absolute;
            right:10px;
            font-size:20px;
            color:#7D7D7D;
            font-family: '宋体';
            top:50%;
            margin-top:-12px;
        }
    }
    .btnBox{
        width:100%;
        padding:20px 10px;
        .btn{
            width:100%;
            background:#00C361;
            color:#fff;
            border:none;
        }
    }
</style>