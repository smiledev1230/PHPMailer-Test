<?php
    require_once "connect-db.php";
    
    $p = new db;

    $image_id = $_POST['image_id'];
    $cat_id = $_POST['cat_id'];
    if ($image_id && $cat_id)
        $p->removeimgforcat($image_id,$cat_id);
    
?>