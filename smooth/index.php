<!DOCTYPE html>
<html>
    <head>
        <title>Scroll</title>
        <link rel="stylesheet" type="text/css" href="js/fancy/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
        <link rel="stylesheet" type="text/css" href="js/fancy/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
        <link rel="stylesheet" type="text/css" href="js/fancy/jquery.fancybox.css?v=2.1.4" media="screen" />

        <!-- the CSS for Smooth Div Scroll -->
        <link rel="Stylesheet" type="text/css" href="css/smoothDivScroll.css" />

        <!-- Styles for my specific scrolling content -->
        <style type="text/css">
            body{
                margin: 0;
            }

            #scrollingText div.scrollableArea p
            {
                display: block;
                float: left;
                margin: 0;
                padding: 0px 0px 20px 20px;
                font-family: Times, 'Times New Roman', Georgia, Serif; 
                font-size:18px; 
                background-color: #fff; 
                color: #000; 
                white-space: nowrap;
            }

        </style>

    </head>

    <body>
        <div id="scrollingText" >
            <div class="scrollingHotSpotLeft" style="display: none;"></div>
            <div class="scrollingHotSpotRight" style="display: none;"></div>
            <div class="scrollWrapper" style="background-color: #FFF;">
                <div class="scrollableArea" style="width: 4039px;">
                    <!-- repeat 2 times for 100% width scroll -->
                    <?php for ($counter = 0; $counter < 3; $counter++) : ?>
                        <p>
                            
                            <a class="fancybox" href="/images/crawler/slide1.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/slide1.jpg" width="200" alt="" /></a>
                        </p>
                        <p>
                            data 2 <br/><br/>
                            Product  <br/><br/>
                            <a class="fancybox" href="images/Desert_b.jpg" data-fancybox-group="gallery" title="Wonderful Desert"><img src="images/Desert.jpg" width="100" height="75" alt=""/></a><br/><br/>
                            Product  <br/><br/>
                            <a class="fancybox" href="images/Koala_b.jpg" data-fancybox-group="gallery" title="Cute Koala <br/> Redirect to: <a href='http://yahoo.com'>Yahoo</a>"><img src="images/Koala.jpg" width="100" height="75" alt=""/></a><br/><br/>
                        </p>
                        <p>
                            data 3 <br/> <br/>
                            Product 
                            <br/> <br/>
                            <a class="fancybox" href="images/Penguins_b.jpg" data-fancybox-group="gallery" title="Lovely Penguins"><img src="images/Penguins.jpg" width="100" alt=""/></a><br>

                            <a class="fancybox" href="images/Penguins_b.jpg" data-fancybox-group="gallery" title="Lovely Penguins"><img src="images/Penguins.jpg" width="100" alt=""/></a>
                        </p>
                        <p>
                            data 4 <br/> <br/>
                            Product <br/><br/>
                            <a class="fancybox" href="images/Penguins_b.jpg" data-fancybox-group="gallery" title="Lovely Penguins"><img src="images/Penguins.jpg" width="100" alt=""/></a><br/><br/>
                            "Lorem ipsum dolor sit amet,<br/>
                            consectetur adipisicing elit, <br/>
                            sed do eiusmod tempor incididunt 
                        </p>
                        <p>
                            data 5 <br/> <br/>
                            Product <br/><br/>
                            Redirect to: <a href="http://www.stackoverflow.com">Stackoverflow</a><br/><br/>
                            "Lorem ipsum dolor sit amet, <br/>
                            consectetur adipisicing elit, <br/>
                            sed do eiusmod tempor incididunt <br/><br/>
                            <a class="fancybox" href="images/stickman.jpg" data-fancybox-group="gallery" title="Lorem ipsum <br/><a href='http://stackoverflow.com'>dolor sit amet</a>"><img src="images/stickman.jpg" width="75" height="75" alt="" /></a><br/><br/>
                        </p>
                        <p>
                            Data 6 <br/><br/>
                            <a class="fancybox" href="images/1_b.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="images/1_s.jpg" alt="" /></a><br>
                            <a class="fancybox" href="images/Desert_b.jpg" data-fancybox-group="gallery" title="Wonderful Desert"><img src="images/Desert.jpg" width="100" height="75" alt=""/></a>
                            <a class="fancybox" href="images/Desert_b.jpg" data-fancybox-group="gallery" title="Wonderful Desert"><img src="images/Desert.jpg" width="100" height="75" alt=""/></a>

                        </p>
                        <p>
                            data 7 <br/> <br/>
                            Product 
                            <br/> <br/>
                            <a class="fancybox" href="images/Koala_b.jpg" data-fancybox-group="gallery" title="Cute Koala <br/> Redirect to: <a href='http://yahoo.com'>Yahoo</a>"><img src="images/Koala.jpg" width="100" height="75" alt=""/></a><br/><br/>
                            Product 
                            <br/><br/>
                            <a class="fancybox" href="images/Desert_b.jpg" data-fancybox-group="gallery" title="Wonderful Desert"><img src="images/Desert.jpg" width="100" height="75" alt=""/></a><br/><br/>
                        </p>
                        <p>Data 8</p>
                    <?php endfor; ?>

                    <script src="js/jquery.min.js" type="text/javascript"></script>
                    <script src="js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
                    <script src="js/jquery.mousewheel.min.js" type="text/javascript"></script>
                    <script src="js/jquery.kinetic.js" type="text/javascript"></script>
                    <script src="js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>

                    <script type="text/javascript" src="js/fancy/jquery.fancybox.js?v=2.1.4"></script>
                    <script type="text/javascript" src="js/fancy/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
                    <script type="text/javascript" src="js/fancy/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
                    <script type="text/javascript" src="js/fancy/helpers/jquery.fancybox-media.js?v=1.0.5"></script>


                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#scrollingText").smoothDivScroll({
                                autoScrollingMode: "always", 
                                autoScrollingDirection: "endlessLoopRight", 
                                autoScrollingStep: 1, 
                                autoScrollingInterval: 50   
                            });
                            
                            $("#scrollingText").bind("mouseover", function() {
                                $(this).smoothDivScroll("stopAutoScrolling");
                            }).bind("mouseout", function() {
                                $(this).smoothDivScroll("startAutoScrolling");
                            });
                            
                            $('.fancybox').fancybox({
                                arrows    : false,
                                nextClick : false
                            });

                        });
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>