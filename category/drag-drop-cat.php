<?php
    require_once "connect-db.php";;
    
    $p = new db;

    $cat_id = $_POST['cat_id'];
    $order_id = $_POST['order_id'];
    if ($cat_id)
        $p->updateCatDragDrop($cat_id,$order_id);
    
?>