<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("localhost","root","","rg");
  $mysqli->query("set names utf8");
  $username=$_POST['username'];
  $content=$_POST['content'];
  $courseid=$_POST["courseid"];
  $time=$_POST['time'];
  $sql="insert into `discus`(`username`, `content`, `courseid`, `time`) values ('{$username}','{$content}','{$courseid}','{$time}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>