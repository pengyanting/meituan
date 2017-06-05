<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("localhost","root","","rg");
  $mysqli->query("set names utf8");
  $id=$_POST['id'];
  $deltype=$_POST['deltype'];
  $sql="delete from `{$deltype}` where id='{$id}'";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>