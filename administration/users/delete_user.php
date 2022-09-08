<?php
 require_once('../dBConfig/dBConnect.php');
  $id = $_GET['id'];
   $del = $connect->query("delete from tms_users where id = '$id'");
    if($del){
    	header('location:users.php');
    }
?>