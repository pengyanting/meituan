<template>
    <div>
        <div class='searchAddress'>
            <mt-header class='header'>
                <router-link to="/my/address/confirmAddress" slot="left">
                    <mt-button icon="back"></mt-button>
                </router-link>
            </mt-header>
            <span class='cityName' @click='handleCityList'>{{cityName}}</span>
            <mt-search autofocus v-model="value" :result="filterResult" class='search'></mt-search>
        </div>
        <section id='mymap'></section>
        <section v-if='show=="pos"' class='nav'>
            <mt-navbar class="page-part" v-model="selected">
                <mt-tab-item id="1">全部</mt-tab-item>
                <mt-tab-item id="2">写字楼</mt-tab-item>
                <mt-tab-item id="3">小区</mt-tab-item>
                <mt-tab-item id="4">学校</mt-tab-item>
            </mt-navbar>
            <mt-tab-container v-model="selected">
                <mt-tab-container-item id='1'>
                    <router-link :to="{path:'confirmAddress',query:{title:item.title,address:item.address,lng:item.point.lng,lat:item.point.lat}}"
                        v-for='item in posList' :key='item'>
                        <mt-cell :title="item.title" :label='item.address'>
                            <img slot="icon" src="../../../assets/images/address_icon.png" width="18" height="24">
                        </mt-cell>
                        </router-link>
                </mt-tab-container-item>
                <mt-tab-container-item id='2'>
                    <router-link :to="{path:'confirmAddress',query:{title:item1.title,address:item1.address,lng:item1.point.lng,lat:item1.point.lat}}"
                        v-for='item1 in posList' :key='item1'>
                        <mt-cell :title="item1.title" :label='item1.address'>
                            <img slot="icon" src="../../../assets/images/address_icon.png" width="18" height="24">
                        </mt-cell>
                        </router-link>
                </mt-tab-container-item>
                <mt-tab-container-item id='3'>
                    <router-link :to="{path:'confirmAddress',query:{title:item2.title,address:item2.address,lng:item2.point.lng,lat:item2.point.lat}}"
                        v-for='item2 in posList' :key='item2'>
                        <mt-cell :title="item2.title" :label='item2.address'>
                            <img slot="icon" src="../../../assets/images/address_icon.png" width="18" height="24">
                        </mt-cell>
                        </router-link>
                </mt-tab-container-item>
                <mt-tab-container-item id='4'>
                    <router-link :to="{path:'confirmAddress',query:{title:item3.title,address:item3.address,lng:item3.point.lng,lat:item3.point.lat}}"
                        v-for='item3 in posList' :key='item3'>
                        <mt-cell :title="item3.title" :label='item3.address'>
                            <img slot="icon" src="../../../assets/images/address_icon.png" width="18" height="24">
                        </mt-cell>
                        </router-link>
                </mt-tab-container-item>
            </mt-tab-container>
        </section>
        <section class='cityList' v-else-if='show=="cityList"'>
            <cityList :currentPos='cityName' @selectCity='selectCity'></cityList>
        </section>
        <section class='searchList'>

        </section>
    </div>
</template>
<script>
    import cityList from '../../../components/cityList.vue'
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
                myKeys: ["写字楼", "加油站", '园区', '学校', '大厦', '商业街', '小区'],//初始搜索类型
                map: '',
                cityName: '',
                cityList: '',
                show: 'cityList'
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
                vm.map = new BMap.Map("mymap");
                var position = vm.$store.state.position;
                vm.map.centerAndZoom(new BMap.Point(position.x, position.y), 11);
                vm.queryCity();
            },
            getCity() {
                // 百度地图API功能
                var vm = this;
                var myCity = new BMap.LocalCity();
                myCity.get(function (result) {
                    vm.cityName = result.name
                });
            },
            handleCityList() {
                this.show = this.show == 'cityList' ? 'pos' : 'cityList'
            },
            selectCity(val) {
                //通过城市名称定位
                var vm = this;
                vm.map.centerAndZoom(val.name, 11);      // 用城市名设置地图中心点
                vm.queryCity();
                this.show = 'pos'
            },
            queryCity() {
                var vm = this;
                var local = new BMap.LocalSearch(vm.map, {
                    renderOptions: { map: vm.map, panel: "r-result" },
                    pageCapacity: 20,
                    onSearchComplete: function (res) {

                    },
                    onMarkersSet: function (pois) {
                        vm.posList = pois;
                        console.log(vm.posList)
                    },
                    onInfoHtmlSet: function (poi) {

                    }
                });
                local.searchInBounds(vm.myKeys, vm.map.getBounds());
            }
        },
        mounted() {
            // 初始化位置
            this.searchPos();
            this.getCity();
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
                this.queryCity();
            }
        },
        components: {
            cityList
        }
    }

</script>
<style lang='sass' scoped>
    .searchAddress {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        z-index: 10;
        .cityName {
            position: absolute;
            left: 30px;
            top: 13px;
        }
        .search {
            position: absolute;
            right: 0px;
            top: -2px;
            height: 40px;
            width: 300px;
        }
    }
    
    .nav {
        margin-top: 40px;
    }
    
    #mymap {
        width: 100%;
        height: 1px;
        visibility: hidden;
    }
    
    .cityList {
        position: relative;
        left: 0;
        top: 39px;
        background: #fff;
        width: 100%;
    }
    .searchList{

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