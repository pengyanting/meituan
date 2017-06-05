<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $imgurl=$_POST["imgurl"];
  $sql="insert into `categoryone`(`title`, `imgurl`) values ('{$title}','{$imgurl}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>