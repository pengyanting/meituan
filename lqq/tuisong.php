<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>中草药学习鉴赏园地</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/life.css" rel="stylesheet" type="text/css" />
    <link href="css/baike.css" rel="stylesheet">
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
                    <li class="active"><a href="life.php">生活小配方</a></li>
                    <li><a href="user.php">交流园地</a></li>
                    <li><a href="login.php">用户登录</a></li>
                </ul>
            </div>
            <div class="username" >当前用户：<a href="information.php"></a></div>
            <div class="clearfix"></div>
        </div>
        
            
            <div id="main" class='clearfix'>
                <div class='left'>
                    <div id="one" class="child">
                    <div class="fabiao" font-family="微软雅黑">
                      <h3><a href="life.php">[中草药小配方]--</a>
                    <a href="javascript:;" class='title'></a></div></h3>
                    </div>
                    <div id="three" class="child">
                        <div class="news_list">
                        <div class="news_item">
                            <div class="news_date">
                                <span></span>
                            </div>
                            <!--<div class="news_con">
                             <h3>历史渊源</h3>
                    <p>中锐教育集团创始于1996年，是中锐控股集团旗下的主要成员，总部位于上海。经过多年卓有成效的努力，服务遍及全国二十多个省市，直营院校10所，托管和合作院校50多所，形成了涵盖职业教育与培训、基础教育与国际学校、留学与国际教育合作的集团化教育体系，是目前国内教育业务范围最广、投...</p>
                    </div>-->
                        </div>
                    </div>
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
    //查询列表
    $.ajax({
      type: 'POST',
      url: "php/tuisong/list.php",
      dataType: "json",
      data: {
             parentid:GetQueryString('parentid')
      },
   success: function (data) {
        if (data.length > 0) {
          var str = '';
          $(".title").html(data[0].parentname);
          for (var i = 0; i < data.length; i++) {
            str +='<div id="two" class="child">'+
             '<div class="news_list">'+
                '<div class="news_item">'+
                '<div class="news_date">' +
                '</div>'+
                '<div class="news_con">'+
              '<h3>' + data[i].title + '</h3>' +
              '<p>' + data[i].intro + '</p>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>'
          }
          $('.news_list').html(str)
        }
      }
    })
  })
 $(function () {
         $(".username a").html(localStorage.getItem('username'))
})
</script>

</html>