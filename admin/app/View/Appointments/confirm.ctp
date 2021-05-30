<?php
$this->Html->css('form_style', null, array('inline' => false));

echo $this->Html->script('custom.js', array('inline' => true));
$this->Html->script('jquery.validate.min', array('inline' => false));
?>

<style>
    .error{
        color: red;
    }
</style>

<script type="text/javascript">
    $(function() {
<?php if (isset($this->data['Appointment']['date_appointment'])) : ?>
    <?php $selecteddate = explode('/', $this->data['Appointment']['date_appointment']); ?>
    <?php //var_dump($selecteddate); exit;                                                                     ?>
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

        $("#AppointmentAddNewForm").validate(
        {
            errorElement: "span", 
            errorPlacement: function(error,element) {
                error.insertBefore(element.parents(".input"));
            },
            rules:
                {
                'data[firstname]':
                    {
                    required: true
                },
                
                'data[lastname]':
                    {
                    required: true
                },
                'data[email]':
                    {
                    required: true,
                    email: true
                },
                'data[phone]':
                    {
                    required: true
                },
                'data[Appointment][date_appointment]':
                    {
                    required: true
                },               
                'time_in':
                    {
                    required: true
                }
            },

            messages: 
                {
                'data[firstname]':
                    {
                    required: "This field is required."
                },
                'data[lastname]':{
                    required: "This field is required."
                },
                'data[email]':{
                    required: "This field is required.",
                    email: "Please provide a correct email address."
                },
                'data[phone]':{
                    required: "This field is required."
                },
                'data[Appointment][date_appointment]':{
                    required: "This field is required."
                },
                'time_in':{
                    required: "This field is required."
                }
            }
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
<!---------->
<div class="form2-wrapper">

    <div class="formtitle" style="width: 980px;"><h2>Visitor Appointment Confirmation</h2></div>
    <form id="AppointmentAddNewForm" method="post" action="/admin/app/webroot/index.php/appointments/previewConfirm/<?= $id; ?>" style="float: none; width: 980px;">

        <div class="input">
            <div class="inputtext">First Name: </div>
            <div class="inputcontent">
                <?php echo $this->Form->input('firstname', array('div' => 'false', 'size' => '26', 'label' => false, 'value' => $data['Appointment_visitor']['firstname'])); ?>            
            </div>
        </div>

        <div class="input">
            <div class="inputtext">Last Name: </div>
            <div class="inputcontent">
                <?php echo $this->Form->input('lastname', array('div' => 'false', 'size' => '26', 'label' => false, 'value' => $data['Appointment_visitor']['lastname'])); ?>
            </div>
        </div>

        <div class="input">
            <div class="inputtext">Email: </div>
            <div class="inputcontent">
                <?php echo $this->Form->input('email', array('div' => 'false', 'size' => '26', 'label' => false, 'value' => $data['Appointment_visitor']['email'])); ?>
            </div>
        </div>

        <div class="input">
            <div class="inputtext">Phone: </div>
            <div class="inputcontent">
                <?php echo $this->Form->input('phone', array('div' => 'false', 'size' => '26', 'label' => false, 'value' => $data['Appointment_visitor']['phone'])); ?>
            </div>
        </div>

        <div class="input">
            <div class="inputtext">First Preference Date & Time: </div>
            <div class="inputcontent" style="height: 100px;">
                <input name="data[Appointment][date_appointment]" id="AppointmentDateAppointment" class="date-pick" readonly="readonly" />
                <p>&nbsp;</p>
                <input id="time_in" name="time_in" type="text" value="<?php echo $data['Appointment_visitor']['first_preference_time']; ?>" readonly="readonly" /><input type="hidden" name="data[Appointment][time_in]" id="AppointmentTimeIn" value="<?php echo (((isset($this->data['Appointment']['time_in'])) && ($this->data['Appointment']['time_in'] != '')) ? $this->data['Appointment']['time_in'] : ''); ?>"/>
            </div>
        </div>

        <div class="input">
            <div class="inputtext">Second Preference Date & Time: </div>
            <div class="inputcontent" style="height: 100px;">
                <input name="data[Appointment][date_appointment2]" id="AppointmentDateAppointment2" class="date-pick" readonly="readonly" />
                <p>&nbsp;</p>
                <input id="time_out" name="time_out" type="text" value="<?php echo $data['Appointment_visitor']['second_preference_time']; ?>" readonly="readonly" /><input type="hidden" name="data[Appointment][time_out]" id="AppointmentTimeOut" value="<?php echo (((isset($this->data['Appointment']['time_out'])) && ($this->data['Appointment']['time_out'] != '')) ? $this->data['Appointment']['time_out'] : ''); ?>"/>
            </div>
        </div>

        <div class="input">
            <div class="inputtext">Title: </div>
            <div>
                <input type="radio" value="Mr." id="AppointmentTitleMr" name="data[Appointment][title]" checked="checked">Mr.
                <input type="radio" value="Mrs." id="AppointmentTitleMrs" name="data[Appointment][title]">Mrs.(married woman)<br/>
                <br/>
                <input type="radio" value="Ms." id="AppointmentTitleMs" name="data[Appointment][title]">Ms (unmarried/single woman or not sure)                
            </div>
        </div>

        <div style="clear: both;"></div>

        <style>
            .ui-tabs-nav{
                width: 965px;
            }
        </style>


        <div id="tabs" style="margin-left: 10px;">
            <ul>
                <?php if ((isset($parent_node)) && (!empty($parent_node))) : ?>
                    <?php foreach ($parent_node as $node) : ?>
                        <li><a href="#tabs-<?php echo $node['Category']['id']; ?>"><?php echo $node['Category']['name']; ?></a></li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li><a href="#tabs-nocategories">No Categories</a></li>
                <?php endif; ?>
            </ul>

            <?php
            $counter = 0;
            if ((isset($parent_node)) && (!empty($parent_node))) :
                ?>
                <?php foreach ($parent_node as $node) : ?>
                    <?php $parent_id = $node['Category']['id']; ?>
                    <div id="tabs-<?php echo $parent_id; ?>">
                        <table border="1">
                            <?php foreach ($child_nodes[$parent_id]['ProductList'] as $child_array) : ?>
                                <?php $i = count($child_array); ?>
                                <?php foreach ($child_array as $product) : ?>
                                    <?php if ($counter % 3 == 0 or $counter == 0) : ?>
                                        <tr>
                                        <?php endif; ?>
                                        <td>
                                            <input type="checkbox" class="products" name="data[Appointment][products][<?php echo $product['Category']['id'] ?>-<?php echo $product['Product']['id']; ?>]" value="<?php echo $product['Product']['id']; ?>" id="Appointment<?php echo $product['Product']['id'] ?><?php echo $product['Category']['id']; ?>" <?php echo $product['Product']['auto_select'] == '1' ? "checked=\"checked\"" : ""; ?>/>
                                            <?php echo $product['Product']['name']; ?> <br/>
                                            <?php echo $this->Html->image("products/" . $product['Image']['name'], array("width" => '135', "alt" => $product['Product']['name'])); ?>
                                        </td>

                                        <?php $counter++; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                        </table>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div id="tabs-nocategories">
                    <p>Currently there are no categories</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="buttons" style="width: 320px; background: none repeat scroll 0 0 #FFFFFF">
            <?php echo $this->Form->button('Back', array('style' => 'float: left;', 'class' => 'orangebutton', 'type' => 'button', 'onclick' => 'javascript: history.go(-1)')); ?>
            <input class="orangebutton" type="submit" value="Email Preview" style="float: left;" />
        </div>

    </form>
</div>
<?php
/*
  <h2>Visitor Appointment Confirmation</h2>
  <form method="post" action="/admin/app/webroot/index.php/appointments/previewConfirm/<?= $id; ?>">
  <?php echo $this->Form->hidden('add_appointment', array('value' => '1')); ?>
  <table cellpadding="3" cellspacing="5" border="0" style="width: 700px;">
  <tr>
  <td>First name:</td>
  <td>
  <?php echo $this->Form->input('firstname', array('size' => '26', 'label' => false, 'value' => $data['Appointment_visitor']['firstname'])); ?>
  </td>
  </tr>
  <tr>
  <td>Last name:</td>
  <td>
  <?php echo $this->Form->input('lastname', array('size' => '26', 'label' => false, 'value' => $data['Appointment_visitor']['lastname'])); ?>
  </td>
  </tr>
  <tr>
  <td>Email:</td>
  <td>
  <?php echo $this->Form->input('email', array('size' => '26', 'label' => false, 'value' => $data['Appointment_visitor']['email'])); ?>
  </td>
  </tr>
  <tr>
  <td>Phone:</td>
  <td>
  <?php echo $this->Form->input('phone', array('size' => '26', 'label' => false, 'value' => $data['Appointment_visitor']['phone'])); ?>
  </td>
  </tr>

  <tr>
  <td>First Preference Date & Time</td>
  <td colspan="4">
  <input name="data[Appointment][date_appointment]" id="AppointmentDateAppointment" class="date-pick" readonly="readonly" />
  <?php echo $this->Form->error('date_appointment'); ?>
  <br/><br/>
  <input id="time_in" name="time_in" type="text" value="<?php echo $data['Appointment_visitor']['first_preference_time']; ?>" readonly="readonly" /><input type="hidden" name="data[Appointment][time_in]" id="AppointmentTimeIn" value="<?php echo (((isset($this->data['Appointment']['time_in'])) && ($this->data['Appointment']['time_in'] != '')) ? $this->data['Appointment']['time_in'] : ''); ?>"/>
  <?php echo $this->Form->error('time_in'); ?>
  </td>
  </tr>
  <tr>
  <td>Second Preference Date & Time</td>
  <td colspan="4">
  <input name="data[Appointment][date_appointment2]" id="AppointmentDateAppointment2" class="date-pick" readonly="readonly" />
  <?php echo $this->Form->error('date_appointment'); ?>
  <br/><br/>
  <input id="time_out" name="time_out" type="text" value="<?php echo $data['Appointment_visitor']['second_preference_time']; ?>" readonly="readonly" /><input type="hidden" name="data[Appointment][time_out]" id="AppointmentTimeOut" value="<?php echo (((isset($this->data['Appointment']['time_out'])) && ($this->data['Appointment']['time_out'] != '')) ? $this->data['Appointment']['time_out'] : ''); ?>"/>
  <?php echo $this->Form->error('time_out'); ?>
  </td>
  </tr>

  <tr>
  <td>Title:</td>
  <td colspan="4">
  <?php echo $this->Form->radio('title', array('Mr.' => 'Mr. (male)', 'Mrs.' => 'Mrs.(married woman)', 'Ms.' => 'Ms (unmarried/single woman or not sure)'), array('separator' => '&nbsp;&nbsp;&nbsp;&nbsp;', 'legend' => false)); ?>
  </td>
  </tr>

  <tr>
  <td colspan="5">
  <div id="tabs">
  <ul>
  <?php if ((isset($parent_node)) && (!empty($parent_node))) : ?>
  <?php foreach ($parent_node as $node) : ?>
  <li><a href="#tabs-<?php echo $node['Category']['id']; ?>"><?php echo $node['Category']['name']; ?></a></li>
  <?php endforeach; ?>
  <?php else : ?>
  <li><a href="#tabs-nocategories">No Categories</a></li>
  <?php endif; ?>
  </ul>

  <?php
  $counter = 0;
  if ((isset($parent_node)) && (!empty($parent_node))) :
  ?>
  <?php foreach ($parent_node as $node) : ?>
  <?php $parent_id = $node['Category']['id']; ?>
  <div id="tabs-<?php echo $parent_id; ?>">
  <table border="1">
  <?php foreach ($child_nodes[$parent_id]['ProductList'] as $child_array) : ?>
  <?php $i = count($child_array); ?>
  <?php foreach ($child_array as $product) : ?>
  <?php if ($counter % 3 == 0 or $counter == 0) : ?>
  <tr>
  <?php endif; ?>
  <td>
  <input type="checkbox" class="products" name="data[Appointment][products][<?php echo $product['Category']['id'] ?>-<?php echo $product['Product']['id']; ?>]" value="<?php echo $product['Product']['id']; ?>" id="Appointment<?php echo $product['Product']['id'] ?><?php echo $product['Category']['id']; ?>" <?php echo $product['Product']['auto_select'] == '1' ? "checked=\"checked\"" : ""; ?>/>
  <?php echo $product['Product']['name']; ?> <br/>
  <?php echo $this->Html->image("products/" . $product['Image']['name'], array("width" => '135', "alt" => $product['Product']['name'])); ?>
  </td>

  <?php $counter++; ?>
  <?php endforeach; ?>
  <?php endforeach; ?>
  </table>
  </ul>
  </div>
  <?php endforeach; ?>
  <?php else : ?>
  <div id="tabs-nocategories">
  <p>Currently there are no categories</p>
  </div>
  <?php endif; ?>
  </div>
  </td>
  </tr>

  <tr>
  <td><?php echo $this->Form->button('Back', array('type' => 'button', 'onclick' => 'javascript: history.go(-1)')); ?></td>
  <td><?php echo $this->Form->submit('Email Preview'); ?></td>
  <?php //echo $this->Form->end(); ?>
  </form>
  <td>
  <!--
  <form method="post" action="/admin/app/webroot/index.php/appointments/preview/12">
  <?= $this->Form->hidden('preview_subject'); ?>
  <?= $this->Form->hidden('preview_bcc'); ?>
  <?= $this->Form->hidden('preview_other_bcc'); ?>
  <?= $this->Form->hidden('preview_title'); ?>
  <?= $this->Form->hidden('preview_service'); ?>
  <?= $this->Form->hidden('preview_date'); ?>
  <?= $this->Form->hidden('preview_time_in'); ?>
  <?= $this->Form->hidden('preview_time_out'); ?>
  <?= $this->Form->hidden('preview_comment'); ?>
  <?= $this->Form->hidden('user_id', array('value' => $user_id)); ?>
  <?= $this->Form->hidden('preview_products'); ?>
  <input type="submit" value="Email Preview"/>
  </form>
  -->
  </td>
  </tr>
  </table>
 * 
 */
?>