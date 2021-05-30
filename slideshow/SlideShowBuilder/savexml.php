<?php 
if (isset($GLOBALS["HTTP_RAW_POST_DATA"])){ 
    $xml = $GLOBALS["HTTP_RAW_POST_DATA"]; 
    $file = fopen("slideshowplaylist.xml","wt"); 
    fwrite($file, $xml); 
    fclose($file);  
} 
?>