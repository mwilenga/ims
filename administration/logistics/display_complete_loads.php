<?php
require_once ('../dBConfig/dBConnect.php');
$sth = $connect->query("SELECT * FROM tms_loads WHERE status=2 ORDER BY id DESC");
$data = array();
while($r = mysql_fetch_assoc($sth)) {
    $data[] = $r;
}
print json_encode($data);
?>