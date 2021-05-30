<?php session_start(); ?>
<!DOCTYPE html>
<html>
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

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script src="<?= $baseUrl; ?>js/ckeditor.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
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

    </head>
    <body>
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
</body>
</html>
<?php session_destroy(); ?>