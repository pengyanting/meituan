<html>

<head>
	<meta charset="utf-8">
	<title>中草药学习鉴赏网站后台管理系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/adminStyle.css" rel="stylesheet" type="text/css" />
	<link href="css/stylel.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery1.js"></script>
	<script type="text/javascript">
		$(document).ready(
			function () {
				$(".div2").click(
					function () {
						$(this).next("div").slideToggle("slow").siblings(
							".div3:visible").slideUp("slow");
					});
			});
		 $(function(){
         $(".adminIcon").html(localStorage.getItem('managename'))
         })
</script>
</head>
<body>
	<div class="top1">
		<marquee scrollAmount=2 width=300>数据无价，请谨慎操作！</marquee>
	</div>
	<div class="top2">
		<div class="logo">
			<img src="images/admin_logo.png" />
		</div>
		<div class="title">
			<h3>中草药学习鉴赏网站后台管理系统</h3>
		</div>
		<div class="fr top-link">
			<a href="#"  ><i class="adminIcon">管理员：</i></a>
		</div>
	</div>
	<div class="left">
		<div class="div1">
			<div class="div2">
				<div class="spgl"></div>
				用户管理
			</div>
			<div class="div3">
				<ul>
					<li><a class="a" href="aaa/documentQuery.html" target="rightFrame">用户查询</a></li>
					<li><a class="a" href="aaa/userdocumentQuery.html" target="rightFrame">留言管理</a></li>
					<li><a class="a" href="aaa/userdocumentQuery2.html" target='rightFrame'>视频管理</a></li>
				</ul>
			</div>
			<div class="div2">
				<div class="spgl"></div>
				类别管理
			</div>
			<div class="div3">
				<ul>
					<li><a class="a" href="aaa/classQuery.html" target='rightFrame'>百科信息管理</a></li>
					<li><a class="a" href="aaa/classQuery1.html" target='rightFrame'>杏林拾趣管理</a></li>
					<li><a class="a" href="aaa/classQuery2.html" target='rightFrame'>民间故事管理</a></li>
					<li><a class="a" href="aaa/yaotype.html"  target='rightFrame'>药品管理</a></li>
					<li><a class="a" href="aaa/peifang.html" target='rightFrame'>配方管理</a></li>
				</ul>
			</div>
			<div class="div2">
				<div class="gggl"></div>
				系统管理
			</div>
			<div class="div3">
				<ul>
					<li><a class="a" href="aaa/manager.html"  target="rightFrame">操作员管理</a></li>
					<li><a class="a" href="aaa/updatepwd.php" target='rightFrame'>修改密码</a></li>
				</ul>
			</div>
			<a class="a1" href="login.php">
				<div class="div2">
					<div class="tcht"></div>
					退出后台
				</div>
			</a>
		</div>
	</div>
	<div class="right">
		<iframe id="rightFrame" name="rightFrame" width="100%" height="100%" scrolling="auto" marginheight="0" marginwidth="0" align="center"
		    style="border: 0px solid #CCC; margin: 0; padding: 0;"></iframe>
	</div>
</body>

</html>