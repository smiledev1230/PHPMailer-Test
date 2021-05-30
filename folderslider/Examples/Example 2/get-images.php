<?php
$tot_img=51;
/*if(!isset($_POST["page"])){
	$page=1;
	$start=1;
} else {
$page=$_POST["page"];
$start=($page-1)*10-1;
}

for($i=$start;$i<$page*10;$i++){
	if($i<=$tot_img){
echo <<<ENDH
 <div class="tile">
			            <a class="tile-inner" data-title="" data-lightbox="gallery" href="images/tile/$i.jpg">
			                <img class="item" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="images/tile/thumbs/$i.jpg" />
			            </a>
			        </div>
ENDH;
		}
	else break;
	}*/
	
	if(!isset($page)){ $page= 222;
	} 
	echo "page: $page";
?>