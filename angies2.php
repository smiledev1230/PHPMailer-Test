<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Honest Install - HOME THEATER, AUDIO/VIDEO & TV INSTALLATION - Dallas, Texas</title>
        <link href="css/angies_style.css" rel="stylesheet" type="text/css"/>
        <link href="css/pagination.css" rel="stylesheet" type="text/css"/>

        <meta content="text/html; charset=iso-8859-1" http-equiv=Content-Type></meta>

        <link  rel=stylesheet type=text/css href="honestinstall.css">
        <? include("includes/keywords.php"); ?>
        <style type=text/css>
               A:link {
               COLOR: #808080
               }

               A:visited {
               COLOR: #808080
               }

               A:hover {
               COLOR: #ffcc00
               }
        </style>

        <!-- css !-->
        <style type="text/css">
            <!--
            @import url(css/style.css);
            -->
        </style>
        <!-- eof css !-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> 
        <script type="text/javascript" src="/scripts/jquery.jshowoff.js"></script>
        <link rel="stylesheet" href="/scripts/jshowoff.css" type="text/css" media="screen, projection" />
        <!--[if gte IE 7]>
        <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
        <!--[if IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
        <!--[if IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css"><![endif]-->
        <!-- eof if IE !-->
        <meta property="fb:page_id" content="122796624447624" />
        <!-- thumbnail scroller stylesheet -->
        <link href="includes/jquery.thumbnailScroller.css" rel="stylesheet" />
        <!-- jquery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
        <!-- jquery ui custom build (for animation easing) -->
        <script src="includes/jquery-ui-1.8.13.custom.min.js"></script>
</head>
<body>
    <?
    $menu = "home";
    include("includes/menu2.php");
    ?>

    <div id="wrapper">
        <div id="content">
            <div id="content-logo-left">
                <img id="al" alt="angieslist" src="images/al.png"/>
            </div>
            <div id="content-logo-right">
                <img id="al2011" alt="angieslist" src="images/al2011.png"/>
                <img id="al2011" alt="angieslist" src="images/al2011.png"/>
            </div>
            <div class="clear"></div>
            <div id="bar">
                <div id="bar1"></div>
                <div id="bar2"></div>
            </div>
            <div class="clear"></div>

            <!-- angieslist content -->
            <?php
            include 'angies_list.php';
            var_dump($data);
            exit(); 
            foreach ($data as $review) :
                ?>
                <div class="content-box">
                    <p class="content-box-title">
                        Review Date: July 03, 2013
                    </p>
                    <div class="content-box-left">
                        <table border="0">
                            <tr>
                                <td class="content-box-left-description"> Company Name: </td>
                                <td> HonestInstall </td>
                            </tr>
                            <tr>
                                <td class="content-box-left-description"> Categories: </td>
                                <td> 
                                    Home Automation <br/>
                                    Stereo & Home Theater Systems
                                </td>
                            </tr>
                            <tr>
                                <td class="content-box-left-description"> Services Performed: </td>
                                <td> Yes </td>
                            </tr>
                            <tr>
                                <td class="content-box-left-description"> Work Completed Date: </td>
                                <td> August 22, 2012 </td>
                            </tr>
                            <tr>
                                <td class="content-box-left-description"> Last Modified Date: </td>
                                <td> July 08, 2013 </td>
                            </tr>
                            <tr>
                                <td class="content-box-left-description"> Hire Again: </td>
                                <td> Yes </td>
                            </tr>
                            <tr>
                                <td class="content-box-left-description"> Approximate Cost: </td>
                                <td> $2000,00 </td>
                            </tr>
                            <tr>
                                <td class="content-box-left-description"> Home Build Year: </td>
                                <td> 2012 </td>
                            </tr>
                            <tr>
                                <td class="content-box-left-description" colspan="2"> 
                                    <b>Description of Work:</b>
                                    <br/>
                                    <label class="content-box-colspan2">They installed of my home theater equipment.</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="content-box-left-description" colspan="2"> 
                                    <b>Member Comments:</b>
                                    <br/>
                                    <label class="content-box-colspan2">It went good.</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="content-box-left-description"> Share on Band of Neighbours </td>
                                <td> Yes </td>
                            </tr>
                        </table>
                    </div>
                    <div class="content-box-right">
                        <div class="overall-box">
                            <table border="0">
                                <tr>
                                    <td class="overall-box-left overall-title"> Overall </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td class="overall-box-left"> Price </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td class="overall-box-left"> Quality </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td class="overall-box-left"> Responsiveness </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td class="overall-box-left"> Punctuality </td>
                                    <td> A </td>
                                </tr>
                                <tr>
                                    <td class="overall-box-left"> Professionalism </td>
                                    <td> A </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div> <!-- end of angieslist box -->
            endforeach; ?>


            <div class="pagination">
                <span class="disabled"> Previous</span><span class="current">1</span><a href="?page=2">2</a><a href="?page=3">3</a><a href="?page=4">4</a><a href="?page=5">5</a><a href="?page=6">6</a><a href="?page=7">7</a>...<a href="?page=199">199</a><a href="?page=200">200</a><a class="next" href="?page=2">Next »</a>
            </div>

            <P class=bottomText align=center>SCHEDULE SERVICE NOW!<STRONG>&nbsp; <FONT 

                        size=4>972-470- 3528<BR><BR></FONT></STRONG>E-Mail us Directly: <A 

                                    title="E-Mail Honest Install" 

                                    href="mailto:info@HonestInstall.com"><STRONG>info@HonestInstall.com</STRONG></A></P></STRONG>

                                <P class=bottomText align=center><A href="contact.php"><STRONG>Schedule 

                                            Service/Inquiry Form</STRONG></A></P><STRONG><FONT color=#808080 size=2 

                                                                                   face=Arial>
                                        <A style="POSITION: relative; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; WIDTH: 150px; PADDING-RIGHT: 0px; DISPLAY: block; HEIGHT: 57px; OVERFLOW: hidden; PADDING-TOP: 0px" 

                                           id=bbblink class=rbhzbum 


                                           title="Honest Install, Home Theater, Richardson, TX" 

                                           href="http://www.bbb.org/dallas/business-reviews/home-theater/honest-install-in-richardson-tx-90343905#bbblogo" 

                                           target=_blank><IMG 

                                                style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px" 

                                                id=bbblinkimg alt="Honest Install, Home Theater, Richardson, TX" 

                                                src="http://seal-dallas.bbb.org/logo/rbhzbum/honest-install-90343905.png" 

                                                width=300 height=57></A>

                                        <SCRIPT type=text/javascript>var bbbprotocol = ( ("https:" == document.location.protocol) ? "https://" : "http://" ); document.write(unescape("%3Cscript src='" + bbbprotocol + 'seal-dallas.bbb.org' + unescape('%2Flogo%2Fhonest-install-90343905.js') + "' type='text/javascript'%3E%3C/script%3E"));</SCRIPT>

                                    </FONT></FONT></STRONG></P></FONT></STRONG></FONT></STRONG></FONT></FONT></STRONG></FONT>

                                </TD></TR></TBODY></TABLE>require("footer.php"); ?>


                                </div>
                                </div>
                                </body>
                                </html>
