<?php
$title[1]="Living Room TV with LED GloKit - Dallas, TX";
$title[2]="Outdoor Fireplace TV & Sound System - Sachse, TX";
$title[3]="Fireplace TV with Soundbar";
$title[4]="Stone Fireplace TV Install w/ Hidden Components";
$title[5]="UTD Dallas - Technology Store 2x2 Video Wall Project";
$title[6]="UTD Dallas - Technology Store 2x2 Video Wall Project";
$title[7]="Custom Projector Ceiling Box for Digital Art Wall - Dallas, TX";
$title[8]="The Red Theater - Media Room in Allen, TX";
$title[9]="The Red Theater - Media Room in Allen, TX";
$title[10]="UTD Dallas - Technology Store 2x2 Video Wall Project";
$title[11]="The Red Theater - Media Room in Allen, TX";
$title[12]="TV Install, Private Residence - Dallas, TX";
$title[13]="&quot;War Room&quot; Three TV Setup - Firewheel, TX";
$title[14]="&quot;War Room&quot; Three TV Setup - Firewheel, TX";
$title[15]="#77's (America's Team) Media Room - Dallas, TX";
$title[16]="#77's (America's Team) Media Room - Dallas, TX";
$title[17]="Fireplace TV & In-Ceiling Surround Sound - Dallas, TX";
$title[18]="Fireplace TV Install";
$title[19]="Living Room TV with LED GloKit - Dallas, TX";
$title[20]="The Red Theater - Media Room in Allen, TX";
$title[21]="TV Install, Private Residence - Dallas, TX";
$title[22]="110&quot; Black Diamond Screen (light rejecting technology) for Media
Room - Frisco, TX";
$title[23]="D&M Leasing: Corporate Board Room - Addison, TX";
$title[24]="Stone Fireplace TV Install w/ Hidden Components";
$title[25]="UTD Dallas - Technology Store 2x2 Video Wall Project";
$title[26]="Ultra Low Profile TV Install, Private Residence - Dallas, TX";
$title[27]="Digital Art Wall, Private Residence - Dallas, TX";
$title[28]="Applied Energy: Conference Room - Carrolton, TX";
$title[29]="Fireplace TV Install";
$title[30]="&quot;War Room&quot; Three TV Setup - Firewheel, TX";
$title[31]="&quot;War Room&quot; Three TV Setup - Firewheel, TX";
$title[32]="Commercial Audio System for High School Auditorium";
$title[33]="D&M Leasing: Corporate Board Room - Addison, TX";
$title[34]="Stone Fireplace TV Install w/ Hidden Components";
$title[35]="Stone Fireplace TV Install w/ Hidden Components";
$title[36]="UTD Dallas - Technology Store 2x2 Video Wall Project";
$title[37]="Living Room TV with LED GloKit - Dallas, TX";
$title[38]="Fireplace TV & In-Ceiling Surround Sound - Dallas, TX";
$title[39]="TV Install, Private Residence - Dallas, TX";
$title[40]="110&quot; Black Diamond Screen (light rejecting technology) for Media
Room - Frisco, TX";
$title[41]="Stucco Fireplace TV Install - Dallas, TX";
$title[42]="Custom Projector Ceiling Box for Digital Art Wall - Dallas, TX";
$title[43]="Stucco Fireplace TV Install - Dallas, TX";
$title[44]="Fireplace TV with Soundbar";
$title[45]="TV Install, Private Residence - Dallas, TX";
$title[46]="Outdoor Fireplace TV & Sound System - Sachse, TX";
$title[47]="UTD Dallas - Technology Store 2x2 Video Wall Project";
$title[48]="UTD Dallas - Technology Store 2x2 Video Wall Project";
$title[49]="UTD Dallas - Technology Store 2x2 Video Wall Project";
$title[50]="UTD Dallas - Technology Store 2x2 Video Wall Project";
$title[51]="UTD Dallas - Technology Store 2x2 Video Wall Project";
$tot_img=count($title);
if(!isset($_GET["page"])){
	$page=1;
	$start=1;
} else {
$page=$_GET["page"];
$start=($page-1)*10;
}

for($i=$start;$i<$page*10;$i++){
	if($i<=$tot_img){
echo <<<ENDH
<div class="tile">
	<a class="tile-inner" data-title="$title[$i]" data-lightbox="gallery" href="images/tile/$i.jpg">
		<img class="item" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="images/tile/thumbs/$i.jpg" />
							
        <span class='subtitle'>$title[$i]</span>
	</a>
</div>
ENDH;
		}
	else break;
	}
	
?>