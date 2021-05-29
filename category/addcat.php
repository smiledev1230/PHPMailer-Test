<?php
    require_once "connect-db.php";
    
    $p = new db;
	$cat_name = $_POST['cat_name'];
    //print_r($_FILES);
    $p->addCat($cat_name);
    
?>