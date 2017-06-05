<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $type=$_POST['type'];
  $title=$_POST['title'];
  $imgurl=$_POST["imgurl"];
  $sql="insert into `gushi`(`type`, `title`, `imgurl`) values ('{$type}','{$title}','{$imgurl}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>