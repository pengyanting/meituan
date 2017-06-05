<!DOCTYPE html>
<html>

<head>
    <title>中草药学习鉴赏网站</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/baike.css" rel="stylesheet">
    <link href="css/fenlei.css" rel="stylesheet">
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
                    <li><a href="baike.php">中草药百科</a></li>
                    <li class="active"><a href="fenlei.php">中草药分类</a></li>
                    <li><a href="life.php">生活小配方</a></li>
                    <li><a href="user.php">交流园地</a></li>
                    <li><a href="login.php">用户登录</a></li>
                </ul>
            </div>
            <div class="username">当前用户：
                <a href="information.php"></a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="sm_nav">
            <div class="nav_inner fix">
                <div class="left_nav">
                    <img src="img/nav-icon.png" alt="">
                    <a href="fenlei.php">中草药分类</a>
                </div>
            </div>
            <div class="ct_search clearfix">
                <div class="search clearfix">
                    <label for="">搜索分类：</label>
                    <input type="text" placeholder="药品分类名称">
                    <img src="img/search.png" alt="">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="content">
                <section class='w1180 box'>
                    <div class='left boxl'>
                        <div class='box_inner'>
                        </div>
                    </div>
            </div>
            <div class="clearfix"></div>
            </section>
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
<script>
    $(function () {
        $(".username a").html(localStorage.getItem('username'))
        //获取一级分类
        var sql = "select * from categoryone where 1=1 "
        function search(sql) {
            $.ajax({
                type: 'POST',
                url: "php/fenlei/seltwo.php",
                dataType: "json",
                data: {
                    sql: sql
                },
                success: function (data) {
                    if (data.length > 0) {
                        var str = "";
                        for (var i = 0; i < data.length; i++) {
                            str += '<div class="ih-item square effect8 scale_up left" attr="' + data[i].id + '">' +
                                '<a href="lei.php?parentid=' + data[i].id + '">' +
                                '<div class="img"><img src="' + data[i].imgurl + '" alt="img"></div>' +
                                '<div class="info">' +
                                '<h3>' + data[i].title + '</h3>' +
                                '<p>' + data[i].intro + '</p>' +
                                '</div>' +
                                '</a>' +
                                '</div>'
                        }
                        $(".box_inner").html(str);
                    }else{
                        alert('无搜索结果')
                        $(".box_inner").html('');
                    }
                }
            })
        }
        search(sql)
        $('.search img').click(function () {
            var title = $('.search input').val();
             sql = "select * from categoryone where 1=1 "
            if (title != '') {
                sql += " and title like '%" + title + "%' "
            }
            search(sql);
        })
        $('.search input').keyup(function (e) {
            if (e.keyCode == '13') {
                 sql = "select * from categoryone where 1=1 "
                var title = $('.search input').val();
                if (title != '') {
                    sql += " and title like '%" + title + "%' "
                }
                search(sql);
            }
        })
    })

</script>

</html>