<?php
//Database Connection Settings
define ('hostnameorservername','localhost'); //Your server name or hostname goes in here
define ('serverusername','root'); //Your database username goes in here
define ('serverpassword','admin');  //Your database password goes in here
define ('databasenamed','tms');  //Your database name goes in here

$connect = new mysqli("localhost","root","Saims@199","tms");
if($connect->connect_error){
    die("Connection failed: ". $connect->connect_error);
}