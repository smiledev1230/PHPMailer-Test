<?php
    require_once "connect-db.php";
    $p = new db;
    
    if(!isset($_GET["page"])){
        $page=1;
        $start=0;
    } else {
        $page=$_GET["page"];
        $start=($page-1)*10;
    }
    $array = $p->mysql_Array();
    //print_r($array);
    
    for($i=$start;$i < $page*10; $i++){ 
        if($i < count($array)){
                ?>
                    <div class="tile">
                        <a class="tile-inner" data-title="<?php echo $array[$i]['subtitle']?>" data-lightbox="gallery" href="../images/uploadimg/<?php echo $array[$i]['name']?>">
                            <img class="item" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="../images/uploadimg/thumbs/thumb_<?php echo $array[$i]['name']?>" />
                            
                            <span class='subtitle'><?php echo $array[$i]['subtitle']?></span>
                        </a>
                    </div>
                <?php
                //if ($start === 10){
                   // echo "<div class='arrow'><img src='../images/arrow_down.png'/></div>"; break;
                //}
            
        }
        else break;  
    }
?>