
<?php
/*
function get_string($string, $start, $end){
 $string = " ".$string;
 $pos = strpos($string,$start);
 if ($pos == 0) return "";
 $pos += strlen($start);
 $len = strpos($string,$end,$pos) - $pos;
 return substr($string,$pos,$len);
}
$html=file_get_contents("http://www.customerlobby.com/reviews/403/honest-install/");
$parsed = get_string($html, "Rating Summary of ", "reviews");
//echo $parsed;
$total_review=str_replace(" ","",$parsed);
*/
$total_review= "295";
?>
