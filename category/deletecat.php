<?php
    require_once "connect-db.php";
    
    $p = new db;

    $cat_id = $_POST['cat_id'];
    if ($cat_id)
        $p->deleteCat($cat_id);
    
?>