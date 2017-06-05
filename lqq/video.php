<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>中草药学习鉴赏园地</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/life.css" rel="stylesheet" type="text/css" />
     <link href="css/iconfont.css" rel="stylesheet" type="text/css"/>
    <link href="css/fileUpload.css" rel="stylesheet" type="text/css">
    <link href="css/video-js.css" rel="stylesheet">
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
                    <li><a href="life.php">生活小配方</a></li>
                    <li class="active"><a href="user.php">交流园地</a></li>
                    <li><a href="login.php">用户登录</a></li>
                </ul>
            </div>
            <div class="username" >当前用户：<a href="information.php"></a></div>
            <div class="clearfix"></div>
        </div>
       
            <div class="sm_nav">
                <div class="nav_inner fix">
                    <div class="right_nav">
                        <a href="user.php">　留言</a>
                        <a href="video.php" class="active">　视频</a>
                    </div>
                   
                </div>
            </div>
            <div id="main clearfix">
               <div id="two" class="child">
                   <video id="my-video" src='video/1.mp4' class="video-js" controls autoplay width="100%" height="400"></video>
               </div>
               <div class='left'>
                    <div id="one" class="child">
                    <div id="fileUploadContent" class="fileUploadContent"></div>
                </div>
               
               </div>
                <div id="three" class="child right">
                    <p>
                        <h3>相关视频</h3>
                        <p><a href="#">茶道养生</a></p>
                        <p><a href="#">养生药茶花茶制作</a></p>
                    </p>
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
<script type="text/javascript" src="js/fileUpload.js"></script>
<script>
    $(function () {
         $(".username a").html(localStorage.getItem('username'))
         $("#fileUploadContent").initUpload({
            "uploadUrl":"#",//上传文件信息地址
            "progressUrl":"#",//获取进度信息地址，可选，注意需要返回的data格式如下（{bytesRead: 102516060, contentLength: 102516060, items: 1, percent: 100, startTime: 1489223136317, useTime: 2767}）
            //"showSummerProgress":false,//总进度条，默认限制
            //"size":350,//文件大小限制，单位kb,默认不限制
            //"maxFileNumber":3,//文件个数限制，为整数
            //"filelSavePath":"",//文件上传地址，后台设置的根目录
            //"beforeUpload":function(){alert("zxm first");},//在上传前执行的函数
            "onUpload":function(){
                alert("zxm last");
            },//在上传后执行的函数
            //"fileType":['png','jpg','docx','doc']，//文件类型限制，默认不限制，注意写的是文件后缀
        })
        $(".right_nav a").hover(function () {
            $(".right_nav a").removeClass("active");
            $(this).addClass("active");
            return ("active");
        })
        //上传视频
        $("#fileUploadContent").click(function () {
           
            // if (!localStorage.getItem('username')) {
            //     alert('还未登录，不能上传视频')
            //     return;
            // }
            // var content = $('input[name=fileUploadContent]').val();
            // $.ajax({
            //     type: 'POST',
            //     url: "php/tuisong/addvideo.php",
            //     dataType: "json",
            //     data: {
            //         username: localStorage.getItem('username'),
            //         userid: localStorage.getItem("id"),
            //         time: getNowFormatDate(),
            //         content: content,
            //         type: '视频'
            //     },
            //     success: function (data) {
            //         if (data == '1') {
            //             selPinglun()
            //         } else {
            //             alert('发表失败')
            //         }
            //     }
            // })
        })
    })
</script>
</html>



