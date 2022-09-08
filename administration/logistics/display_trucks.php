<?php
require_once ('../dBConfig/dBConnect.php');
$sth = $connect->query("SELECT * FROM tms_trucks");
$data = array();
while($r = mysql_fetch_assoc($sth)) {
    $data[] = $r;
}
print json_encode($data);
?>
