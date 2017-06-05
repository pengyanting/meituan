<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $intro=$_POST["intro"];
  $parentid=$_POST['parentid'];
  $parentname=$_POST["parentname"];
  $sql="insert into `tuisong`(`title`, `intro`,`parentid`,`parentname`) values ('{$title}','{$intro}','{$parentid}','{$parentname}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>