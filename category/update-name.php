<?php
    require_once "connect-db.php";
    
    $p = new db;

    $cat_id = $_POST['cat_id'];
    $title = $_POST['title'];
    if ($cat_id)
        $p->updateCattitle($cat_id,$title);
    
?>