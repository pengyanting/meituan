<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>

<body>
<div class="title">中草药学习鉴赏园地</div>
    <div class="login">
        <form name="login_form" id="login_form">
            <div class="item">
               <label for="">用户登录</label>
            </div>
            <div class="item">
                <input type="text" name="username" id="username" placeholder="用户名" class="text" autocomplete="false">
            </div>
            <div class="item">
                <input type="password" name="password" id="password" placeholder="密码" class="text" autocomplete="false">
            </div>
            <div class="item">
                <input type="button" value="登录" class="btn login_btn" id="login_btn">
            </div>
            <div class="item">
                <p><a href="relogin.php"></p>还没有账号？马上去注册！</a>
            </div>
            <div class="item">
                <p><a href="index.php">返回首页--></a></p>
            </div>
            
        </form>
    </div>
</body>
<script src='js/jquery.js'></script>
<script>
    $(function () {
        $(".login_btn").click(function () {
            var userName = $("#username").val();
            var password = $("#password").val();
            if (userName == "") {
                alert("用户名不能为空！");
                return;
            }
            if (password == "") {
                alert("密码不能为空");
                return;
            }
            $.ajax({
                type: 'POST',
                url: "php/login/login.php",
                dataType: "json",
                data: {
                    userName: userName,
                    password: password
                },
                success: function (data) {
                    console.log(data)
                    if (data.length>0) {
                        localStorage.setItem("username", data[0].username);
                        localStorage.setItem("id", data[0].id);
                        window.location = 'index.php';
                    }else{
                        alert('登录失败')
                    }
                }
            });
        })

    })
</script>

</html>