<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>中草药学习鉴赏园地</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/life.css" rel="stylesheet" type="text/css" />
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
                    <li><a href="fenlei.php">中草药分类</a></li>
                    <li><a href="life.php">生活小配方</a></li>
                    <li class="active"><a href="user.php">交流园地</a></li>
                    <li><a href="login.php">用户登录</a></li>
                </ul>
            </div>
            <div class="username" >当前用户：<a href="information.php"></a></div>
            <div class="clearfix"></div>
        </div>
       
            <div class="sm_nav">
                <div class="nav_inner fix">
                    <div class="right_nav">
                       <a href="user.php" class="active">　留言</a>
                       <a href="video.php">　视频</a>
                    </div>
                   
                </div>
            </div>
            <div id="main clearfix">
               <div class='left'>
                    <div id="one" class="child">
                    <div class="fabiao"><input type="text" placeholder="说点儿什么......"name='fabu'>
                        <a href="javascript:;"><img src="img/fb.png" class='fabu' alt=""></a>
                    </div>
                </div>
                <div id="two" class="child"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container">
            <div class="footer">
                <p class="cr">Copyright 2017©刘倩所有 忻州师范学院计算机系 </p>
            </div>
        </div>
</body>
<script src="js/jquery.js"></script>
<script src='js/common.js'></script>
<script>
    $(function () {
        $(".right_nav a").hover(function () {
            $(".right_nav a").removeClass("active");
            $(this).addClass("active");
            return ("active");
        })
        //发表评论
        $(".fabu").click(function () {
            if (!localStorage.getItem('username')) {
                alert('还未登录，不能发表评论')
                return;
            }
            var content = $('input[name=fabu]').val();
            $.ajax({
                type: 'POST',
                url: "php/tuisong/addpinglun.php",
                dataType: "json",
                data: {
                    username: localStorage.getItem('username'),
                    userid: localStorage.getItem("id"),
                    time: getNowFormatDate(),
                    content: content,
                    type: '留言'
                },
                success: function (data) {
                    if (data == '1') {
                        $('input[name=fabu]').val('')
                        selPinglun()
                    } else {
                        alert('发表失败')
                    }
                }
            })
        })

        //查询评论
        function selPinglun() {
            $.ajax({
                type: 'POST',
                url: "php/tuisong/selpinglun.php",
                dataType: "json",
                data: {
                    userid: localStorage.getItem("id"),
                    type: '留言'
                },
                success: function (data) {
                    if (data.length > 0) {
                        var str = '';
                        for (var i = 0; i < data.length; i++) {
                            str += ' <div class="news_list">' +
                                '<div class="news_item">' +
                                '<div class="news_date">' +
                                '<span class="day">' + data[i].time.split('-')[2] + '</span>' +
                                '<span class="month">' + data[i].time.split('-')[1] + '</span>' +
                                '<span class="year">' + data[i].time.split('-')[0] + '</span>' +
                                '</div>' +
                                '<div class="news_con">' +
                                '<a href="#">' +
                                '<h3>' + data[i].username +
                                '</span></h3>' +
                                '</a>' +
                                '<p>' + data[i].content + '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                        }
                        console.log(str)
                        $('#two').html(str)
                    }
                }
            })
        }
        selPinglun()
    })
$(function () {
         $(".username a").html(localStorage.getItem('username'))
})
</script>

</html>