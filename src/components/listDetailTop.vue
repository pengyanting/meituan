<template>
    <div>
        <div class='hd_box'>
            <mt-header>
                <router-link to="/" slot="left">
                    <mt-button icon="back"></mt-button>
                </router-link>
                <mt-button slot="right" icon="more"></mt-button>
                <mt-button slot="right" icon="more"></mt-button>
            </mt-header>
            <div class="page-cell">
                <mt-cell icon="more" is-link>
                    <div>
                        <div class='food_text'>
                            <section>
                                <h3 class='food_title'>
                                    <img  src="../assets/images/pinpai.png" alt="">
                                    <span>必胜客宅急送（锦秋店）</span>
                                </h3>
                                <div class='peisong'>
                                    <span class='fengniao'>蜂鸟专送</span>
                                    <ul class='peisongfei'>
                                        <li>￥4元起送</li>
                                        <span>|</span>
                                        <li>配送费￥4</li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                    <img slot="icon" src="../assets/images/kfc.png" width="100" height="100">
                </mt-cell>
            </div>
        </div>
    </div>
</template>
<script>

</script>
<style lang='sass'>
    .hd_box {
        background: url(../assets/images/bg.png) no-repeat center;
        background-size: cover;
        position: relative;
        .mint-header {
            background-color: transparent!important;
        }
        header ,.food_text{
            position: relative;
            z-index: 200;
        }
        .mint-cell {
            position: relative;
            z-index: 200;
            background-color: transparent!important;
        }
        .mint-cell:last-child,
        .mint-cell-wrapper {
            background-image: none!important;
        }
        .mint-cell-wrapper {
            padding: 0 10px 10px 10px;
        }
        .mint-cell-title{
            flex:0;
        }
        .food_text {
            margin-top: 5px;
            margin-left: 10px;
            flex-shrink: 0;
            flex-grow: 1;
            .food_title {
                width: 100%;
                padding: 5px 0;
                display: flex;
                overflow: hidden;
                line-height: 21px;
                img {
                    width: 45px;
                    height: 21px;
                    margin-right: 8px;
                }
                span:nth-of-type(1) {
                    font-size: 15px;
                    color: #fff;
                    text-overflow: ellipsis;
                    overflow: hidden;
                    white-space: nowrap;
                }
            }
            .peisong {
                display: flex;
                margin-top: 5px;
                justify-content: space-between;
                padding-bottom: 10px;
                margin-bottom: 10px;
                border: none;
                ul {
                    padding: 0;
                    margin: 0;
                }
                li {
                    float: left;
                    font-size: 12px;
                    color: #fff;
                }
                span {
                    float: left;
                    margin: 0 3px;
                    font-size: 12px;
                    color: #fff;
                }
                .distance li:nth-child(3) {
                    color: #1e91fb;
                }
                .fengniao{
                    
                }
            }
        }
    }
    
    .hd_box:after {
        content: '';
        position: absolute;
        display: inline-block;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        left: 0;
        top: 0;
    }
</style>