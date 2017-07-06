<template>
    <div>
        <div class='searchAddress'>
            <mt-header class='header'>
                <router-link to="/my/address/confirmAddress" slot="left">
                    <mt-button icon="back">上海</mt-button>
                </router-link>
            </mt-header>
            <mt-search autofocus v-model="value" :result="filterResult" class='search'></mt-search>
        </div>

        <section>
            <mt-navbar class="page-part" v-model="selected">
                <mt-tab-item id="1">全部</mt-tab-item>
                <mt-tab-item id="2">写字楼</mt-tab-item>
                <mt-tab-item id="3">小区</mt-tab-item>
                <mt-tab-item id="4">学校</mt-tab-item>
            </mt-navbar>
            <mt-tab-container v-model="selected">
                <mt-tab-container-item id='1'>
                    <router-link 
                    :to="{path:'confirmAddress',query:{title:item.title,address:item.address,lng:item.point.lng,lat:item.point.lat}}" 
                    v-for='item in posList' :key='item'>
                        <mt-cell :title="item.title"  :label='item.address'>
                            <img slot="icon" src="../../../assets/images/address_icon.png" width="18" height="24">
                        </mt-cell>
                    </router-link>

                </mt-tab-container-item>
                <mt-tab-container-item id='2'>
                    <mt-cell :title="item1.title" v-for='item1 in posList' :label='item1.address'>
                        <img slot="icon" src="../../../assets/images/address_icon.png" width="18" height="24">
                    </mt-cell>
                </mt-tab-container-item>
                <mt-tab-container-item id='3'>
                    <mt-cell :title="item2.title" v-for='item2 in posList' :label='item2.address'>
                        <img slot="icon" src="../../../assets/images/address_icon.png" width="18" height="24">
                    </mt-cell>
                </mt-tab-container-item>
                <mt-tab-container-item id='4'>
                    <mt-cell :title="item3.title" v-for='item3 in posList' :label='item3.address'>
                        <img slot="icon" src="../../../assets/images/address_icon.png" width="18" height="24">
                    </mt-cell>
                </mt-tab-container-item>
            </mt-tab-container>
        </section>
        <section id='mymap'></section>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                value: '',
                defaultResult: [
                    'Apple',
                    'Banana',
                    'Orange',
                    'Durian',
                    'Lemon',
                    'Peach',
                    'Cherry',
                    'Berry',
                    'Core',
                    'Fig',
                    'Haw',
                    'Melon',
                    'Plum',
                    'Pear',
                    'Peanut',
                    'Other'
                ],
                selected: '1',
                startX: '',
                moveX: '',
                posList: [],
                myKeys: ["写字楼", "加油站", '园区', '学校', '大厦', '商业街', '小区'] //初始搜索类型
            }
        },
        computed: {
            filterResult() {
                return this.defaultResult.filter(value => new RegExp(this.value, 'i').test(value));
            }
        },
        methods: {
            searchPos() {
                var vm = this;
                var bm = new BMap.Map("mymap");
                var position = vm.$store.state.position;
                bm.centerAndZoom(new BMap.Point(position.x, position.y), 11);

                var local = new BMap.LocalSearch(bm, {
                    renderOptions: { map: bm, panel: "r-result" },
                    pageCapacity: 5,
                    onSearchComplete: function (res) {

                    },
                    onMarkersSet: function (pois) {
                        vm.posList = pois;
                    },
                    onInfoHtmlSet: function (poi) {
                        // vm.position = poi;
                        // console.log(poi)
                    }
                });
                local.searchInBounds(vm.myKeys, bm.getBounds());
            }
        },
        mounted() {
            // 初始化位置
            this.searchPos();
        },
        watch: {
            selected(val, oldVal) {
                switch (val) {
                    case '1':
                        this.myKeys = ["写字楼", "加油站", '园区', '学校', '大厦', '商业街', '小区'];
                        break;
                    case '2':
                        this.myKeys = ["写字楼"];
                        break;
                    case '3':
                        this.myKeys = ["小区"];
                        break;
                    case '4':
                        this.myKeys = ["学校"];
                        break;
                    default:
                        break;
                }
                this.searchPos();
            }
        }
    }

</script>
<style lang='sass' scoped>
    .searchAddress {
        position: relative;
        .header {}
        .search {
            position: absolute;
            right: 0px;
            top: -2px;
            height: 40px;
            width: 300px;
        }
    }
    
    #mymap {
        width: 100%;
        height: 1px;
        visibility: hidden;
    }
</style>
<style lang='sass'>
    .searchAddress {
        .mint-header {
            background: #fff!important;
            color: #0f0f0f!important;
        }
        .mint-searchbar {
            background: #fff!important;
        }
        .mint-searchbar-inner input {
            background: #f5f5f5;
        }
        .mint-searchbar-inner {
            background: #f5f5f5;
            border-radius: 50px;
        }
    }
</style>