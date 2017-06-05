<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("localhost","root","","rg");
  $mysqli->query("set names utf8");
  $username=$_POST['username'];
  $gender=$_POST['gender'];
  $age=$_POST["age"];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $school=$_POST['school'];
  $project=$_POST['project'];
  $password=$_POST['password'];
  $sql="insert into `users`(`username`, `password`, `gender`, `address`, `age`, `phone`, `project`, `school`) values ('{$username}','{$password}','{$gender}','{$address}','{$age}','{$phone}','{$project}','{$school}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>