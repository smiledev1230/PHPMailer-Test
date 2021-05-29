<?php
    require_once "connect-db.php";
    
    $p = new db;

    $image_id = $_POST['image_id'];
    if ($image_id)
        $p->deleteImage($image_id);
    
?>