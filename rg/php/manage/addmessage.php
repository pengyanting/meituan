<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("localhost","root","","rg");
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $content=$_POST['content'];
  $type=$_POST["type"];
  $userid=$_POST['userid'];
  $username=$_POST['username'];
  $time=$_POST['time'];
  $sql="insert into `message`(`title`, `content`, `userid`, `username`, `time`, `type`) values ('{$title}','{$content}','{$userid}','{$username}','{$time}','{$type}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>