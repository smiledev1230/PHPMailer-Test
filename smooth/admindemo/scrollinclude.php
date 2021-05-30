<html>
    <head>
        <script src="/smooth/js/jquery.min.js" type="text/javascript"></script>
        <script src="/smooth/js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
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

        <link rel="stylesheet" href="/assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
        <!-- Styles for my specific scrolling content -->

        <link rel="stylesheet" href="css/jquery.simplyscroll.css" />
        <script src="/js/jquery.simplyscroll.min.js"></script>


    </head>

    <body>
        <?php
        include "db.php";
        $page = $_GET['p'];
        if ($page == 'preview')
            $table = 'scroll_preview';
        else
            $table = 'scroll';

        $query = mysql_query("SELECT `column` FROM $table ORDER BY `column` DESC LIMIT 1") or die(mysql_error());
        $result = mysql_fetch_assoc($query);
        $totalColumn = $result['column'];
        $query = mysql_query("SELECT * FROM $table");
        while ($result = mysql_fetch_assoc($query)) {
            $data[$result['row']][$result['column']]['field'] = $result['field'];
            $data[$result['row']][$result['column']]['description'] = $result['description'];
            $data[$result['row']][$result['column']]['text_title'] = $result['text_title'];
        }
        ?>
        <div>
            <ul id="scroller">
                <?php for ($columnPosition = 1; $columnPosition <= $totalColumn; $columnPosition++) : ?>
                    <li class="list-index">
                        <?php for ($rowPosition = 1; $rowPosition <= 3; $rowPosition++) : ?>
                            <?php
                            if ($data[$rowPosition][$columnPosition]['description'] != '' || ctype_space($data[$rowPosition][$columnPosition]['description'])):
                                ?>
                                <div style="margin-left: 50px;">
                                    <!--<label style="background: yellow; color: black;">Column:<?= $columnPosition; ?> &nbsp;&nbsp;&nbsp;Row: <?= $rowPosition; ?></label>-->
                                    <label class="bubble">
                                        <span class="futuratxt">
                                            <?= $data[$rowPosition][$columnPosition]['description']; ?>
                                        </span>
                                    </label>
                                </div>
                                <br/><br/>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>



        <script type="text/javascript">
            $(document).ready(function() {
                $('a.doksoft_preview_href').addClass('fancybox');
                $('a.doksoft_preview_href').attr('data-fancybox-group', 'gallery');

                scroll = $("#scroller").simplyScroll({
                    auto: true,
                    manualMode: 'loop',
                    speed: <?= readInterval(); ?>
                });


                var status = false;
                var fancyClick = false;

                $('.fancybox').fancybox({
                    arrows: false,
                    nextClick: false
                });

                $('.fancybox').bind('hover', function() {
                    if (status == true)
                        status = false;
                    fancyClick = true;
                });

            });
        </script>
    </body>
</html>