<?php
session_start();
require_once 'dBConfig/dBConnect.php';
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if($username == '' || $password == ''){
		$error_sms = "<span style = 'color:red;font-size:12px'>Fill all empty field</span>";
	}
	else{
		// $user_apartments = $connect->query($sql);

		$query = $connect->query("SELECT * FROM tms_users WHERE username = '$username' AND password = '$password'");
		$num_rows = mysqli_num_rows($query);
		if($num_rows == 0){
			$error_sms = "<p style = 'color:red;font-size:12px'>Login failed ! Wrong username or password</p>";
		}
		else{
			$fetch_data = mysqli_fetch_array($query);
			$role = $fetch_data['role'];
			$status = $fetch_data['status'];
			if($status == 'No'){
			 $error_sms = "<p style = 'color:red;font-size:12px'>Your account has been blocked! Please visit administration to see what happened</p>";	
			}
			else{
				if($role == 'Admin'){
					$_SESSION['id'] = $fetch_data['id'];
					$_SESSION['name'] = $fetch_data['name'];
					$_SESSION['username'] = $fetch_data['username'];
					$_SESSION['role'] = $fetch_data['role'];
					header('location: administration/');
				}
				else{
					$_SESSION['id'] = $fetch_data['id'];
					$_SESSION['name'] = $fetch_data['name'];
					$_SESSION['username'] = $fetch_data['username'];
					$_SESSION['username'] = $fetch_data['username'];
					header('location: alt/');
				}
			}
		}
	}
}
?>
