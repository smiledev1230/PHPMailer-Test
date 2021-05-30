<?php
$string =array();
$filePath='images/tile/';  
$dir = opendir($filePath);
while ($file = readdir($dir)) { 
   if (preg_match("/.png/",$file) || preg_match("/.jpg/",$file) || preg_match("/.gif/",$file) ) { 
   $string[] = $file;
   }
}
while (sizeof($string) != 0){
  $img = array_pop($string);
echo <<<ENDH
 <div class="tile">
			            <a class="tile-inner" data-title="" data-lightbox="gallery" href="images/tile/$img">
			                <img class="item" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="images/tile/thumbs/$img" />
			            </a>
			        </div>
ENDH;
}
?>