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

<!--<script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery_1.5.2.min.js"></script>-->

        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery_1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery-ui_1.8.17.min.js"></script>

        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/date.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.datePicker.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/datePicker.css" />


        <script type="text/javascript">
                $(function() {
<?php if (isset($this->data['Appointment']['date_appointment'])) : ?>
    <?php $selecteddate = explode('/', $this->data['Appointment']['date_appointment']); ?>
    <?php //var_dump($selecteddate); exit;                               ?>
                    $('.date-pick').datePicker().val(new Date(<?php echo $selecteddate[2]; ?>, <?php echo $selecteddate[0]; ?>-1, <?php echo $selecteddate[1]; ?>).asString()).trigger('change');
<?php else : ?>
                $('.date-pick').datePicker().val(new Date().asString()).trigger('change');
<?php endif; ?>
        });
        </script>



        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/jquery-ui-1.8.16.custom.css" />
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery-ui-sliderAccess.js"></script>
        <script type="text/javascript">
                $(function(){                    
                    var time_in = $('#time_in');
                    var AppointmentTimeIn = $('#AppointmentTimeIn');
                    time_in.timepicker({
                        ampm: true,
                        timeFormat: 'hh:mm tt',
                        stepMinute: 15
                    });
                    /*
                    time_in.change(function() {
                        var time_in_now = new Date(time_in.datetimepicker('getDate'));
                        //AppointmentTimeIn.val(time_in_now.getHours()+':'+(time_in_now.getMinutes() == '0' ? '00' : time_in_now.getMinutes()));
                        //AppointmentTimeIn.val((time_in_now.getHours() < 9 ? '0'+time_in_now.getHours() : time_in_now.getHours())+':'+(time_in_now.getMinutes() == '0' ? '00' : time_in_now.getMinutes()));
                    });
                     */
			
			
                    var time_out = $('#time_out');
                    var AppointmentTimeOut = $('#AppointmentTimeOut');
                    time_out.timepicker({
                        ampm: true,
                        timeFormat: 'hh:mm tt',
                        stepMinute: 15
                    });
                    time_out.change(function() {
                        var time_out_now = new Date(time_out.datetimepicker('getDate'));
                        //AppointmentTimeOut.val((time_out_now.getHours() < 9 ? '0'+time_out_now.getHours() : time_out_now.getHours())+':'+(time_out_now.getMinutes() == '0' ? '00' : time_out_now.getMinutes()));
                    });
			
                    /*
                        $('#example13_setdt').click(function(){
                                ex13.datetimepicker('setDate', (new Date()) );
                        });
                        $('#example13_getdt').click(function(){
                                alert(ex13.datetimepicker('getDate'));
                        });
                     */
                    
                    $('#time_in').change(function() {
                        var time = $('#time_in').val();
                        var result = time.split(":"); 
                        var hour = parseInt(result[0]) + 1;
                        var temp = result[1].split(" ");
                        var min = temp[0];
                        var type = temp[1];
                        if (parseInt(result[0]) < 8) {
                            hour = "0" + hour.toString();
                        }
                        else if (parseInt(result[0]) == 8){
                            hour = "09";
                        }                        
                        else if (parseInt(result[0]) == 9){
                            hour = "10";
                        }
                        else if (parseInt(result[0]) == 11) {
                            hour = "12";
                        }
                        else if (parseInt(result[0]) == 12) {
                            hour = "01";
                        }                                       
                        $('#time_out').val(hour+":"+min+" "+type);                        
                    });
                    
                    
                });
		
        </script>


        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/ui-lightness/jquery.ui.all.css" />
        <style type="text/css">
            .ui-tabs-nav { height: 33px !important; float: left; position: relative; width: 680px; }
        </style>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.ui.tabs.js"></script>
        <script type="text/javascript">
                $(function() {
                    $( "#tabs" ).tabs();
                });
        </script>


        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/jquery.jcarousel.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/skin_carousel.css" />
        <script type="text/javascript">
                $(document).ready(function() {
<?php foreach ($parent_node as $node) : ?>
    <?php $parent_id = $node['Category']['id']; ?>
                    $('#mycarousel-<?php echo $parent_id; ?>').jcarousel();
<?php endforeach; ?>
        });
        </script>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/layout.css" />
        <!-- script from view -->
        <?= $scripts_for_layout; ?>

    </head>

    <body>

        <?php echo $this->element('/header'); ?>

        <div id="wrapper" class="clearfix">
            <div id="maincol" style="padding: 0 45px 0 45px;" class="mainBG">
                <?php echo $this->Session->flash(); ?>

                <?php echo $content_for_layout; ?>
            </div>
        </div>

        <?php //echo $this->element('/footer'); ?>

    </body>
</html>