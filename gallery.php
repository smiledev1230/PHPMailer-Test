<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD>
        <META content="text/html; charset=iso-8859-1" http-equiv=Content-Type>
        <LINK rel=stylesheet type=text/css href="honestinstall2.css">

        <SCRIPT language=JavaScript type=text/javascript 
        src="scripts/checkfieldsproduct.js"></SCRIPT>

        <META name=GENERATOR content="MSHTML 8.00.6001.19190">
                <STYLE type=text/css>
                A:link {
                COLOR: #000
            }
            A:visited {
                COLOR: #000
            }
            A:hover {
                COLOR: #000
            }
			body{
	background-attachment: scroll;
	background-image: url(images/crawlerbg.jpg);
	background-repeat: no-repeat;
	background-position: center top;
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
                <!-- eof css !--><!-- Beginning of compulsory code below -->
                <LINK rel=stylesheet type=text/css href="css/dropdown/dropdown.css" media=screen>
                <LINK rel=stylesheet type=text/css href="css/dropdown/themes/drop/default.advanced.css" media=screen><!--[if lt IE 7]>
<script type="text/javascript" src="js/jquery/jquery.js"></script>
    <script type="text/javascript" src="js/jquery/jquery.dropdown.js"></script>
    <![endif]--><!-- / END --><!-- if IE !--><!--[if IE 7]><LINK rel=stylesheet 
    type=text/css href="css/ie.css"><![endif]--><!--[if gte IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]--><!-- eof if IE !-->
    <SCRIPT type=text/javascript>
            function resetme(){
            window.scrollTo(0,0);
            document.forms["serviceform"].reset();
            }
</SCRIPT>
</HEAD>
<BODY onload=resetme()>

    <!-- Beginning of compulsory code below -->


    <!-- old top menu !-->
        <link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />

        <link href="css/dropdown/themes/drop/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
        <!-- eof old top menu !-->

    <!-- new top menu !-->
        <link href="css/dropdown/dropdown.linear.columnar.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="css/dropdown/themes/lwis.celebrity/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
        <!-- eof new top menu !-->


    <!--[if lt IE 7]>

<script type="text/javascript" src="js/jquery/jquery.js"></script>

<script type="text/javascript" src="js/jquery/jquery.dropdown.js"></script>

<![endif]-->



<!-- / END -->


<div align="center">

    <!-- wrapper !-->

    <div id="wrapper">



        <!-- header !-->

        <div class="header">

            <?php
            // display random image
            // Change this to the total number of images in the folder 

            $total = "2";

            // Change to the type of files to use eg. .jpg or .gif 

            $file_type = ".jpg";

            // Change to the location of the folder containing the images 

            $image_folder = "images/random";

            // You do not need to edit below this line 

            $start = "1";

            $random = mt_rand($start, $total);

            $image_name = $random . $file_type;

            echo "<img src=\"$image_folder/$image_name\" alt=\"$image_name\" /></div>";
            ?>   

            <!-- eof header !-->



            <!-- nav !-->

            <div class="nav">

                <div id="nav-wrap">

                    <ul id="nav" class="dropdown dropdown-linear dropdown-columnar"  style="background-color:#878787;margin-left:-20px;width:830px">

                        <li><a href="./" <?php if ($menu == "home") echo 'id="active"'; ?>>Home</a></li>

                        <li class="dir" onMouseOver="" ><span  <?php if ($menu == "pricing") echo 'id="active"'; ?>>Services &amp; Pricing</span>
                            <ul style="width:180px">


                                <!-- duplicate this for multiple cols !-->
                                <li class="dir"><ul><li><a href="/pricing.php">Pricing Menu</a></li>

                                        <li><a href="/install.php" >Install Services </a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>


                        <li><a href="/commercial.php?menu=cw"  <?php if ($menu == "cw") echo 'id="active"'; ?>>COMMERCIAL INSTALLS</a></li>


                        <li class="dir" onMouseOver="" ><span <?php if ($menu == "gc") echo 'id="active"'; ?>>Products</span>
                            <ul>


                                <!-- duplicate this for multiple cols !-->
                                <li class="dir">
                                    <ul>
                                        <li><a href="http://www.honestinstall.com/products-and-installation.php"><span  class="yellowmenu">Product Overview Page</span></a></li>
                                        <li><a href="/product-internettv.php">AppleTV  </a></li>
                                        <li><a href="/product-elitetv.php">Elite TVs</a></li>
                                        <li><a href="/product-epson.php">Epson Projectors</a></li>
                                        <li><a href="/product-giftidea.php">Featured Products</a></li><li><a href="/product-prepaid.php">Gift Cards</a>
                                        </li>
                                        <li><a href="/product-glomount.php">GloMount LED TV Bracket</a></li>
                                        <li><a href="/product-internetradio.php">Internet Radio</a></li>

                                    </ul>
                                </li>

                                <!-- eof duplicate this for multiple cols !-->

                                <!-- duplicate this for multiple cols !-->
                                <li class="dir"><ul>
                                        <li><a href="/product-irkit.php">IR Remote Repeaters </a></li>
                                        <li><a href="/product-outcast.php">Outcast Wireless Speaker<br />System</a></li>
                                        <li><a href="/product-internettv.php">Roku  </a></li>
                                        <li><a href="/product-securetv.php">Secure/Safety TV Kit  </a></li>
                                        <li><a href="/product-internettv.php">Streaming Boxes</a></li>
                                        <li><a href="/product-credenzas.php">TV Stands </a></li>
                                        <li><a href="/product-universalremote.php">Universal Remotes  </a></li>
                                        <li><a href="/product-wifibooster.php">Wi-Fi Extenders</a></li></ul>
                                </li>

                                <!-- eof duplicate this for multiple cols !-->


                            </ul>
                        </li>



                        <li class="dir" onMouseOver="" ><span <?php if ($menu == "process") echo 'id="active"'; ?>>Our Process</span>
                            <ul style="width:180px">

                                <!-- duplicate this for multiple cols !-->
                                <li><ul>
                                        <li><a href="/process.php">The Honest Way</a></li>
                                        <li><a href="/fireplace-faqs.php">Fireplace TV FAQs</a></li>
                                        <li><a href="/install.php#Photos">Photo Gallery</a></li>
                                        <li><a href="/spotlight.php">Spotlight Page</a></li>
                                        <li><A onClick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" 

                                               href="http://www.customerlobby.com/reviews/403/honest-install/" 

                                               target=_blank>Customer Reviews</a></li>
                                        <li><a href="/referral.php">Referral Program</a></li>
                                        <li><a href="/matchmyinstall.php">Price Matching</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li><A onClick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" 

                               href="http://www.customerlobby.com/reviews/403/honest-install/" 

                               target=_blank class="dir2">Reviews</a></li>

                        <li class="dir" onMouseOver="" ><span <?php if ($menu == "about") echo 'id="active"'; ?>>About Honest</span>
                            <ul style="width:180px">

                                <!-- duplicate this for multiple cols !-->
                                <li class="dir">
                                    <ul>
                                        <li><a href="/about.php">About</a></li>
                                        <li><a href="http://www.honestinstall.blog.com/" target="_blank">Honest Blog</a></li>
                                        <li><a href="/companynews.php">Company News</a></li>
                                        <li><a href="/contact.php">Contact Us</a></li> 
                                    </ul>
                                </li>


                            </ul>
                        </li>

                        <li><a href="/contact.php"   <?php if ($menu == "contact") echo 'id="active"'; ?>>Contact Us</a></li>

                    </ul>

                </div>

                <!-- eof nav !-->



            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <!-- eof wrapper !-->
    <?php include("scrollinclude.php"); ?>
    <br/><br/><br/>    

    <div align="center" style="border-top:#333;border-top-width: 1px;border-top-style: solid;border-top-color: #666;width:850px;margin:0 auto;">
        <div id="rotator"><span class="schedule"><a href="http://www.honestinstall.com/contact.php">Schedule Service/Request a Quote</a></span><div onClick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" class="pricing"></div><div onClick="location.href='/product-epson.php';" class="gideabox"></div><div onClick="location.href='/product-epson.php';" class="gideabox"></div><div onClick="location.href='/product-prepaid.php';" class="prepaidbox"></div></div>

        <TABLE border=0 cellSpacing=0 cellPadding=0 width=850 align=center >

            <TBODY>

                <TR vAlign=top>

                    <TD class=mainBG align="center"><br />
                        <div style="text-align:center">
                            <strong>Honest Install - TV INSTALLATION, HOME THEATER & AUDIO/VIDEO - Dallas, Texas | <a href="mailto:info@honestinstall.com">info@honestinstall.com</a>

                                <?php                         if ($menu == "home") {
                                    echo " | 972-470-3528";
                                }
                                ?>
                            </strong>
                            <?php                     if ($menu != "home") {

                                echo

                                <<<ENDH

<FONT size=2><BR></FONT><A 

      href="http://www.honestinstall.com/"><FONT size=2 

      face=Arial><STRONG>www.HonestInstall.com</STRONG></FONT></A><FONT 

      color=#808080><STRONG><FONT size=2 face=Arial>&nbsp; |&nbsp; <FONT 

      size=3>972-470-3528</FONT>&nbsp; |&nbsp; </FONT></STRONG></FONT><A 

      href="mailto:info@honestInstall.com"><STRONG><FONT size=2 

      face=Arial>info@honestInstall.com</FONT></STRONG></A>



ENDH;
                            }
                            ?>

                        </div>
                    </TD></TR></TBODY></TABLE>

        <TABLE border=0 cellSpacing=0 cellPadding=0 width=850 align=center>
            <TBODY>
                <TR vAlign=top>
                    <TD class=mainBG><BR><BR>

                        <div align="center">
                            <img src="images/photogall.jpg" /></div>

                        <DIV class=formbox>
                            <H4>Schedule It or Ask a Question</H4>
                            <FORM onSubmit="return CheckRequiredFields()" method=post name=serviceform 
                                  action=/scripts/serviceform.php>
                                  <TABLE border=0 cellPadding=0 width="100%">
                                    <TBODY>
                                        <TR>
                                            <TD width=166>
                                                <TABLE>
                                                    <TBODY>
                                                        <TR>
                                                            <TD class=contactFormSpacing><INPUT value="I have a question" 
                                                                                                type=radio name=Subject> &nbsp;&nbsp;<LABEL><STRONG>I have a 
                                                                        question</STRONG></LABEL></TD></TR></TBODY></TABLE></TD>
                                            <TD width=240>
                                                <TABLE>
                                                    <TBODY>
                                                        <TR>
                                                            <TD class=contactFormSpacing><INPUT 
                                                                    value="I want to schedule service" type=radio 
                                                                    name=Subject>&nbsp;&nbsp;<STRONG>I want to schedule 
                                                                    service</STRONG></TD></TR></TBODY></TABLE></TD>
                                            <TD><STRONG>Phone</STRONG> <SPAN style="COLOR: #0aa0fe">*</SPAN> 
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <INPUT style="WIDTH: 243px" 
                                                                                      name=phone></TD></TR>
                                        <TR>
                                            <TD vAlign=top colSpan=2>
                                                <TABLE border=0 cellPadding=0 width="100%">
                                                    <TBODY>
                                                        <TR vAlign=top>
                                                            <TD style="PADDING-TOP: 30px" vAlign=top><STRONG>Full 
                                                                    Name</STRONG> <SPAN style="COLOR: #0aa0fe">*</SPAN></TD>
                                                            <TD style="PADDING-TOP: 30px"><INPUT style="WIDTH: 240px" 
                                                                                                 name=realname></TD></TR>
                                                        <TR>
                                                            <TD style="PADDING-TOP: 30px"><STRONG>Company/Org.</STRONG></TD>
                                                            <TD style="PADDING-TOP: 30px"><INPUT style="WIDTH: 240px" 
                                                                                                 name=Company></TD></TR>
                                                        <TR>
                                                            <TD style="PADDING-TOP: 30px"><STRONG>Email</STRONG> <SPAN 
                                                                    style="COLOR: #0aa0fe">*</SPAN></TD>
                                                            <TD style="PADDING-TOP: 30px"><INPUT style="WIDTH: 240px" 
                                                                                                 name=email></TD></TR></TBODY></TABLE></TD>
                                            <TD vAlign=top><BR><BR><TEXTAREA class=txtheight onClick="document.serviceform.Comments.value='';" rows=15 cols=36 name=Comments>Comments</TEXTAREA><BR><BR><INPUT 
                                                    value=http://honestinstall.com/thanks.php type=hidden name=redirect> 
                                                    <INPUT value=phone,realname,email type=hidden name=required> <INPUT 
                                                    value=service type=hidden name=recipient> <INPUT 
                                                    value="Internet + TV Inquiry" type=hidden name=subject> <INPUT 
                                                    value=Submit alt=Submit src="images/submit.jpg" 
                                                    type=image></TD></TR></TBODY></TABLE></FORM></DIV><BR><BR><BR>
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
                                    Service/Inquiry Form</STRONG></A></P>
                    </TD></TR></TBODY></TABLE><?php require("footer.php"); ?></BODY></HTML>
