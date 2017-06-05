<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("localhost","root","","rg");
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $teacher=$_POST['teacher'];
  $type=$_POST["type"];
  $direction=$_POST['direction'];
  $descript=$_POST['descript'];
  $examtype=$_POST['examtype'];
  $imgurl=$_POST['imgurl'];
  $sql="insert into `courses`(`title`, `teacher`, `type`, `direction`, `descript`, `examtype`, `imgurl`) values ('{$title}','{$teacher}','{$type}','{$direction}','{$descript}','{$examtype}','{$imgurl}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>