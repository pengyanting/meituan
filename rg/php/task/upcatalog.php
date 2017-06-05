<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("localhost","root","","rg");
  $mysqli->query("set names utf8");
  $username=$_POST['username'];
  $userid=$_POST['userid'];
  $id=$_POST['id'];
  $sql="update `catalog` set username='{$username}',userid='{$userid}' where id='{$id}'";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>