<?php
$this->Html->css('dashboard', null, array('inline' => false));
$this->Html->css('form_style', null, array('inline' => false));

$this->Html->script('custom.js', array('inline' => false));
?>

<script type="text/javascript">
    $(function() {
<?php if (isset($this->data['Appointment']['date_appointment'])) : ?>
    <?php $selecteddate = explode('/', $this->data['Appointment']['date_appointment']); ?>
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
			
        var time_out = $('#time_out');
        var AppointmentTimeOut = $('#AppointmentTimeOut');
        time_out.timepicker({
            ampm: true,
            timeFormat: 'hh:mm tt',
            stepMinute: 15
        });
        time_out.change(function() {
            var time_out_now = new Date(time_out.datetimepicker('getDate'));
        });
			
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
<!---------->

<div class="form2-wrapper">
    <div class="formtitle" style="width: 980px;"><h2>View Appointment Detail</h2></div>
    <div style="float: left;">
        <?php echo $this->Form->hidden('add_appointment', array('value' => '1')); ?>
        <div class="input">
            <?php if ((isset($subject_error)) && ($subject_error != '')) { ?><span class="input_error"><?php echo $subject_error; ?></span><br /><?php } ?>
            <div class="inputtext">Subject: </div>
            <div class="inputcontent">
                <?php echo $this->Form->input('subject', array('div' => 'false', 'size' => '26', 'label' => false, 'value' => $data["Appointment"]['subject'])); ?>
            </div>
        </div>

        <div class="input">
            <?php if ((isset($bcc_email_error)) && ($bcc_email_error != '')) { ?><span class="input_error"><?php echo $bcc_email_error; ?></span><br /><?php } ?>
            <div class="inputtext">Bcc: </div>
            <div class="inputcontent">
                <?php echo $this->Form->input('bcc_email', array('div' => false, 'size' => '26', 'label' => false)); ?>
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

        <div class="input">
            <div class="inputtext">Type of Service: </div>
            <div>
                <?php echo $this->Form->radio('service', array('Install' => 'Install', 'Service Call' => 'Service Call', 'Follow Up' => 'Follow Up'), array('separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'legend' => false)); ?>
            </div>
        </div>

        <div class="input">
            <?php echo $this->Form->error('date_appointment'); ?>
            <div class="inputtext">Date: </div>
            <div class="inputcontent">
                <input name="data[Appointment][date_appointment]" id="AppointmentDateAppointment" class="date-pick" readonly="readonly" />
            </div>
        </div>

        <div class="input">
            <?php echo $this->Form->error('time_in'); ?>
            <div class="inputtext">Time In: </div>
            <div class="inputcontent">
                <input id="time_in" name="time_in" type="text" value="<?php echo $data['Appointment']['time_in']; ?>" readonly="readonly" /><input type="hidden" name="data[Appointment][time_in]" id="AppointmentTimeIn" value="<?php echo (((isset($this->data['Appointment']['time_in'])) && ($this->data['Appointment']['time_in'] != '')) ? $this->data['Appointment']['time_in'] : ''); ?>"/>            
            </div>
        </div>

        <div class="input">
            <?php echo $this->Form->error('time_out'); ?>
            <div class="inputtext">Time Out: </div>
            <div class="inputcontent">
                <input id="time_out" name="time_out" type="text" value="<?php echo $data['Appointment']['time_out']; ?>" readonly="readonly" /><input type="hidden" name="data[Appointment][time_out]" id="AppointmentTimeOut" value="<?php echo (((isset($this->data['Appointment']['time_out'])) && ($this->data['Appointment']['time_out'] != '')) ? $this->data['Appointment']['time_out'] : ''); ?>"/>
            </div>
        </div>

        <div class="inputtextbox nobottomborder">
            <?php if ((isset($comment_error)) && ($comment_error != '')) { ?><span class="input_error"><?php echo $comment_error; ?></span><br /><?php } ?>
            <div class="inputtext">Comments: </div>
            <div class="inputcontent">
                <?= $this->Form->textarea('comment', array('rows' => '5', 'cols' => '25')); ?>
            </div>
        </div>


    </div>

    <div style="float: right; margin-right: 80px;">
        <div class="input">
            <div class="inputtext">Opt Out from promotion emails: </div>
            <div class="inputcontent">
                <?php
                if ($user["User"]["subscription"] == 'Y') :
                    echo $this->Form->checkbox('subscription', array('value' => 'N', 'label' => false, 'hiddenField' => false, 'checked' => true));
                elseif ($user["User"]["subscription"] == 'N'):
                    echo $this->Form->checkbox('subscription', array('value' => 'N', 'label' => false, 'hiddenField' => false, 'checked' => false));
                endif;
                ?>

            </div>
        </div>

        <div class="input">
            <?php if ((isset($bccs_email_error)) && ($bccs_email_error != '')) { ?><span class="input_error"><?php echo $bccs_email_error; ?></span><br /><?php } ?>
            <div class="inputtext">Other Bccs: </div>
            <div class="inputcontent">
                <?php echo $this->Form->input('other_bccs', array('div' => false, 'size' => '26', 'label' => false)); ?>
                <?php //echo $this->Form->input('other_bccs', array('cols' => '26', 'rows' => '1', 'label' => false)); ?>
            </div>
        </div>
    </div>

    <div style="clear: both;"></div>

    <style>
        .ui-tabs-nav{
            width: 987px;
        }
    </style>

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

    <div class="buttons" style="width: 320px; background: none repeat scroll 0 0 #FFFFFF">
        <?php echo $this->Form->end(); ?>
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
            <?= $this->Form->hidden('preview_products'); ?>
        </form>
    </div>
    <div style="clear: both;"></div>
</div>
<br/><br/>

<?php
/*
  <h2>View Appointment Detail</h2>
  <?php echo $this->Form->create('Appointment', array('url' => 'add_new')); ?>
  <?php echo $this->Form->hidden('add_appointment', array('value' => '1')); ?>
  <table cellpadding="3" cellspacing="5" border="0" style="width: 700px;">
  <tr>
  <td>Subject:</td>
  <td>
  <?php echo $this->Form->input('subject', array('size' => '26', 'label' => false, 'value' => $data["Appointment"]['subject'])); ?>
  </td>
  <td></td>
  <td></td>
  <td>
  <?php
  if ($user["User"]["subscription"] == 'Y') :
  echo $this->Form->checkbox('subscription', array('value' => 'N', 'label' => false, 'hiddenField' => false, 'checked' => true));
  elseif ($user["User"]["subscription"] == 'N'):
  echo $this->Form->checkbox('subscription', array('value' => 'N', 'label' => false, 'hiddenField' => false, 'checked' => false));
  endif;
  ?>
  <label for="AppointmentOptPromotion">Opt Out from promotion emails</label></td>
  </tr>
  <tr>
  <td>Bcc:</td>
  <td>
  <?php if ((isset($bcc_email_error)) && ($bcc_email_error != '')) { ?><span class="input_error"><?php echo $bcc_email_error; ?></span><br /><?php } ?>
  <?php echo $this->Form->input('bcc_email', array('size' => '26', 'label' => false)); ?>
  </td>
  <td></td>
  <td>Other Bccs:</td>
  <td>
  <?php if ((isset($bccs_email_error)) && ($bccs_email_error != '')) { ?><span class="input_error"><?php echo $bccs_email_error; ?></span><br /><?php } ?>
  <?php echo $this->Form->input('other_bccs', array('cols' => '26', 'rows' => '1', 'label' => false)); ?>
  <sup><i>(separate multiple emails by comma)</i></sup>
  </td>
  </tr>

  <tr>
  <td>Title:</td>
  <td colspan="4">
  <?php echo $this->Form->radio('title', array('Mr.' => 'Mr. (male)', 'Mrs.' => 'Mrs.(married woman)', 'Ms.' => 'Ms (unmarried/single woman or not sure)'), array('separator' => '&nbsp;&nbsp;&nbsp;&nbsp;', 'legend' => false)); ?>
  </td>
  </tr>

  <tr>
  <td>Type of Service:</td>
  <td colspan="4">
  <?php echo $this->Form->radio('service', array('Install' => 'Install', 'Service Call' => 'Service Call', 'Follow Up' => 'Follow Up'), array('separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'legend' => false)); ?>
  <?php echo $this->Form->error('service'); ?>
  </td>
  </tr>


  <tr>
  <td>Date</td>
  <td colspan="4">
  <input name="data[Appointment][date_appointment]" value="<?= $data['Appointment']['date_appointment']; ?>" id="AppointmentDateAppointment" class="date-pick" readonly="readonly" />
  <?php //echo $this->Form->input('date_appointment', array('class' => 'date-pick', 'label' => false));  ?>
  <?php echo $this->Form->error('date_appointment'); ?>
  </td>
  </tr>

  <tr>
  <td>Time In:</td>
  <td colspan="4">
  <input id="time_in" name="time_in" type="text" value="<?php echo $data['Appointment']['time_in']; ?>" readonly="readonly" /><input type="hidden" name="data[Appointment][time_in]" id="AppointmentTimeIn" value="<?php echo (((isset($this->data['Appointment']['time_in'])) && ($this->data['Appointment']['time_in'] != '')) ? $this->data['Appointment']['time_in'] : ''); ?>"/>
  <?php echo $this->Form->error('time_in'); ?>
  </td>
  </tr>

  <tr>
  <td>Time Out:</td>
  <td colspan="4">
  <input id="time_out" name="time_out" type="text" value="<?php echo $data['Appointment']['time_out']; ?>" readonly="readonly" /><input type="hidden" name="data[Appointment][time_out]" id="AppointmentTimeOut" value="<?php echo (((isset($this->data['Appointment']['time_out'])) && ($this->data['Appointment']['time_out'] != '')) ? $this->data['Appointment']['time_out'] : ''); ?>"/>
  <?php echo $this->Form->error('time_out'); ?>
  </td>
  </tr>
  <tr>
  <td>Comments:</td>
  <td colspan="4">
  <?php if ((isset($comment_error)) && ($comment_error != '')) { ?><span class="input_error"><?php echo $comment_error; ?></span><br /><?php } ?>
  <?php echo $this->Form->input('comment', array('size' => '26', 'label' => false)); ?>
  </td>
  </tr>
  <tr>
  <td colspan="5">
  <?php
  //last work here, convert into 4 x 4 table later
  //var_dump($child_nodes);
  ?>
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
  <table border="1">
  <?php
  $counter = 0;
  if ((isset($parent_node)) && (!empty($parent_node))) :
  foreach ($parent_node as $node) :
  $parent_id = $node['Category']['id'];
  foreach ($child_nodes[$parent_id]['ProductList'] as $child_array) :
  $i = count($child_array);
  foreach ($child_array as $product) :
  ?>
  <?php if ($counter % 3 == 0 or $counter == 0) : ?>
  <tr>
  <?php endif; ?>
  <td>
  <input type="checkbox" name="data[Appointment][products][<?php echo $product['Category']['id'] ?>-<?php echo $product['Product']['id']; ?>]" value="<?php echo $product['Product']['id']; ?>" id="Appointment<?php echo $product['Product']['id'] ?><?php echo $product['Category']['id']; ?>" checked="<?php echo $product['Product']['auto_select'] == '1' ? "checked" : ""; ?>"/>
  <?php echo $product['Product']['name']; ?> <br/>
  <?php echo $this->Html->image("products/" . $product['Image']['name'], array("width" => '135', "alt" => $product['Product']['name'])); ?>
  </td>

  <?php
  $counter++;
  endforeach;
  endforeach;
  endforeach;
  endif;
  ?>
  </table>
  <!--
  <?php if ((isset($parent_node)) && (!empty($parent_node))) : ?>
  <?php foreach ($parent_node as $node) : ?>
  <?php $parent_id = $node['Category']['id']; ?>
  <div id="tabs-<?php echo $parent_id; ?>">
  <ul id="mycarousel-<?php echo $parent_id; ?>" class="jcarousel-skin-tango" style="">
  <?php foreach ($child_nodes[$parent_id]['ProductList'] as $child_array) : ?>
  <?php $i = count($child_array); ?>
  <?php foreach ($child_array as $product) : ?>
  <?php //var_dump($product);  ?>
  <li class="li_prod">
  <table cellpadding="3" cellspacing="5" border="0" class="table_prod">
  <tr><td><input type="checkbox" name="data[Appointment][products][<?php echo $product['Category']['id'] ?>-<?php echo $product['Product']['id']; ?>]" value="<?php echo $product['Product']['id']; ?>" id="Appointment<?php echo $product['Product']['id'] ?><?php echo $product['Category']['id']; ?>" /></td></tr>
  <tr><td><?php echo $product['Product']['name']; ?></td></tr>
  <tr><td><?php echo $this->Html->image("products/" . $product['Image']['name'], array("width" => '135', "alt" => $product['Product']['name'])); ?></td></tr>
  </table>
  </li>
  <?php endforeach; ?>
  <?php //if($i<2) : ?>

  <?php //endif;   ?>
  <?php endforeach; ?>
  <li class="li_prod"><table cellpadding="3" cellspacing="5" border="0" class="table_prod"><tr><td></td></tr></table></li>
  </ul>
  </div>
  <?php endforeach; ?>
  <?php else : ?>
  <div id="tabs-nocategories">
  <p>Currently there are no categories</p>
  </div>
  <?php endif; ?>
  -->
  </div>
  </td>
  </tr>

  <tr>
  <td><?php echo $this->Form->button('Back', array('type' => 'button', 'onclick' => 'location.href=\'' . $this->webroot . 'appointments/\'')); ?></td>
  <td></td>
  <td><?php echo $this->Form->submit(); ?></td>
  </tr>
  </table>
  <?php echo $this->Form->end(); ?>
 * 
 */
?>