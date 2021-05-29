<?php
require_once "connect.php";
$p = new db;
$id = $_POST['id'];
$rate = floatval($_POST['rate']);
$rate_update = $p->updateRate($id,$rate);
if ($rate_update == true){
    echo "yes";
}else{
    echo "no";
}

?>