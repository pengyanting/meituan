<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('localhost','root','','lqq');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $intro=$_POST['intro'];
  $imgurl=$_POST["imgurl"];
  $parentid=$_POST["parentid"];
  $parentname=$_POST["parentname"];
  $sql="insert into `lei`(`title`, `imgurl`,`intro`,`parentid`,`parentname`) values ('{$title}','{$imgurl}','{$intro}','{$parentid}','{$parentname}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>