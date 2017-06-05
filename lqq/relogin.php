<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>中草药学习鉴赏园地</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/relogin.css">
</head>
<body>
    <div class="zr_top">
        <div class="header w1180 clearfix">
            <div class="logo">
                <h3><a href="index.php">返回首页--></a></h3>
            </div>
        </div>
    </div>
     <div class="up_info">
        <h3>用户信息<span>+</span></h3>
        <div class='item'>
            <label for="">用&nbsp;户&nbsp;名&nbsp;：</label>
            <input type="text" value="" placeholder="--请输入用户名--" name='username'><font color="#ff0000">*不能以下划线开头</font>
        </div>
        <div class='item'>
            <label for="">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;：</label>
            <input type="text" value="" placeholder="--请输入密码--" name='password'><font color="#ff0000">*只能输入数字、字母在内的6-18位字符</font>
        </div>
        <div class='item'>
            <label for="">确认密码：</label>
            <input type="text" value="" placeholder="--请再次输入密码--" name='pwd'><font color="#ff0000">*只能输入数字、字母在内的6-18位字符</font>
        </div>
        <div class='item'>
            <label for="">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别&nbsp;：</label>
            <input type="radio" value="男" name="gender">&nbsp;&nbsp;男&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" value="女" name="gender">&nbsp;&nbsp;女
        </div>
        <div class='item'>
            <label for="">出生日期：</label>
            <input type="type" value="" placeholder="--请输入出生日期--" name="age">
        </div>
        <div class='item'>
            <label for="">所&nbsp;在&nbsp;地&nbsp;：</label>
            <input type="text" value="" placeholder="请输入您的居住地" name="address">
        </div>
        <div class='item'>
            <label for="">职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业&nbsp;：</label>
            <input type="text" value="" placeholder="请输入您的职业" name='occupation'><font color="#ff0000"></font>
        </div>
        <div class='item'>
            <label for="">手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机&nbsp;：</label>
            <input type="text" value="" placeholder="请输入手机号码" name='phone'><font color="#ff0000">*选填项</font>
        </div>
        <div class='item'>
            <label for="">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱&nbsp;：</label>
            <input type="text" value="" placeholder="--请输入邮箱账号--" name='email'>
        </div>
        <input type="button" value='点击注册' class='up_info_btn'>
    </div>
</body>
<script src='js/jquery.js'></script>
<script>
    $(function(){
        //注册
          $(".up_info_btn").click(function () {
            var username = $("input[name=username]").val();
            var gender = $("input[name=gender]:checked").val();
            var age = $("input[name=age]").val();
            var address = $("input[name=address]").val();
            var phone = $("input[name=phone]").val();
            var occupation = $("input[name=occupation]").val();
            var email = $("input[name=email]").val();
            var password = $("input[name=password]").val();
            var pwd = $("input[name=pwd]").val();
            if (pwd != password) {
                alert('两次输入的密码不一致，请重新输入！');
                return;
            }
            $.ajax({
                type: "POST",
                url: 'php/login/relogin.php',
                dataType: "json",
                data: {
                    username: username ? username : '',
                    gender: gender ? gender : '',
                    age: age ? age : gender,
                    address: address ? address : '',
                    phone: phone ? phone : '',
                    occupation: occupation ? occupation : '',
                    email: email ? email : '',
                    password: password ? password : ''
                },
                success: function (data) {
                    if (data == 1) {
                      alert('注册成功！赶快去登录试试吧！')
                      window.location='login.php';
                    } else {
                        alert('注册失败，请确认信息无误后再操作');
                    }
                }
            })
        })
    })
</script>
</html>