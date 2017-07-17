<template>
    <div>
        <section class="findBox">
            <h4>{{title}}</h4>
            <p class='titleDesc'>{{desc}}</p>
            <div class="findList">
                <div class="findListItem" v-for="item in list" :key='item'>
                    <img src="../assets/images/find-img1.png" alt="">
                    <p class="itemName">{{item.title}}</p>
                    <p>￥{{item.price}}</p>
                </div>
            </div>
            <div class="more">查看更多&gt;</div>
        </section>
    </div>
</template>
<script>
    export default {
        data() {
            return {

            }
        },
        props: ['title','list','desc']
    }

</script>
<style lang="sass">
 @import "../assets/scss/common.scss";
    .findBox {
        padding: 10px 0;
        h4 {
            text-align: center;
            background: url(../assets/images/find-title-bg.png) no-repeat center;
            background-size: contain;
        }
        .titleDesc {
            text-align: center;
            font-size: 12px;
            color: #979797;
            margin: 5px 0 10px 0;
        }
        .more {
            text-align: center;
        }
        .findList {
            display: flex;
            .findListItem {
                width: 33.3333%;
                padding: 0 10px;
                margin-bottom: 10px;
                .itemName {
                    @include textHidden;
                    margin: 3px 0 8px 0;
                    font-size: 13px;
                    color: #313131;
                }
                p:last-child {
                    font-size: 12px;
                    color: #f54a43;
                }
            }
            img {
                width: 100%;
            }
        }
    }
</style>