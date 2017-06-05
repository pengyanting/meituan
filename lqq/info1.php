<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>中草药学习鉴赏园地</title>
    <link href="css/swiper.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/baike.css">
    <link rel="stylesheet" href="css/fenlei.css">
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
            <div class="username" >当前用户：<a href="information.php"></a></div>
            <div class="clearfix"></div>
        </div>
        
        <div class="sm_nav">
            <div class="nav_inner fix">
                <div class="left_nav">
                    <img src="img/nav-icon.png" alt="">
                    <a href="fenlei.php">中草药分类</a>
                    <a href="lei.php" class='lei'></a>
                    <a href="javascript:;" class='title'></a>
                </div>
            </div>
        </div>
   
        <div class="clearfix"></div>

        <div id="main">
            <div id="five" >
                <h3>相关图集</h3>
              
                <div class="banner">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="img/rs/rs1.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/rs/rs2.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/rs/rs3.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/rs/rs4.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/rs/rs5.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/rs/rs6.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/rs/rs7.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/rs/rs8.jpeg" alt=""></div>
                            <div class="swiper-slide"><img src="img/rs/rs9.jpg" alt=""></div>
                            <div class="swiper-slide"><img src="img/rs/rs10.jpg" alt=""></div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div id="six" >
                <div class="news_list"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container">
            <div class="footer">
                <p class="cr">Copyright 2017©刘倩所有 忻州师范学院计算机系 </p>
            </div>
        </div>
         </div>
</body>
<script src="js/jquery.js"></script>
<script src="js/swiper.min.js"></script>
<script src='js/common.js'></script>
<script>
    $(function () {
        $(".username a").html(localStorage.getItem('username'))
        var mySwiper = new Swiper('.swiper-container', {
            autoplay: 1000, //可选选项，自动滑动
            pagination: '.swiper-pagination',
            paginationClickable: true,
            prevButton: '.swiper-button-prev',
            nextButton: '.swiper-button-next',
            slidesPerView : 3,
        })
        $(".right_nav a").hover(function () {
            $(".right_nav a").removeClass("active");
            $(this).addClass("active");
            return ("active");
        })
       
        $.ajax({
            type: 'POST',
            url: "php/fenlei/seldetail.php",
            dataType: "json",
            data: {
                id:GetQueryString('id') 
            },
            success:function(data){
               if(data.length>0){
                   $('.title').html(data[0].title)
                   $(".lei").html(data[0].parentname)
                   $(".lei").attr('href','lei.php?parentid='+data[0].parentid)
                    var str='<div class="news_item">'+
                        '<div class="news_con">'+
                            '<a href="news-detail.php">'+
                                '<h3>'+data[0].title+'<span>分类：'+data[0].parentname+'</span></h3>'+
                            '</a>'+
                            '<p>'+data[0].intro+'</p>'+
                        '</div>'+
                    '</div>'
                    $(".news_list").html(str)
               } 
            }
        })
    })
</script>
</html>