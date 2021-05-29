<?php
    require_once "connect-db.php";
    
    $p = new db;

    $image_id = $_POST['image_id'];
    $subtitle = $_POST['subtitle'];
    if ($image_id)
        $p->updateSubtitle($image_id,$subtitle);
    
?>