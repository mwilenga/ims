<?php
require_once ('../dBConfig/dBConnect.php');
$sth = $connect->query("SELECT * FROM tms_users");
$data = array();
while($r = mysql_fetch_assoc($sth)) {
    $data[] = $r;
}
print json_encode($data);
?>