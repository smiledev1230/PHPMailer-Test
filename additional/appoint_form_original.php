<?php
$css = 'http://www.honestinstall.com/additional/css/';
$js =  'http://www.honestinstall.com/additional/js/'
?>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="noindex nofollow" name="robots">
<title>Honest Install</title>

<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->

<link href="<?= $css . 'appoint.css'; ?>" media="screen" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<link href='<?= $css . 'style_ie.css'; ?>' rel='stylesheet'>
<script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
<![endif]-->
<script src="<?= $js . 'sizzle.js'; ?>" type="text/javascript"></script>

<div class="page-container">
    <div class="body-container">
        <div class="reviews-header" itemscope="">
            <div class="content">
                <div class="container cl-tablet-small" id="review_appointment">
                    <div class="content-container">

                        <section class="sub-head">
                            <div class="horizontal-seperator row-fluid">
                                <div class="gradient">
                                    <h2>
                                        Appointment Details
                                    </h2>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <span class="reviews-sprites inverse-triangle center-block "></span>
                            </div>
                        </section>


                        <form novalidate="novalidate" action="/reviews/403/honest-install/appointment/" class="bootstrap-phone-breakpoint" id="appointment_form" method="post">
                            <section class="row-fluid">
                                <div class="span6 lead-info">
                                    <div class="form-padding">
                                        <div class="row-fluid form-element">
                                            <label class="control-label">
                                                First Name
                                                <span class="required">
                                                    (Required)
                                                </span>
                                            </label>
                                            <input class="span12" id="first_name" name="appointment[first_name]" placeholder="John" tabindex="10" type="text">
                                        </div>
                                        <div class="row-fluid form-element">
                                            <label class="control-label">
                                                Last Name
                                                <span class="required">
                                                    (Required)
                                                </span>
                                            </label>
                                            <input class="span12" id="last_name" name="appointment[last_name]" placeholder="Doe" tabindex="12" type="text">
                                        </div>
                                        <div class="row-fluid form-element">
                                            <label class="control-label">
                                                Email
                                                <span class="required">
                                                    (Required)
                                                </span>
                                            </label>
                                            <input class="span12 about-label" id="email" name="appointment[email]" placeholder="john.doe@gmail.com" tabindex="14" type="text">
                                            <label class="about-input">Email will be used to contact you</label>
                                        </div>
                                        <div class="row-fluid form-element">
                                            <label class="control-label">
                                                Phone
                                                <span class="required">
                                                    (Required)
                                                </span>
                                            </label>
                                            <input class="span12 about-label" id="phone" name="appointment[phone]" placeholder="555-555-5555" tabindex="16" type="text">
                                            <label class="about-input">Phone number will be used to contact you</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6 date-time-info">
                                    <div class="form-padding">
                                        <div class="row-fluid form-element">
                                            <label class="span12">
                                                First Preference
                                            </label>
                                            <div class="input-prepend day date span6" data-date-format="yyyy-mm-dd" data-date="2013-07-29" id="dp1">
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                                <input class="input-small" id="date1" name="appointment_date[date1]" readonly="true" tabindex="20" value="2013-07-29" type="text">
                                            </div>
                                            <div class="input-prepend time span5 offset1">
                                                <span class="add-on">
                                                    <i class="icon-time"></i>
                                                </span>
                                                <select class="input-cl-medium" id="time1" name="appointment_date[time1]" tabindex="22">
                                                    <option selected="selected" value="06:00 AM">
                                                        06:00 AM
                                                    </option>
                                                    <option value="06:30 AM">
                                                        06:30 AM
                                                    </option>
                                                    <option value="07:00 AM">
                                                        07:00 AM
                                                    </option>
                                                    <option value="07:30 AM">
                                                        07:30 AM
                                                    </option>
                                                    <option value="08:00 AM">
                                                        08:00 AM
                                                    </option>
                                                    <option value="08:30 AM">
                                                        08:30 AM
                                                    </option>
                                                    <option value="09:00 AM">
                                                        09:00 AM
                                                    </option>
                                                    <option value="09:30 AM">
                                                        09:30 AM
                                                    </option>
                                                    <option value="10:00 AM">
                                                        10:00 AM
                                                    </option>
                                                    <option value="11:30 AM">
                                                        11:30 AM
                                                    </option>
                                                    <option value="12:00 AM">
                                                        12:00 AM
                                                    </option>
                                                    <option value="12:30 PM">
                                                        12:30 PM
                                                    </option>
                                                    <option value="01:00 PM">
                                                        01:00 PM
                                                    </option>
                                                    <option value="01:30 PM">
                                                        01:30 PM
                                                    </option>
                                                    <option value="02:00 PM">
                                                        02:00 PM
                                                    </option>
                                                    <option value="02:30 PM">
                                                        02:30 PM
                                                    </option>
                                                    <option value="03:00 PM">
                                                        03:00 PM
                                                    </option>
                                                    <option value="03:30 PM">
                                                        03:30 PM
                                                    </option>
                                                    <option value="04:00 PM">
                                                        04:00 PM
                                                    </option>
                                                    <option value="04:30 PM">
                                                        04:30 PM
                                                    </option>
                                                    <option value="05:00 PM">
                                                        05:00 PM
                                                    </option>
                                                    <option value="05:30 PM">
                                                        05:30 PM
                                                    </option>
                                                    <option value="06:00 PM">
                                                        06:00 PM
                                                    </option>
                                                    <option value="06:30 PM">
                                                        06:30 PM
                                                    </option>
                                                    <option value="07:00 PM">
                                                        07:00 PM
                                                    </option>
                                                    <option value="07:30 PM">
                                                        07:30 PM
                                                    </option>
                                                    <option value="08:00 PM">
                                                        08:00 PM
                                                    </option>
                                                    <option value="08:30 PM">
                                                        08:30 PM
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row-fluid form-element">
                                            <label class="span12">
                                                Second Preference
                                            </label>
                                            <div class="input-prepend day date span6" data-date-format="yyyy-mm-dd" data-date="2013-07-29" id="dp2">
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                                <input class="input-small" id="date2" name="appointment_date[date2]" readonly="true" tabindex="24" type="text">
                                            </div>
                                            <div class="input-prepend time span5 offset1">
                                                <span class="add-on">
                                                    <i class="icon-time"></i>
                                                </span>
                                                <select class="input-cl-medium" id="time2" name="appointment_date[time2]" tabindex="26">
                                                    <option selected="selected" value="">-none-</option>
                                                    <option value="06:00 AM">
                                                        06:00 AM
                                                    </option>
                                                    <option value="06:30 AM">
                                                        06:30 AM
                                                    </option>
                                                    <option value="07:00 AM">
                                                        07:00 AM
                                                    </option>
                                                    <option value="07:30 AM">
                                                        07:30 AM
                                                    </option>
                                                    <option value="08:00 AM">
                                                        08:00 AM
                                                    </option>
                                                    <option value="08:30 AM">
                                                        08:30 AM
                                                    </option>
                                                    <option value="09:00 AM">
                                                        09:00 AM
                                                    </option>
                                                    <option value="09:30 AM">
                                                        09:30 AM
                                                    </option>
                                                    <option value="10:00 AM">
                                                        10:00 AM
                                                    </option>
                                                    <option value="11:30 AM">
                                                        11:30 AM
                                                    </option>
                                                    <option value="12:00 AM">
                                                        12:00 AM
                                                    </option>
                                                    <option value="12:30 PM">
                                                        12:30 PM
                                                    </option>
                                                    <option value="01:00 PM">
                                                        01:00 PM
                                                    </option>
                                                    <option value="01:30 PM">
                                                        01:30 PM
                                                    </option>
                                                    <option value="02:00 PM">
                                                        02:00 PM
                                                    </option>
                                                    <option value="02:30 PM">
                                                        02:30 PM
                                                    </option>
                                                    <option value="03:00 PM">
                                                        03:00 PM
                                                    </option>
                                                    <option value="03:30 PM">
                                                        03:30 PM
                                                    </option>
                                                    <option value="04:00 PM">
                                                        04:00 PM
                                                    </option>
                                                    <option value="04:30 PM">
                                                        04:30 PM
                                                    </option>
                                                    <option value="05:00 PM">
                                                        05:00 PM
                                                    </option>
                                                    <option value="05:30 PM">
                                                        05:30 PM
                                                    </option>
                                                    <option value="06:00 PM">
                                                        06:00 PM
                                                    </option>
                                                    <option value="06:30 PM">
                                                        06:30 PM
                                                    </option>
                                                    <option value="07:00 PM">
                                                        07:00 PM
                                                    </option>
                                                    <option value="07:30 PM">
                                                        07:30 PM
                                                    </option>
                                                    <option value="08:00 PM">
                                                        08:00 PM
                                                    </option>
                                                    <option value="08:30 PM">
                                                        08:30 PM
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row-fluid form-element">
                                            <label class="control-label span12">
                                                Comments
                                            </label>
                                            <textarea class="span12 about-label" id="comments" name="appointment[comments]" rows="4" tabindex="28" type="text"></textarea>
                                            <label class="about-input">Appointment specific questions.</label>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="row-fluid submit-set">
                                <div class="form-padding">
                                    <div class="row-fluid form-element captcha-set">
                                        <label class="span6">
                                            <p>
                                                Are you human?
                                                <span class="meta-information italics">(This helps us prevent spam.)</span>
                                            </p>
                                            <input id="check_for_human" name="check_for_human" tabindex="30" value="human" type="checkbox">
                                        </label>
                                    </div>
                                    <div class="row-fluid form-element">
                                        <div class="center-block">
                                            <input class="btn-orange" disabled="true" id="submit-appointment" tabindex="31" value="Request Appointment" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
                <script>
                    $(function() {
  
                        var disableEnableFormSubmit = function(){
                            if($(this).prop("checked")){
                                $("#submit-appointment").prop("disabled", false);
                            } else{
                                $("#submit-appointment").prop("disabled", true);
                            }
                        };
  
                        $("#check_for_human").click(disableEnableFormSubmit);
  
                        $("#appointment_form").validate({
                            rules: {
                                'appointment[first_name]': {required: true},
                                'appointment[last_name]':  {required: true},
                                'appointment[email]': {
                                    required: true,
                                    email: true
                                },
                                'appointment[phone]': {
                                    required: true,
                                    phoneUS: true
                                },
                                'appointment_date[date1]': {
                                    required: true
                                },
                                'appointment_date[time1]': {
                                    required: true
                                }
                            },
                            messages:{
                            },
                            errorPlacement: function(error, element) {
                                var parentElement = $(element).parents(".form-element");
                                var notifyElement = parentElement.find("span.required");
                                notifyElement.html(error.html());
                                notifyElement.addClass("error");
                            },
                            success: function (error, element) {
                                var parentElement = $(element).parents(".form-element");
                                var notifyElement = parentElement.find("span.required");
                                notifyElement.removeClass("error");
                                notifyElement.html("(Required)")
        
                            }
                        });
  
                        $('.day').datepicker({
                            startDate: '+1d'
                        });
    
  
                    });
                </script>

            </div>
        </div>
    </div>            
</div>