<?php
require_once '../dBConfig/dBConnect.php';
$id = $_GET['id'];
$dl = $connect->query("DELETE FROM sms_customer WHERE customer = '$id'");
if($dl){
	header("location: customer.php");
}
else{
	
}
?>		