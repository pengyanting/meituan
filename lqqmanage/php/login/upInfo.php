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
  $id=$_POST['id'];
  $sql="update `users` set username='{$username}',gender='{$gender}',age='{$age}',address='{$address}',phone='{$phone}',occupation='{$occupation}',email='{$email}' where id='{$id}'";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>