<?php
    require_once "connect-db.php";;
    
    $p = new db;

    $image_id = $_POST['image_id'];
    $order_id = $_POST['order_id'];
    if ($image_id)
        $p->updateDragDrop($image_id,$order_id);
    
?>