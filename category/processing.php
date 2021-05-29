<?php
    require_once "connect-db.php";
    
    $p = new db;

    //print_r($_FILES);
    $p->addImages();
    
?>