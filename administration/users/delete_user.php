<?php
 require_once('../dBConfig/dBConnect.php');
  $id = $_GET['id'];
   $del = mysql_query("delete from tms_users where id = '$id'");
    if($del){
    	header('location:users.php');
    }
?>