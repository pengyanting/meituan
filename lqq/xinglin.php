<!DOCTYPE html>
<html>

<head>
    <title>中草药学习鉴赏网站</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/baike.css" rel="stylesheet">
    <link href="css/life.css" rel="stylesheet" type="text/css" />
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
                <div class="right_nav"float="left">
                        <a href="baike.php">　百科知识</a>
                        <a href="xinglin.php" class="active">　杏林拾趣</a>
                        <a href="gushi.php">　民间故事</a>
                </div>  
            </div>
        </div>
            <div class="nav_inner fix">
                <div class="left_nav" float="right">
                    <img src="img/nav-icon.png" alt="">
                    <a href="baike.php">中草药百科</a>
                    <a href="xinglin.php">杏林拾趣</a>
                </div>
            </div>
      <div class="container">
    <div class="content"> 
        <section class='w1180 box'>
            <div class='left boxl'>
                <div class='box_inner'>
                </div>
            </div>                    
            </div><div class="clearfix"></div>
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
    $(function(){
        //获取一级分类
        $.ajax({
            type: 'POST',
            url: "php/xinglin/selone.php",
            dataType: "json",
            data: {
                
            },
            success:function(data){
               if(data.length>0){
                   var str="";
                   for(var i=0;i<data.length;i++){
                       str+='<div class="ih-item square effect8 scale_up left" attr="'+data[i].id+'">'+
                            '<a href="two.php?id='+data[i].id+'">'+
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
$(function(){
          $(".username a").html(localStorage.getItem('username'))
})
</script>
</html>