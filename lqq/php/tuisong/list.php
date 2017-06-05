<?php
    header('Access-Control-Allow-Origin:*'); 
    $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
    $mysqli->query("set names utf8");
    $parentid=$_POST['parentid'];
    $sel="select * from tuisong where parentid='{$parentid}'";
    $result=$mysqli->query($sel);
    echo $mysqli->error;
    $result=$result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result);
?>