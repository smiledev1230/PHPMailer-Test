<?php
session_start();
$css = 'http://www.honestinstall.com/additional/css/';
$js = 'http://www.honestinstall.com/additional/js/';
?>

<link href="<?= $css . 'appoint.css'; ?>" media="screen" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<link href='<?= $css . 'style_ie.css'; ?>' rel='stylesheet'>
<script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
<![endif]-->

<style>
    .error{
        color: red;
    }

</style>

<script>
    $(function() {

        $("#appointment_form").validate({
            rules: {
                'appointment[first_name]': {required: true},
                'appointment[last_name]': {required: true},
                'appointment[email]': {
                    required: true,
                    email: true
                },
                'appointment[phone]': {
                    required: true
                },
                'appointment_date[date1]': {
                    required: true
                },
                'appointment_date[time1]': {
                    required: true
                },
                'appointment[captcha]': {
                    equalTo: "#captcha-value"
                }, 'appointment[captcha]': {
                    equalTo: "#captcha-value"
                },
                'appointment_date[time1]':{
                    required: true
                }

            },
            messages: {
                'appointment[captcha]': {
                    equalTo: "Please answer correctly"
                },
                'appointment[time1]': {
                    required: "This field is requried."
                }
            },
            success: function(error, element) {
                var parentElement = $(element).parents(".form-element");
                var notifyElement = parentElement.find("span.required");
                notifyElement.removeClass("error");
                notifyElement.html("(Required)")

            }
        });

        $("#date1").datepicker({
            beforeShowDay: function(date) {
                var day = date.getDay();
                return [(day != 0), ''];
            },
            minDate: '+1d',
            maxDate: '+90d', //add this
        });

        $("#date2").datepicker({
            beforeShowDay: function(date) {
                var day = date.getDay();
                return [(day != 0), ''];
            },
            minDate: '+1d',
            maxDate: '+90d', //add this
        });

    });
</script>
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
                                        Schedule a Consultation:
                                    </h2>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <span class="reviews-sprites inverse-triangle center-block " style="color: red;">
                                </span>
                            </div>
                        </section>

                        <?php if ($_SESSION['send_confirmation'] != '') : ?>
                            <div>
                                <h2 style="color: red; text-align: center;"><?= $_SESSION['send_confirmation']; ?> </h2>
                            </div>
                            <?php
                            $_SESSION['send_confirmation'] = '';
                        endif;
                        ?>

                        <form action="additional/appoint_save.php" class="bootstrap-phone-breakpoint" id="appointment_form" method="post">
                            <section class="row-fluid">
                                <div class="span6 lead-info">
                                    <div class="form-padding">

                                        <div class="row-fluid form-element">
                                            <label class="control-label">
                                                Type of Appoinment
                                            </label>
                                            <input type="radio" name="appoinment-type" value="install" style="margin-top: -2px;"> Install
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="appoinment-type" value="consultation" style="margin-top: -2px;"> Consultation
                                        </div>


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
                                        <div class="row-fluid form-element">
                                            <label class="control-label">
                                                Phone 2
                                            </label>
                                            <input class="span12 about-label" id="phone" name="appointment[phone2]" placeholder="555-555-5555" type="text">
                                            <label class="about-input">Secondary phone number will be used to contact you</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6 date-time-info">
                                    <div class="form-padding">
                                        <div class="row-fluid form-element">
                                            <label class="span12">
                                                First Preference
                                            </label>
                                            <div class="input-prepend day date span6" data-date-format="yyyy-mm-dd" data-date="<?php echo date('m/d/Y'); ?>" id="dp1">
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                                <input class="input-small" id="date1" name="appointment_date[date1]" tabindex="20" value="<?php echo date('m/d/Y'); ?>" type="text">
                                            </div>
                                            <div class="input-prepend time span5 offset1">
                                                <span class="add-on">
                                                    <i class="icon-time"></i>
                                                </span>
                                                <select class="input-cl-medium" id="time1" name="appointment_date[time1]" tabindex="22">
                                                    <option selected="selected" value="">-none-</option>
                                                    
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row-fluid form-element">
                                            <label class="span12">
                                                Second Preference
                                            </label>
                                            <div class="input-prepend day date span6" data-date-format="yyyy-mm-dd" data-date="<?php echo date('Y-m-d'); ?>" id="dp2">
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                                <input class="input-small" id="date2" name="appointment_date[date2]" tabindex="24" type="text">
                                            </div>
                                            <div class="input-prepend time span5 offset1">
                                                <span class="add-on">
                                                    <i class="icon-time"></i>
                                                </span>
                                                <select class="input-cl-medium" id="time2" name="appointment_date[time2]" tabindex="26">
                                                    <option selected="selected" value="">-none-</option>
                                                    
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
                            
                            <section class="row-fluid submit-set" >
                                <div class="form-padding">
                                    <span class="meta-information italics" style="margin-left: 37%;">(This helps us prevent spam.)</span>
                                    <div class="row-fluid form-element captcha-set" style="margin-left: 37%;">
                                        <label class="span6">
                                            <?php
                                            $val1 = rand(0, 3);
                                            $val2 = rand(0, 3)
                                            ?>
                                            <p>
                                                <?= $val1; ?> + <?= $val2; ?> = <input class="input-small" id="captcha" name="appointment[captcha]" placeholder="Answer" type="text">
                                                <!--
                                                <span class="required">
                                                    (Required)
                                                </span>
                                                -->
                                                <br/>
                                                <input type="hidden" id="captcha-value" value="<?= $val1 + $val2; ?>"/>
                                            </p>
                                        </label>
                                    </div>
                                    <div class="row-fluid form-element">
                                        <div class="center-block">
                                            <input class="btn-grey" id="submit-appointment" tabindex="31" value="Submit" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>