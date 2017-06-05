<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>中草药学习鉴赏园地</title>
    <link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/common.1.css">
    <link rel="stylesheet" href="css/user.css">
    
</head>

<body>
    <header class='header'>
        <img src="img/logo1.jpg" alt="">
        <img src="img/logo2.jpg" alt="">
    </header>
  <div class="container">
  <div class="header-bottom">
    <div class="top-nav" margin-left="0">
        <h3><a href="index.php">返回首页--></a></h3>
    </div>
  </div>
    <div class="clearfix"></div>
  </div>
    <div class="user w1180 clearfix">
        <div class='user_left'>
            <div class='uf_top'>
                <img src="img/noavatar.png" alt="">
                <p></p>
            </div>
            <div class='uf_bottom'>
                <h4>账号设置</h4>
                <ul>
                    <li class='active'>个人信息<span>&gt;</span></li>
                    <li>密码设置<span>&gt;</span></li>
                    <li>退出登录<span>&gt;</span></li>
                </ul>
            </div>
        </div>
        <div class='user_right'>
            <div class="ur_title">
                <h3>个人信息</h3>
                <span class='update_info'>编辑</span>
            </div>
            <div class="user_info">
                <div class="item">
                    <span>用&nbsp;户&nbsp;名：</span><input id='username' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>性&nbsp;&nbsp;&nbsp;别：</span><input id='gender' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>生&nbsp;&nbsp;&nbsp;日：</span><input id='age' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>住&nbsp;&nbsp;&nbsp;址：</span><input id='address' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>电&nbsp;&nbsp;&nbsp;话：</span><input id='phone' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>职&nbsp;&nbsp;&nbsp;业：</span><input id='occupation' type="text" value="" disabled="disabled">
                </div>
                <div class="item">
                    <span>邮&nbsp;&nbsp;&nbsp;箱：</span><input id='email' type="text" value="" disabled="disabled">
                </div>
            </div>
        </div>
        <div class='user_right hide'>
            <div class="ur_title">
                <h3>密码设置</h3>
            </div>
            <div class='up_pwd'>
                <div class='item'>
                    <label for="">原始密码：</label>
                    <input type="password" value="" placeholder="请输入原始密码" class='oldpassword'>
                </div>
                <div class='item'>
                    <label for="">新&nbsp;密&nbsp;码&nbsp;：</label>
                    <input type="password" value="" placeholder="请输入新密码" class='newpassword'>
                </div>
                <div class='item'>
                    <label for="">确认密码：</label>
                    <input type="password" value="" placeholder="确认新密码" class='confirmpassword'>
                </div>
                <input type="button" value='确认修改' class='up_btn'>
            </div>
        </div>
    </div>
    <div class='mask hide'></div>
    <div class="up_info hide">
        <h3>设置信息<span>+</span></h3>
        <div class='item'>
            <label for="">用&nbsp;户&nbsp;名&nbsp;：</label>
            <input type="text" value="" placeholder="请输入用户名" name='username'>
        </div>
        <div class='item'>
            <label for="">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别&nbsp;：</label>
            <input type="radio" value="男" name="gender">&nbsp;&nbsp;男&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" value="女" name='gender'>&nbsp;&nbsp;女&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class='item'>
            <label for="">出生日期：</label>
            <input type="type" value="" placeholder="请输入出生日期" name='age'>
        </div>
        <div class='item'>
            <label for="">住&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址&nbsp;：</label>
            <input type="text" value="" placeholder="请输入家庭住址" name='address'>
        </div>
        <div class='item'>
            <label for="">电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话&nbsp;：</label>
            <input type="text" value="" placeholder="请输入电话" name='phone'>
        </div>
        <div class='item'>
            <label for="">职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业&nbsp;：</label>
            <input type="text" value="" placeholder="请输入职业" name='occupation'>
        </div>
        <div class='item'>
            <label for="">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱&nbsp;：</label>
            <input type="text" value="" placeholder="请输入邮箱" name='email'>
        </div>
        <input type="button" value='确认修改' class='up_info_btn'>
    </div>
    </div>
<div class="container">
        <!--footer-->
    <div class="footer">
        <p class="cr">Copyright 2017©刘倩所有 忻州师范学院计算机系 </p>
    </div>  
</div>
</body>
<script src="js/jquery.js"></script>
<script src="js/common.js"></script>
<script>
    $(function () {
        if (!localStorage.getItem("username")) {
            alert("您暂未登陆");
            return;
        }
        $(".uf_top p").html(localStorage.getItem('username'));
        //获取个人信息
        var oldPwd;
        var info;

        function getInfo(fn) {
            $.ajax({
                type: 'GET',
                url: "php/login/getUserInfo.php",
                dataType: "json",
                data: {
                    id: localStorage.getItem("id")
                },
                success: function (data) {
                    var data = data[0];
                    var str = "";
                    info = data;
                    oldPwd = data['password'];
                    for (var i in data) {
                        if (data[i] == '' || data[i] == undefined) {
                            data[i] = '未设置';
                        }
                        $("#" + i).val(data[i]);
                    }
                    if (fn) {
                        fn();
                    }
                }
            });
        }
        getInfo();
        //修改密码
        $(".up_btn").click(function () {
            var oldpassword = $(".oldpassword").val();
            var newpassword = $(".newpassword").val();
            var confirmpassword = $(".confirmpassword").val();
            if (oldpassword != oldPwd) {
                alert("原始密码有误");
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
                        alert("修改成功！为确保账户安全请重新登录。");
                        window.location = 'login.php';
                        localStorage.setItem("username", "");
                        localStorage.setItem("id", "");
                        $(".oldpassword").val('');
                        $(".newpassword").val('');
                        $(".confirmpassword").val('');
                    } else {
                        alert('修改失败')
                    }
                }
            })
        })
        //tab切换
        $(".uf_bottom li").click(function () {
            var index = $(this).index(".uf_bottom li");
            if (index == 2) {
                localStorage.setItem("username", '')
                window.location='index.php';
            }
            $(".user_right").hide().eq(index).show();
            $(this).addClass('active').siblings().removeClass("active");
        })
        //修改信息
        $(".update_info").click(function () {
            for (var i in info) {
                if (info[i] == '未设置' || info[i] == undefined) {
                    info[i] = '';
                }
                if (i == 'gender') {
                    if (info[i] == '男') {
                        $("input[name=" + i + "]").eq(0).attr('checked', true);
                        $("input[name=" + i + "]").eq(1).removeAttr('checked');
                    } else {
                        $("input[name=" + i + "]").eq(0).removeAttr('checked');
                        $("input[name=" + i + "]").eq(1).attr('checked', true);
                    }
                } else {
                    $("input[name=" + i + "]").val(info[i]);
                }
            }
            maskShow();
            $(".up_info").css({
                display: 'block'
            })
        })
        $(".up_info span").click(function () {
            maskHide();
            $(".up_info").hide();
        })
        $(".up_info_btn").click(function () {
            var username = $("input[name=username]").val();
            var gender = $("input[name=gender]:checked").val();
            var age = $("input[name=age]").val();
            var address = $("input[name=address]").val();
            var phone = $("input[name=phone]").val();
            var email = $("input[name=email]").val();
            var occupation = $("input[name=occupation]").val();
            $.ajax({
                type: "POST",
                url: 'php/login/upInfo.php',
                dataType: "json",
                data: {
                    id: localStorage.getItem("id"),
                    username: username ? username : '',
                    gender: gender ? gender : '',
                    age: age ? age : gender,
                    address: address ? address : '',
                    phone: phone ? phone : '',
                    occupation: occupation ? occupation : '',
                    email: email ? email : ''
                },
                success: function (data) {
                    if (data == 1) {
                        getInfo(function () {
                            $(".uf_top p").html(info['username']);
                            $(".user_name").html(info['username']);
                            localStorage.setItem('username', info['username'])
                        });
                        maskHide();
                        $(".up_info").hide();
                        $("input[name=username]").val('');
                        $("input[name=gender]:checked").val('');
                        $("input[name=age]").val('');
                        $("input[name=address]").val('');
                        $("input[name=phone]").val('');
                        $("input[name=email]").val('');
                        $("input[name=email]").val('');

                    } else {
                        alert('修改失败，请确认信息无误后再操作');
                    }
                }
            })
        })
    })
</script>

</html>