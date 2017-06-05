<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $content=$_POST['content'];
  $title=$_POST['title'];
  $baikeid=$_POST["baikeid"];
  $sql="insert into `article`(`title`, `content`, `baikeid`) values ('{$title}','{$content}','{$baikeid}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>