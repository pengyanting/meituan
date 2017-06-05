<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $username=$_POST['username'];
  $userid=$_POST['userid'];
  $content=$_POST['content'];
  $time=$_POST['time'];
  $type=$_POST['type'];
  $sql="insert into `video`(`username`, `userid`, `content`, `time`, `type`) values ('{$username}','{$userid}','{$content}','{$time}','{$type}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>