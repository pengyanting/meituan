<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="Css/style.css" />
    <script type="text/javascript" src="Js/jquery2.js"></script>
    <script type="text/javascript" src="Js/jquery2.sorted.js"></script>
    <script type="text/javascript" src="Js/bootstrap.js"></script>
    <script type="text/javascript" src="Js/ckform.js"></script>
    <script type="text/javascript" src="Js/common.js"></script>

    <style type="text/css">
        body {
            font-size: 20px;
            font-size: 20px;
            padding-bottom: 40px;
            background-color: #e9e7ef;
        }

        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
</head>

<body>
    <form class="form-inline definewidth m20" action="#" method="get">
        <input type="text" name='username' placeholder="用户名"><br/>
        <input type="password" name='oldpassword' placeholder="原始密码"><br>
        <input type="password" name='newpassword' placeholder="新密码"><br>
        <input type="password" name='confirmpassword' placeholder="确认新密码"><br>
        <button type="button" id="update"><strong>保存修改</strong></button>
    </form>
</body>
<script>
    $(function(){
        $("#update").click(function(){
            var oldpassword = $(".oldpassword").val();
            var newpassword = $(".newpassword").val();
            var confirmpassword = $(".confirmpassword").val();
            if (oldpassword != localStorage.getItem('password')) {
                alert('原始密码错误');
                return;
            }
            if (newpassword != confirmpassword) {
                alert("两次输入的密码不一致");
                return;
            }
            $.ajax({
                type: "POST",
                url: 'php/login/upPwd.php',
                dataType: "json",
                data: {
                    id: localStorage.getItem("id"),
                    password: newpassword
                },
                success: function (data) {
                    if (data == 1) {
                        alert("修改成功！");
                        // window.location = '../login.php';
                        localStorage.setItem("password", newpassword);
                       $(".oldpassword").val('');
                       $(".newpassword").val('');
                       $(".confirmpassword").val('');
                    } else {
                        alert('修改失败')
                    }
                }
            })
        })
    })
</script>
</html>