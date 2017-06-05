<!doctype html>
<html lang="zh">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>中草药学习鉴赏网站后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
	<div class="wrapper">
		<div class="container">
			<h1>中草药学习鉴赏网站</h1>
			<h1>后台管理</h1>
			<form class="form">
				<input type="text" name='username' placeholder="用户名">
				<input type="password" name='password' placeholder="密码"><br>
				<input type="button" id="button" value='登录'/>
			</form>
		</div>
	</div>
</body>
<script src='js/jquery.js'></script>
<script>
	$(function () {
		//登录
		$('#button').click(function () {
			var username = $('input[name=username]').val();
			var password = $('input[name=password]').val();
			$.ajax({
				type: 'POST',
				url: "php/login/login.php",
				dataType: "json",
				data: {
					userName: username,
					password: password
				},
				success:function(data){
					if (data.length>0) {
                        localStorage.setItem("managename", data[0].username);
                        localStorage.setItem("manageid", data[0].id);
						localStorage.setItem("password", data[0].password);
                        window.location = 'index.php';
                    }else{
                        alert('登录失败')
                    }
				}
			})
		})
	})
</script>

</html>