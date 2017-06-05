<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $intro=$_POST["intro"];
  $sql="insert into `life`(`title`, `intro`) values ('{$title}','{$intro}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>