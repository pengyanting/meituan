<!DOCTYPE html>
<html>

<head>
    <title>中草药学习鉴赏网站</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/baike.css">
    <link rel="stylesheet" href="css/ihover.min.css">
    <link rel="stylesheet" href="css/fenlei.css">
</head>

<body>
    <header class='header'>
        <img src="img/logo1.jpg" alt="">
        <img src="img/logo2.jpg" alt="">
    </header>
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
    <div class="container">
        <div class="sm_nav">
            <div class="nav_inner fix">
                <div class="left_nav">
                    <img src="img/nav-icon.png" alt="">
                    <a href="fenlei.php">中草药分类</a>
                    <a href="fenlei.part.php" class='title'>按药用部位分类</a><a href="gen.php">根类</a>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="content"> 
        <div class="content-top-grid clearfix">
            <section class='w1180 box clearfix'>
                <div class='left boxl clearfix'>
                    <div class='box_inner clearfix'>
                        <!-- normal -->
                        <!--<div class="ih-item square effect8 scale_up left">
                            <a href="#">
                                <div class="img"><img src="img/1.jpg" alt="img"></div>
                                <div class="info1">
                                    <h3>人参</h3>
                                    <p>又称"亚洲参"，是具有肉质的根，用于愈后恢复，增强体力等功效。分布区域：吉林，辽宁，黑龙江</p>
                                </div>
                            </a>
                        </div>-->
                        <!-- end normal -->
                    </div>
                </div>
            </section>
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
    $(function(){
         $(".username a").html(localStorage.getItem('username'))
})
        //获取一级分类
        $.ajax({
            type: 'POST',
            url: "php/fenlei/seltwo.php",
            dataType: "json",
            data: {
                parentid:GetQueryString('parentid') 
            },
            success:function(data){
               if(data.length>0){
                   var str="";
                   $(".title").html(data[0].parentname);
                   for(var i=0;i<data.length;i++){
                       str+='<div class="ih-item square effect8 scale_up left" attr="'+data[i].id+'">'+
                            '<a href="genlei.html?categoryone='+data[i].parentid+'&categorytwo='+data[i].id+'">'+
                                '<div class="img"><img src="'+data[i].imgurl+'" alt="img"></div>'+
                                '<div class="info">'+
                                    '<h3>'+data[i].title+'</h3>'+
                                    '<p>'+data[i].intro+'</p>'+
                                '</div>'+
                            '</a>'+
                        '</div>'
                   }
                   $(".box_inner").html(str);
               }
            }
        })
    })
</script>
</html>