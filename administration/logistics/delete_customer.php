<?php
session_start();
 require_once('../dBConfig/dBConnect.php');
  $id = $_GET['id'];
   $q = $connect->query("select * from tms_users where id = '".$_SESSION['id']."'");
	  $fetch_data = mysqli_fetch_array($q);
	  $del_auth = $fetch_data['del_auth'];
      if($del_auth == 0){
			 $_SESSION['del_error'] = "<div class = 'alert alert-danger flush'>Sorry! You don't have previllege to delete customer informations,please see system administration</div>";
			 header('location:deleted_customer.php');	 
	  }
	  else{
   $del = $connect->query("delete from tms_customer where id = '$id'");
    if($del){
	    $_SESSION['del_error'] = "<div class = 'alert alert-success flush'>One record has successfully deleted</div>";
    	header('location:deleted_customer.php');
    }
	}
?>