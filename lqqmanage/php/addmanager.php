<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql="insert into `admin`(`username`, `password`) values ('{$username}','{$password}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>