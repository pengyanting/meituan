<template>
    <div style='height:100%;'>
        <HeadTop title='确认收货地址'></HeadTop>
        <section id='mymap' ref='mymap'></section>
        <div class='footer'>
            <div class='address'>
                <mt-cell :title="position.title" is-link to='/my/address/searchAddress'>
                    <img slot="icon" src="../../../assets/images/address_icon.png" width="18" height="24">
                </mt-cell>
                <mt-cell :title="position.address">
                    <img slot="icon" src="../../../assets/images/space_icon.png" width="18" height="24">
                </mt-cell>
            </div>
            <mt-button class='btn' @click='confirm'>确定</mt-button>
        </div>
    </div>
</template>
<script>
import HeadTop from '../../../components/HeadTop.vue'
import BMap from 'BMap'
import axios from 'axios'
export default {
    data() {
        return {
            address: '',
            position: {}
        }
    },
    components: {
        HeadTop
    },
    methods: {
        confirm() {
            this.$store.dispatch('ADDRESS', this.position);
            this.$router.push({ 'path': '/my/address/addAddress' })
        },
        init() {
            var vm = this;
            var result = vm.$route.query
            var geolocation = new BMap.Geolocation()
            geolocation.getCurrentPosition(function (position) {
                var x = position.point.lng;
                var y = position.point.lat;
                axios.get('http://cangdu.org:8001/v2/pois/'+y+','+x).then(res => {
                    
                })
                if (result.title) {
                    var ggPoint = new BMap.Point(result.lng, result.lat);
                } else {
                    var ggPoint = new BMap.Point(x, y);
                }


                var bm = new BMap.Map("mymap");
                bm.centerAndZoom(ggPoint, 15);
                bm.addControl(new BMap.NavigationControl());
                var marker = new BMap.Marker(ggPoint);// 创建标注
                bm.addOverlay(marker);
                marker.enableDragging(); //设置标注可拖拽
                //添加gps marker和label
                var markergg = new BMap.Marker(ggPoint);
                bm.addOverlay(markergg); //添加GPS marker
                var labelgg = new BMap.Label('送到这里', { offset: new BMap.Size(20, -10) });
                markergg.setLabel(labelgg); //添加GPS label

                var geoc = new BMap.Geocoder();
                bm.addEventListener("click", function (e) {
                    // 百度地图API功能
                    var myKeys = ["写字楼", "加油站", '园区', '学校', '大厦', '商业街', '小区'];
                    var local = new BMap.LocalSearch(bm, {
                        renderOptions: { map: bm, panel: "r-result" },
                        pageCapacity: 5,
                        onSearchComplete: function (res) {
                        },
                        onMarkersSet: function (pois) {

                        },
                        onInfoHtmlSet: function (poi) {
                            vm.position = poi;
                        }
                    });
                    local.searchInBounds(myKeys, bm.getBounds());
                });

                // 添加定位控件
                var geolocationControl = new BMap.GeolocationControl({ offset: new BMap.Size(20, 580) });
                geolocationControl.addEventListener("locationSuccess", function (e) {
                    // 定位成功事件
                    var address = '';
                    address += e.addressComponent.province;
                    address += e.addressComponent.city;
                    address += e.addressComponent.district;
                    address += e.addressComponent.street;
                    address += e.addressComponent.streetNumber;
                    vm.address = address
                });
                geolocationControl.addEventListener("locationError", function (e) {
                    // 定位失败事件
                    alert(e.message);
                });
                bm.addControl(geolocationControl);

                // 百度地图API功能
                var myKeys = ["园区", "加油站", '园区', '学校', '大厦', '商业街', '小区'];
                var local = new BMap.LocalSearch(bm, {
                    renderOptions: { map: bm, panel: "r-result" },
                    pageCapacity: 5,
                    onSearchComplete: function (res) {

                    },
                    onMarkersSet: function (pois) {

                    },
                    onInfoHtmlSet: function (poi) {

                        if (result.title) {
                            vm.position = result;
                            vm.$store.dispatch('POSITION', { 'x': result.lng, 'y': result.lat })
                        } else {
                            vm.position = poi;
                            vm.$store.dispatch('POSITION', { 'x': poi.point.lng, 'y': poi.point.lat })
                        }

                    }
                });
                local.searchInBounds(myKeys, bm.getBounds());
            });
        }
    },
    mounted() {



        this.init();

    }
}

</script>
<style lang='sass' scoped>
    #mymap {
        width: 100%;
        height: 100%;
    }
    
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        padding: 10px;
        .btn {
            width: 100%;
            background: #00C361;
            color: #fff;
            border: none;
            margin-top: 10px;
        }
    }
</style>
<style lang='sass'>
    .address .mint-cell-title {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
</style>