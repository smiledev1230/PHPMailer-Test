<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Honest Install - Photo Gallery</TITLE>
        <META content="text/html; charset=iso-8859-1" http-equiv=Content-Type>
        <META NAME="Description" CONTENT="Photo Gallery - Honest Install">
       
        <LINK 
            rel=stylesheet type=text/css href="honestinstall.css">
       
    <link rel="stylesheet" href="/assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
    <SCRIPT language=JavaScript type=text/javascript 
    src="scripts/checkfieldsproduct.js"></SCRIPT>

    <META name=GENERATOR content="MSHTML 8.00.6001.19190">
            <STYLE type=text/css>A:link {
            COLOR: #808080
        }
        A:visited {
            COLOR: #808080
        }
        A:hover {
            COLOR: #ffcc00
        }
            </STYLE>
            <!--[if lte IE 9]>
            <STYLE type=text/css>.prodboxbg {
            WIDTH: 730px
        }
        .txtheight {
            HEIGHT: 88px
        }
            </STYLE>
            <LINK rel=stylesheet type=text/css href="all-ie-only.css"><![endif]--><!-- css !-->
            <STYLE type=text/css media=screen>@import url( css/style.css );
            </STYLE>
            <!-- eof css !--><!-- Beginning of compulsory code below --><LINK rel=stylesheet 
        type=text/css href="css/dropdown/dropdown.css" media=screen><LINK rel=stylesheet 
        type=text/css href="css/dropdown/themes/drop/default.advanced.css" media=screen><!--[if lt IE 7]>
<script type="text/javascript" src="js/jquery/jquery.js"></script>
<script type="text/javascript" src="js/jquery/jquery.dropdown.js"></script>
<![endif]--><!-- / END --><!-- if IE !--><!--[if IE 7]><LINK rel=stylesheet 
type=text/css href="css/ie.css"><![endif]--><!--[if gte IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]--><!-- eof if IE !-->
<SCRIPT type=text/javascript>
        function resetme(){
        document.forms["serviceform"].reset();
        }
</SCRIPT>


<link rel="stylesheet" href="/assets/nivo/themes/default/default.css" type="text/css" media="screen" />

<link rel="stylesheet" href="/assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
	<!-- CSS for this demo, don't use in your project -->
		<link rel="stylesheet" href="css/main.css">
		
		<!-- FontAwesome CSS for cool icons -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">        
		
		<!-- Final Tiles Grid Gallery CSS -->
        <link rel="stylesheet" href="css/finaltilesgallery.css">

		<!-- Include jQuery only if it is not already present in your code -->
		<script src="js/jquery-1.11.1.min.js"></script>
		
		<!-- Final Tiles Grid Gallery script --> 
        <script src="js/jquery.finaltilesgallery.js"></script>
        
        <!--
	         * Lightbox v2.7.1
			 * by Lokesh Dhakar - http://lokeshdhakar.com/projects/lightbox2/
			 *
			 * @license http://creativecommons.org/licenses/by/2.5/			 
	    -->
	    <script src="js/lightbox2.js"></script>
		<link rel="stylesheet" href="css/lightbox2.css">
        
        <script>
	        $(function () {		        
		        //we call Final Tiles Grid Gallery without parameters,
		        //see reference for customisations: http://final-tiles-gallery.com/index.html#get-started
		        $(".final-tiles-gallery").finalTilesGallery({
        autoLoadURL: "get-images.php",
        autoLoadOffset: 1000
    });				       		                
	        });	        
	    </script>
</HEAD>
<BODY onload=resetme()>
    <?php $menu = "photos";
        include("includes/menu2.php");
        ?>

    <DIV style="background-color:#FFF;border-left: 1px solid #999;border-right: 1px solid #999"><br>
    <iframe src="folderslider/index.html" width="840px" height="570px" frameBorder="0">Browser not compatible.</iframe>

   <div id="gallery" class="final-tiles-gallery effect-zoom effect-fade-out  caption-bottom" style="padding:10px">
			    <div class="ftg-items">
                       
<?php
	include("get-images.php");
?>
                    
			    </div>
			</div>		

        <br>

   
<br>

                  
       
                    <P class=bottomText align=center><!--Start Customer Lobby--><A 
                            onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" 
                            href="http://www.customerlobby.com/reviews/403/honest-install/" 
                            target=_blank><IMG style="DISPLAY: none" border=0 alt=Statistics 
                                           src="http://www.customerlobby.com/ctrack-403"><IMG border=0 
                                           alt="Review of Honest Install" 
                                           src="http://www.customerlobby.com/img/403/standard/"></A><!--End Customer Lobby--> 
                        <BR><BR>SCHEDULE SERVICE NOW!<STRONG>&nbsp; 
                            972-470-3528<BR><BR></STRONG>E-Mail us Directly: <A 
                            title="E-Mail Honest Install" 
                            href="mailto:info@HonestInstall.com"><STRONG>info@HonestInstall.com</STRONG></A></P>
                    <P class=bottomText align=center><A href="contact.php"><STRONG>Schedule 
                                Service/Inquiry Form</STRONG></A></P></TD></TR></TBODY></TABLE><?php require("footer.php"); ?>
  
</BODY>
</HTML>
