<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("localhost","root","","rg");
  $mysqli->query("set names utf8");
  $answer=$_POST['answer'];
  $userid=$_POST['userid'];
  $id=$_POST["id"];
  $sql="insert into `testresult`(`answer`, `userid`, `taskid`) values ('{$answer}','{$userid}','{$id}')";
  $upsql="update `task` set status='未批阅' where id='{$id}'";
  $result=$mysqli->query($sql);
  $upresult=$mysqli->query($upsql);
  echo $mysqli->error;
  echo $result;
  echo $upresult;
?>