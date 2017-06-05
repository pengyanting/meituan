<!DOCTYPE html>
<html>

<head>
    <title>中草药学习鉴赏网站</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/baike.css">
</head>

<body>
    <header class='header'>
        <img src="img/logo1.jpg" alt="">
        <img src="img/logo2.jpg" alt="">
    </header>
    <div class="container">
    <div class="header-bottom">
        <div class="top-nav">
            <ul>
                <li><a href="index.php">首页</a></li>
                <li class="active"><a href="baike.php">中草药百科</a></li>
                <li><a href="fenlei.php">中草药分类</a></li>
                <li><a href="life.php">生活小配方</a></li>
                <li><a href="user.php">交流园地</a></li>
                <li><a href="login.php">用户登录</a></li>
            </ul>
        </div>
        <div class="username" >当前用户：<a href="information.php"></a></div>
        <div class="clearfix"></div>
    </div>
    
        <div class="sm_nav">
            <div class="nav_inner fix">
                <div class="left_nav">
                    <img src="img/nav-icon.png" alt="">
                    <a href="baike.php">中草药百科</a>
                    <a href="xinglin.php">杏林拾趣</a>
                    <a href="javascript:;" class='lastnav'></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style='padding:30px 0;'>
        <div class="col-md-8 in-profile">
            <div class="add">
                <h4></h4>
            </div>
            <div class="our-grid"></div>
        </div>
        <div class="about">
            <div class="about-in">
                <div class="col-md-4 in-profile baikelist">
                    <h4>杏林拾趣</h4>
                    <!--<div class="col-in-about">
                        <span class="in-sed">※</span>
                        <div class="left-sit">
                            <h6><a href="#">基本信息</a></h6>
                        </div>
                        <div class="clearfix"> </div>
                    </div>-->
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <!--footer-->
        <div class="footer">
            <p class="cr">Copyright 2017©刘倩所有 忻州师范学院计算机系 </p>
        </div>
    </div>
</body>
<script src='js/jquery.js'></script>
<script src='js/common.js'></script>
<script>
    $(function () {
        $.ajax({
            type: 'POST',
            url: "php/xinglin/list.php",
            dataType: "json",
            data: {
                id: GetQueryString('id')
            },
            success: function (data) {
                if (data.length > 0) {
                    $(".add h4").html(data[0].title);
                    $(".lastnav").html(data[0].type);
                    selDetail()
                }
            }
        })

        function selDetail() {
            $.ajax({
                type: 'POST',
                url: "php/xinglin/seldetail.php",
                dataType: "json",
                data: {
                    xinglinid: GetQueryString('id')
                },
                success: function (data) {
                    if (data.length > 0) {
                        var str = '';
                        for (var i = 0; i < data.length; i++) {
                            str += '<p>   ' + data[i].content + '</p>'
                        }
                        $(".our-grid").html(str);
                    }
                }
            })
        }

        //查询百科列表
        function sellist() {
            $.ajax({
                type: 'POST',
                url: "php/xinglin/selone.php",
                dataType: "json",
                data: {

                },
                success: function (data) {
                    if (data.length > 0) {
                        var str = '';
                        for (var i = 0; i < data.length; i++) {
                            str += '<div class="col-in-about">' +
                                '<span class="in-sed">※</span>' +
                                '<div class="left-sit">' +
                                '<h6><a href="two.php?id='+data[i].id+'">'+data[i].type+'</a></h6>' +
                                '</div>' +
                                '<div class="clearfix"> </div>' +
                                '</div>'
                        }
                        $('.baikelist').append(str);
                    }
                }
            })
        }
         sellist();
    })
 $(function () {
         $(".username a").html(localStorage.getItem('username'))
})
</script>

</html>