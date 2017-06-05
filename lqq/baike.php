<!DOCTYPE html>
<html>

<head>
  <title>中草药学习鉴赏网站</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/baike.css" rel="stylesheet">
  <link href="css/life.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <header class='header'>
    <img src="img/logo1.jpg" alt="">
    <img src="img/logo2.jpg" alt="">
  </header>
  <div class="container">
  <div class="header-bottom">
    <div class="top-nav" margin-left="0">
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
  </div>
    <div class="clearfix"></div>

  <!--中草药百科-->
    <div class="sm_nav">
      <div class="nav_inner fix">
        <div class="right_nav">
                        <a href="baike.php" class="active">　百科知识</a>
                        <a href="xinglin.php">　杏林拾趣</a>
                        <a href="gushi.php">　民间故事</a>
        </div>
      </div>
    </div>
      <div class="nav_inner fix">
        <div class="left_nav">
          <img src="img/nav-icon.png" alt="">
          <a href="baike.php">中草药百科</a><a href="baike.php">百科知识</a>
        </div>
      </div>
  <div class="content">
    <div class="content-top-grid clearfix">
      <section class='w1180 box clearfix'>
        <!--<div class='left boxl'>
          <div class='box_inner'>
              <div class="intro fix">
                <div class="intro_left">
                  <div class="group">
                    <h1>历史渊源</h1>
                    <p>中锐教育集团创始于1996年，是中锐控股集团旗下的主要成员，总部位于上海。经过多年卓有成效的努力，服务遍及全国二十多个省市，直营院校10所，托管和合作院校50多所，形成了涵盖职业教育与培训、基础教育与国际学校、留学与国际教育合作的集团化教育体系，是目前国内教育业务范围最广、投...</p>
                    <a href="one.php">查看全部</a>
                  </div>
                </div>
              </div>
          </div>
        </div>-->
      </section>
    </div>
  </div>
    <!--footer-->
    <div class="footer">
      <p class="cr">Copyright 2017©刘倩所有 忻州师范学院计算机系 </p>
    </div>
</body>
<script src='js/jquery.js'></script>
<script>
  $(function () {
    //查询百科列表
    $.ajax({
      type: 'POST',
      url: "php/baike/selone.php",
      dataType: "json",
      data: {

      },
      success: function (data) {
        if (data.length > 0) {
          var str = '';
          for (var i = 0; i < data.length; i++) {
            str += ' <div class="left boxl">' +
              '<div class="box_inner">' +
              '<div class="intro fix">' +
              '<div class="intro_left">' +
              '<div class="group">' +
              '<h1>' + data[i].title + '</h1>' +
              '<p>' + data[i].intro + '</p>' +
              '<a href="one.php?id=' + data[i].id + '">查看全部</a>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>'
          }
          $('.box').html(str)
        }
      }
    })
  })
 $(function () {
     $(".username a").html(localStorage.getItem('username'))
})
</script>

</html>