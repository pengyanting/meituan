<?php
    header('Access-Control-Allow-Origin:*'); 
    $mysqli=new mysqli('localhost','root','','rg');//地址，用户名，密码，数据库名称
    $mysqli->query("set names utf8");
    $courseid=$_POST["courseid"];
    $title=$_POST["title"];
    $sel="select * from catalog where courseid='{$courseid}' and title='{$title}'";
    $result=$mysqli->query($sel);
    echo $mysqli->error;
    $result=$result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result);
?>