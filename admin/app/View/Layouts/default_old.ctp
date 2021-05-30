<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>HonestInstall.com - Administration</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/style.css" type="text/css" />

        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/honestinstall.css" />
        <script type="text/javascript">
            <!--
            function MM_preloadImages() { //v3.0
                var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                        if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
                }
	
                function MM_swapImgRestore() { //v3.0
                    var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
                }
	
                function MM_findObj(n, d) { //v4.01
                    var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                        d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);
                    }
                    if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
                    for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
                    if(!x && d.getElementById) x=d.getElementById(n); return x;
                }
	
                function MM_swapImage() { //v3.0
                    var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
                    if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
                }
                //-->
        </script>

        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/dropdown/dropdown.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/dropdown/themes/drop/default.advanced.css" />


        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/jquery.treeview.css" type="text/css" />
        <!-- --->        
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery_1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery-ui_1.8.17.min.js"></script>

        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/date.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.datePicker.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.validate.min.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/datePicker.css" />
        <!------>        
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.treeview.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/ui-lightness/jquery.ui.all.css" />
        <style type="text/css">
            .ui-tabs-nav { height: 33px !important; float: left; position: relative; width: 680px; }
        </style>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.ui.tabs.js"></script>
        <script type="text/javascript">
		
                $(document).ready(function() {
                    $( "#tabs" ).tabs();
                    // second example
                    $("#browser").treeview({
                        animated: "normal",
                        collapsed: false
                    });
			
                });
		
        </script>
        <!-- script from view -->
        <?= $scripts_for_layout; ?>
    </head>

    <body> 
        <div id="dhtmltooltip"></div>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/tooltip.js"></script>

        <?php echo $this->element('/header'); ?>

        <div id="wrapper" class="clearfix">
            <div id="maincol" class="mainBG">
                <?php echo $this->Session->flash(); ?>

                <?php echo $content_for_layout; ?>
            </div>
        </div>

        <?php echo $this->element('/footer'); ?>

    </body>
</html>