<?php
require_once ('../dBConfig/dBConnect.php');
$sth = $connect->query("SELECT * FROM tms_items ORDER BY id DESC");
$data = array();
while($r = mysqli_fetch_assoc($sth)) {
    $data[] = $r;
}
print json_encode($data);
?>