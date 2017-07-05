<template>
    <div style='height:100%;'>
        <HeadTop title='确认收货地址'></HeadTop>
        <section id='mymap' ref='mymap'></section>
        <div class='footer'>
            <div class='address'>
                <mt-cell title="天地软件园" is-link>
                    <img slot="icon" src="../../../assets/images/address_icon.png" width="18" height="24">
                </mt-cell>
                <mt-cell title="中江路">

                </mt-cell>
            </div>
            <mt-button class='btn'>确定</mt-button>
        </div>
    </div>
</template>
<script>
    import HeadTop from '../../../components/HeadTop.vue'
    import BMap from 'BMap'
    export default {
        data() {
            return {
                address: '',
            }
        },
        components: {
            HeadTop
        },
        methods: {

        },
        mounted() {
            var vm = this;

            //获取GPS坐标
            var geolocation = new BMap.Geolocation()
            geolocation.getCurrentPosition(function (position) {
                var x = position.point.lng;
                var y = position.point.lat;
                var ggPoint = new BMap.Point(x, y);

                //地图初始化
                var bm = new BMap.Map("mymap");
                bm.centerAndZoom(ggPoint, 15);
                bm.addControl(new BMap.NavigationControl());
                var marker = new BMap.Marker(ggPoint);// 创建标注
                bm.addOverlay(marker);
                marker.enableDragging(); //设置标注可拖拽
                //添加gps marker和label
                // var markergg = new BMap.Marker(ggPoint);
                // bm.addOverlay(markergg); //添加GPS marker
                // var labelgg = new BMap.Label('送到这里', { offset: new BMap.Size(20, -10) });
                // markergg.setLabel(labelgg); //添加GPS label

                var geoc = new BMap.Geocoder();
                bm.addEventListener("click", function (e) {
                    var pt = e.point;
                    geoc.getLocation(pt, function (rs) {
                        var addComp = rs.addressComponents;
                        vm.address = addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber
                        console.log(vm.address)
                    });
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
                var myKeys = ["公司", "加油站",'园区'];
                var local = new BMap.LocalSearch(bm, {
                    renderOptions: { map: bm, panel: "r-result" },
                    pageCapacity: 5,
                    onSearchComplete:function(res){
                    //   console.log(res)
                    },
                    onMarkersSet:function(pois){
                       console.log(pois)
                    }
                });
                local.searchInBounds(myKeys, bm.getBounds());
            });
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