<?php
  header('Access-Control-Allow-Origin:*'); 
 $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $username=$_POST['username'];
  $gender=$_POST['gender'];
  $age=$_POST["age"];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $occupation=$_POST['occupation'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $sql="insert into `users`(`username`, `password`, `gender`, `address`, `age`, `phone`, `email`, `occupation`) values ('{$username}','{$password}','{$gender}','{$address}','{$age}','{$phone}','{$email}','{$occupation}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>