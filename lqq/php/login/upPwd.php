<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $password=$_POST["password"];
  $id=$_POST['id'];
  $sql="update `users` set password='{$password}' where id='{$id}'";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>