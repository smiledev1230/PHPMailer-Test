<?php session_start(); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>

        <?php
        include "db.php";
        $totalColumn = getLastColumn();
        $query = mysql_query("SELECT * FROM scroll_preview");
        while ($result = mysql_fetch_assoc($query)) {
            $data[$result['row']][$result['column']]['field'] = $result['field'];
            $data[$result['row']][$result['column']]['description'] = $result['description'];
            $data[$result['row']][$result['column']]['text_title'] = $result['text_title'];
        }
        ?>
        <script src="<?= $baseUrl; ?>js/ckeditor.js"></script>
		
   <meta charset="utf-8" />
   <title>Admin Dashboard</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <meta name="MobileOptimized" content="320">
   <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
          <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>   
           <script>
            $(document).ready(function() {
                $('#random').submit(function() {
                    var c = confirm("Do you want to randomize the data position?");
                    return c;
                });


                $("#tabs").tabs();

<?php for ($column = 1; $column <= $totalColumn; $column++): ?>
                    $("#tabs2-column<?= $column; ?>").tabs();

                    CKEDITOR.replace('row1textareaimage-column<?= $column; ?>', {
                        allowedContent: true,
                        toolbar: [
                            ['Undo', 'Redo', 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript',
                                '-', 'RemoveFormat', 'Font', 'FontSize', 'Link', 'Unlink', '-', 'Source',
                                'doksoft_image', 'doksoft_preview', 'doksoft_resize'] // Defines toolbar group without name.
                        ]
                    });

                    CKEDITOR.replace('row2textareaimage-column<?= $column; ?>', {
                        allowedContent: true,
                        toolbar: [
                            ['Undo', 'Redo', 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript',
                                '-', 'RemoveFormat', 'Font', 'FontSize', 'Link', 'Unlink', '-', 'Source',
                                'doksoft_image', 'doksoft_preview', 'doksoft_resize'] // Defines toolbar group without name.
                        ]
                    });

                    CKEDITOR.replace('row3textareaimage-column<?= $column; ?>', {
                        allowedContent: true,
                        toolbar: [
                            ['Undo', 'Redo', 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript',
                                '-', 'RemoveFormat', 'Font', 'FontSize', 'Link', 'Unlink', '-', 'Source',
                                'doksoft_image', 'doksoft_preview', 'doksoft_resize'] // Defines toolbar group without name.
                        ]
                    });

<?php endfor; ?>
            });
        </script>
		
		
        <script src="/smooth/js/jquery.mousewheel.min.js" type="text/javascript"></script>
        <script src="/smooth/js/jquery.kinetic.js" type="text/javascript"></script>
        <script src="/smooth/js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>

        <script type="text/javascript" src="/smooth/js/fancy/jquery.fancybox.js?v=2.1.4"></script>
        <script type="text/javascript" src="/smooth/js/fancy/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="/smooth/js/fancy/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        <script type="text/javascript" src="/smooth/js/fancy/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

        <link rel="stylesheet" type="text/css" href="/smooth/js/fancy/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
        <link rel="stylesheet" type="text/css" href="/smooth/js/fancy/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
        <link rel="stylesheet" type="text/css" href="/smooth/js/fancy/jquery.fancybox.css?v=2.1.4" media="screen" />

        <!-- the CSS for Smooth Div Scroll -->
        <link rel="Stylesheet" type="text/css" href="/smooth/css/smoothDivScroll.css" />

        <LINK rel=stylesheet type=text/css href="/honestinstall2.css">
        <!-- Styles for my specific scrolling content -->
        <style type="text/css">
            @import url('http://fonts.googleapis.com/css?family=Archivo+Narrow');

            .tab-title{
                color: black;
                background: white;
            }

            #scrollingText div.scrollableArea p
            {
                display: block;
                float: left;
                font-size:18px;
                background-color:transparent;
                color:#6f6f6f;
                white-space: nowrap;
                margin-left: 10px;
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 20px;
                padding-left: 5px;
                font-family: 'Archivo Narrow', sans-serif;
            }
            label {font-family: 'Archivo Narrow', sans-serif;}
            .shadow {
                -moz-box-shadow: 5px 5px 6px #ccc;
                -webkit-box-shadow: 5px 5px 6px #ccc;
                box-shadow: 5px 5px 6px #ccc;
                /* For IE 8 */
                -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#ccc')";
                /* For IE 5.5 - 7 */
                filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#ccc');
            }

            .shadow-bringer {
                background: #FAFAFA;
                margin-top: 0px;
                margin-right: auto;
                margin-bottom: 0px;
                margin-left: auto;
                padding-top: 5px;
                padding-right: 5px;
                padding-bottom: 5px;
                padding-left: 5px;
                border-radius: 5px;
            }	

            label { 
                display: block; 
                min-width: 100px;
                padding: 0 15px 0 15px;
            }


            label .bubble{font-family: 'Archivo Narrow', sans-serif;}

            .bubble:before
            {
                content: ' ';
                position: absolute;
                width: 0;
                height: 0;
                left: 36px;
                bottom: -13px;
                border: 6px solid;
                border-color: #FFCC01 transparent transparent #FFCC01;
            }

            .bubble:after
            {
                content: ' ';
                position: absolute;
                width: 0;
                height: 0;
                left: 38px;
                bottom: -10px;
                border: 5px solid;
                border-color: #FFCC01 transparent transparent #FFCC01;
            }

            .bubblehead{font-family: 'Archivo Narrow', sans-serif;font-size:18px;font-weight:bold;color:white;}


            #logoParade
            {
                width: 100%;
                height: 100px;
                position: relative;
            }

            #logoParade div.scrollableArea a
            {
                display: block;
                /*                float: left;*/
                padding-left: 10px;
            }

            #logoParade div.scrollableArea p
            {
                display: block;
                float: left;
                font-size:14px;
                background-color:transparent;
                color: #000;
                white-space: nowrap;
                margin-left: 10px;
                padding-top: 0px;
                padding-right: 0px;
                padding-bottom: 20px;
                padding-left: 5px;
                font-family: 'Archivo Narrow', sans-serif;
                background-attachment: scroll;
            }
            body{
                background-color: #FFF;
                background-image: none;
            }

            .futuratxt
            {
                color:#6f6f6f;
            }
        </style>
<script type="text/javascript">
            $(document).ready(function() {
                var status = false;
                var fancyClick = false;

                $('.fancybox').fancybox({
                    arrows: false,
                    nextClick: false
                });
				
                $("#logoParade").smoothDivScroll({
                    autoScrollingMode: "always",
                    autoScrollingDirection: "endlessLoopRight",
                    autoScrollingStep: 1,
                    autoScrollingInterval: 50
                });

                $("#logoParade").bind("hover", function() {
                    if (status == false && fancyClick == false)
                        status = true;
                    else if (fancyClick == false)
                        status = false;
                    else if (status == false && fancyClick == true)
                        status = false;

                    if (status && fancyClick != true)
                        $(this).smoothDivScroll("stopAutoScrolling");
                    else
                        $(this).smoothDivScroll("startAutoScrolling");
                    fancyClick = false;
                });

                //$('.fancybox').bind('click', function() {
				$('.fancybox').bind('hover', function() {
                    if (status == true)
                        status = false;
                    fancyClick = true;
                });

            });
        </script>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->          
   <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
   <link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
   <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
   <link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
   <link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
   <link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
   <!-- END PAGE LEVEL PLUGIN STYLES -->
   <!-- BEGIN THEME STYLES --> 
   <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
   <!-- END THEME STYLES -->
   <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
   <!-- BEGIN HEADER -->   
   <div class="header navbar navbar-inverse navbar-fixed-top">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="header-inner">
         <!-- BEGIN LOGO -->  
         <a class="navbar-brand" href="index.html">
        <span style="margin-left:10px;">Honey Install</span>
         </a>
         <!-- END LOGO -->
         <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
         <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
         <img src="assets/img/menu-toggler.png" alt="" />
         </a> 
         <!-- END RESPONSIVE MENU TOGGLER -->
         <!-- BEGIN TOP NAVIGATION MENU -->
         <ul class="nav navbar-nav pull-right">

          
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
               <span class="username">Administrator</span>
               <i class="icon-angle-down"></i>
               </a>
               <ul class="dropdown-menu">
                  <li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Full Screen</a>
                  </li>

               </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
         </ul>
         <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <div class="clearfix"></div>
   <!-- BEGIN CONTAINER -->
   <div class="page-container">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar navbar-collapse collapse">
         <!-- BEGIN SIDEBAR MENU -->        
         <ul class="page-sidebar-menu">
            <li>
               <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
               <div class="sidebar-toggler hidden-phone"></div>
               <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
            &nbsp;
            </li>
            <li class="start active ">
               <a href="index.html">
               <i class="icon-home"></i> 
               <span class="title">Dashboard</span>
               <span class="selected"></span>
               </a>
            </li>
           
            <li class="tooltips" data-placement="left" data-original-title="Frontend&nbsp;Honey Install">
               <a href="https://honestinstall.com/gallery.php?p=preview" target="_blank">
               <i class="icon-gift"></i> 
               <span class="title">Preview Front End</span>
               </a>
            </li>
           
         </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div class="page-content">
         <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->               
         <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                     <h4 class="modal-title">Modal title</h4>
                  </div>
                  <div class="modal-body">
                     Widget settings form goes here
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn blue">Save changes</button>
                     <button type="button" class="btn default" data-dismiss="modal">Close</button>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <!-- BEGIN STYLE CUSTOMIZER -->
         <div class="theme-panel hidden-xs hidden-sm">
            <div class="toggler"></div>
            <div class="toggler-close"></div>
            <div class="theme-options">
               <div class="theme-option">
                  <span>Layout</span>
                  <select class="layout-option form-control input-small">
                     <option value="fluid" selected="selected">Fluid</option>
                     <option value="boxed">Boxed</option>
                  </select>
               </div>
               <div class="theme-option">
                  <span>Header</span>
                  <select class="header-option form-control input-small">
                     <option value="fixed" selected="selected">Fixed</option>
                     <option value="default">Default</option>
                  </select>
               </div>
               <div class="theme-option">
                  <span>Sidebar</span>
                  <select class="sidebar-option form-control input-small">
                     <option value="fixed">Fixed</option>
                     <option value="default" selected="selected">Default</option>
                  </select>
               </div>
               <div class="theme-option">
                  <span>Footer</span>
                  <select class="footer-option form-control input-small">
                     <option value="fixed">Fixed</option>
                     <option value="default" selected="selected">Default</option>
                  </select>
               </div>
            </div>
         </div>
         <!-- END BEGIN STYLE CUSTOMIZER -->  
         <!-- BEGIN PAGE HEADER-->
         <div class="row">
            <div class="col-md-12">
               <!-- BEGIN PAGE TITLE & BREADCRUMB-->
               <h3 class="page-title">
                  Dashboard <small>Configuration more</small>
               </h3>
               <ul class="page-breadcrumb breadcrumb">
                  <li>
                     <i class="icon-home"></i>
                     <a href="index.html">Home</a> 
                     <i class="icon-angle-right"></i>
                  </li>
                  <li><a href="#">Dashboard</a></li>
                  
               </ul>
               <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
         </div>
         <!-- END PAGE HEADER-->
         <div class="clearfix"></div>
		          <!-- BEGIN PAGE HEADER-->
         <div class="col-md-12">
               <!-- BEGIN TAB PORTLET-->   
               <div class="portlet box blue tabbable">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-reorder"></i>&nbsp;</div>
                  </div>
                  <div class="portlet-body">
                     <div class=" portlet-tabs">
                        <ul class="nav nav-tabs">
                           <li class=""><a data-toggle="tab" href="#portlet_tab2">Preview</a></li>
                           <li class="active"><a data-toggle="tab" href="#portlet_tab1">Setting</a></li>
                        </ul>
                        <div class="tab-content">
                           <div id="portlet_tab1" class="tab-pane active">
                               <!-- tabs -->    
        <div style="float: left;"/>
        <form method="POST" action="add_column.php" style="margin-bottom: 5px;">
            <a href="drag.php" target="_blank"><img src="https://honestinstall.com/smooth/admindemo/images/drag.png" alt="edit data position"/></a>
            <div class="tab-title">
                &nbsp;&nbsp;
                <input type="radio" name="position" value="end"/>At end of scroller
                &nbsp;&nbsp;
                <input type="radio" name="position" value="beginning"/>At beginning of scroller
                &nbsp;&nbsp;
                <input type="radio" name="position" value="after"/>After Column:
                &nbsp;
                <select name="column_position">
                    <?php for ($counter = 1; $counter <= $totalColumn; $counter++) : ?>
                        <option value="<?= $counter; ?>"><?= $counter; ?></option>
                    <?php endfor; ?>
                </select>
                &nbsp;
                <input type="submit" name="submit" value="Go"/></div>
        </form>
    </div>
    <div style="float: left;margin-top: 43px; margin-left: 20px; color: black;">
        <form method="POST" action="set_interval.php">
            Scroll interval speed: <input type="text" name="interval" value="<?= readInterval(); ?>"/>
            <input type="submit" name="submit" value="Edit"/>
        </form>
    </div>
    <div style="float: right;">
        <form method="POST" action="remove_column.php" style="margin-top: 43px;">
            <div class="tab-title">
                &nbsp;&nbsp;
                Remove Column:
                &nbsp;
                <select name="column_position">
                    <?php for ($counter = 1; $counter <= $totalColumn; $counter++) : ?>
                        <option value="<?= $counter; ?>"><?= $counter; ?></option>
                    <?php endfor; ?>
                </select>
                &nbsp;
                <input type="submit" name="submit" value="Go"/>
            </div>
        </form>
    </div>
    <div style="clear: both;"></div>

    <div id="tabs">
        <ul>
            <?php for ($column = 1; $column <= $totalColumn; $column++) : ?>
                <li><a href="#tabs-<?= $column; ?>">Column <?= $column; ?></a></li>
            <?php endfor; ?>
        </ul>

        <?php for ($column = 1; $column <= $totalColumn; $column++): ?>
            <div id="tabs-<?= $column; ?>">
                <div id="tabs2-column<?= $column; ?>">
                    <ul>
                        <li><a href="#tabs2-column<?= $column; ?>-row1">Row 1</a></li>
                        <li><a href="#tabs2-column<?= $column; ?>-row2">Row 2</a></li>
                        <li><a href="#tabs2-column<?= $column; ?>-row3">Row 3</a></li>
                    </ul>

                    <div id="tabs2-column<?= $column; ?>-row1">
                        <form enctype="multipart/form-data" action="post.php" method="post">
                            <input type="hidden" name="max_column" value="<?= $totalColumn; ?>"/>
                            <div id="row1-column<?= $column; ?>">
                                <input type="hidden" name="form-row1-column<?= $column; ?>" value="1"/>
                                <input type="hidden" name="row" value="1"/>
                                <input type="hidden" name="column" value="<?= $column; ?>"/>
                                <input type="hidden" name="<?= 'radio_row1-column' . $column; ?>" value="image_text"/>
                                <div id="row1textimage-column<?= $column; ?>">
                                    <p>
                                        <textarea id="row1textareaimage-column<?= $column; ?>" name="row1textimage-column<?= $column; ?>"><?= $data[1][$column]['description']; ?></textarea>
                                    </p>
                                </div>
                            </div>      
                            <br/>
                            <input type="submit" name="submit" value="apply" class="submit-button" />
                        </form>
                    </div>

                    <div id="tabs2-column<?= $column; ?>-row2">
                        <form enctype="multipart/form-data" action="post.php" method="post">
                            <input type="hidden" name="max_column" value="<?= $totalColumn; ?>"/>
                            <div id="row2-column<?= $column; ?>">
                                <input type="hidden" name="form-row2-column<?= $column; ?>" value="1"/>
                                <input type="hidden" name="row" value="2"/>
                                <input type="hidden" name="<?= 'radio_row2-column' . $column; ?>" value="image_text"/>
                                <input type="hidden" name="column" value="<?= $column; ?>"/>

                                <div id="row2textimage-column<?= $column; ?>">
                                    <p>
                                        <textarea id="row2textareaimage-column<?= $column; ?>" name="row2textimage-column<?= $column; ?>"><?= $data[2][$column]['description']; ?></textarea>
                                    </p>
                                </div>

                            </div>      
                            <br/>
                            <input type="submit" name="submit" value="apply" class="submit-button" />
                        </form>
                    </div>
                    <div id="tabs2-column<?= $column; ?>-row3">
                        <form enctype="multipart/form-data" action="post.php" method="post">
                            <input type="hidden" name="max_column" value="<?= $totalColumn; ?>"/>
                            <div id="row3-column<?= $column; ?>">
                                <input type="hidden" name="form-row3-column<?= $column; ?>" value="1"/>
                                <input type="hidden" name="row" value="3"/>
                                <input type="hidden" name="column" value="<?= $column; ?>"/>
                                <input type="hidden" name="<?= 'radio_row3-column' . $column; ?>" value="image_text"/>

                                <div id="row3textimage-column<?= $column; ?>">
                                    <p>
                                        <textarea id="row3textareaimage-column<?= $column; ?>" name="row3textimage-column<?= $column; ?>"><?= $data[3][$column]['description']; ?></textarea>
                                    </p>
                                </div>                                                                                                  
                            </div>
                            <br/>
                            <input type="submit" name="submit" value="apply" class="submit-button" />
                        </form>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
        <table border="0">
            <tr>
                <td>
                    <form method="POST" action="post.php">
                        <input type="submit" name="submit" value="save" class="submit-button"/>
                        <a href="https://honestinstall.com/gallery.php?p=preview" target="_blank" style="text-decoration: none;"><input type="button" name="preview" value="preview"/></a>
                    </form>                    
                </td>
                <td>
                    <form id="random" method="POST" action="random.php">
                        &nbsp;&nbsp;&nbsp;<input type="submit" name="random" value="randomize data position" class="submit-button"/>
                    </form>                    
                </td>
            </tr>
        </table>
    </div>
                           </div>
                           <div id="portlet_tab2" class="tab-pane">
                              <?php if ($_SESSION['message'] != '') : ?>
            <h2><?= $_SESSION['message']; ?></h2>
        <?php endif; ?>

        <!-- preview -->
        <?php
        $queryPreview = mysql_query("SELECT * FROM scroll_preview");
        $columnPosition = 0;
        ?>
        <div style="width: 100%;  overflow-x: scroll; background: white;"> 
            <div id="logoParade" style="height: 500px; width:<?= $totalColumn * 400; ?>px; cursor:pointer;">
                <div class="scrollableArea" style="width: 1400px;">
                    <?php for ($columnPosition = 1; $columnPosition <= $totalColumn; $columnPosition++) : ?>
                        <p>     
                            <?php for ($rowPosition = 1; $rowPosition <= 3; $rowPosition++) : ?>
                                <label style="background: yellow; color: black;">Column:<?= $columnPosition; ?> &nbsp;&nbsp;&nbsp;Row: <?= $rowPosition; ?></label>
                                <label class="bubble">
                                    <span class="futuratxt">
                                        <?= $data[$rowPosition][$columnPosition]['description']; ?>
                                    </span>
                                </label>          
                                <br/>
                            <?php endfor; ?>
                        </p>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <br/><br/>
                           </div>
                          
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END TAB PORTLET-->
            </div>
         <!-- END PAGE HEADER-->
         <div class="clearfix"></div>
       
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div class="footer">
      <div class="footer-inner">
         2014 &copy; https://honestinstall.com
      </div>
      <div class="footer-tools">
         <span class="go-top">
         <i class="icon-angle-up"></i>
         </span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   <!-- BEGIN CORE PLUGINS -->   
   <!--[if lt IE 9]>
   <script src="assets/plugins/respond.min.js"></script>
   <script src="assets/plugins/excanvas.min.js"></script> 
   <![endif]-->   

   <script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>   
   <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
   <script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
   <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
   <script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
   <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
   <!-- END CORE PLUGINS -->
   <!-- BEGIN PAGE LEVEL PLUGINS -->
   	<script src="assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>   
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>  
   <script src="assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
   <script src="assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
   <script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
   <script src="assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
   <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>     
   <script src="assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
   <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
   <script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
   <script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>  
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="assets/scripts/app.js" type="text/javascript"></script>
   <script src="assets/scripts/index.js" type="text/javascript"></script>
   <script src="assets/scripts/tasks.js" type="text/javascript"></script>        
   <!-- END PAGE LEVEL SCRIPTS -->  
   <script>
      jQuery(document).ready(function() {    
         App.init(); // initlayout and core plugins
         Index.init();
         Index.initJQVMAP(); // init index page's custom scripts
         Index.initCalendar(); // init index page's custom scripts
         Index.initCharts(); // init index page's custom scripts
         Index.initChat();
         Index.initMiniCharts();
         Index.initDashboardDaterange();
         Index.initIntro();
         Tasks.initDashboardWidget();
      });
   </script>
   <!-- END JAVASCRIPTS -->
</body>
<?php session_destroy(); ?>
<!-- END BODY -->
</html>