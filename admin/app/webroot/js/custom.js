$(function() {

    //default value
    var names = [];
    $('.products:checked').each(function() {
        names.push($(this).attr("name") + this.id).val;
    });
    $('#preview_products').val(names);
    $('#preview_subject').val($('#AppointmentSubjects').val());
    $('#preview_date').val($("#AppointmentDateAppointment").val());
    $('#preview_bcc').val($('#AppointmentBccEmail').val());
    $('#preview_other_bcc').val($('#AppointmentOtherBccs').val());

    if ($("#AppointmentTitleMr").is(':checked'))
        $('#preview_title').val('Mr.');
    else if ($("#AppointmentTitleMrs").is(':checked'))
        $('#preview_title').val('Mrs.');
    else if ($("#AppointmentTitleMss").is(':checked'))
        $('#preview_title').val('Ms.');

    if ($("#AppointmentServiceInstall").is(':checked'))
        $('#preview_service').val('Install');
    else if ($("#AppointmentServiceServiceCall").is(':checked'))
        $('#preview_service').val('Service Call');
    else if ($("#AppointmentServiceFollowUp").is(':checked'))
        $('#preview_service').val('Follow Up');

    $('#preview_date').val($("#AppointmentDateAppointment").val());
    $('#preview_time_in').val($("#time_in").val());
    $('#preview_time_out').val($("#time_out").val());
    $('#preview_comment').val($("#AppointmentComment").val());

    //event trigger
    $("#UsersSearchName").keyup(function(e) {
        if (e.which == 13)
            $('#UsersHomeForm').submit();
    });

    $("#UsersSearchEmail").keyup(function(e) {
        if (e.which == 13)
            $('#UsersHomeForm').submit();
    });

    $("#AppointmentSubjects").change(function() {
        $('#preview_subject').val($('#AppointmentSubjects').val());
    });

    $("#AppointmentBccEmail").keyup(function() {
        $('#preview_bcc').val($('#AppointmentBccEmail').val());
    });

    $("#AppointmentOtherBccs").keyup(function() {
        $('#preview_other_bcc').val($('#AppointmentOtherBccs').val());
    });

    $("#AppointmentTitleMr").click(function() {
        $('#preview_title').val('Mr.');
    });

    $("#AppointmentTitleMrs").click(function() {
        $('#preview_title').val('Mrs.');
    });

    $("#AppointmentTitleMss").click(function() {
        $('#preview_title').val('Ms.');
    });

    $("#AppointmentServiceInstall").click(function() {
        $('#preview_service').val('Install');
    });

    $("#AppointmentServiceServiceCall").click(function() {
        $('#preview_service').val('Service Call');
    });

    $("#AppointmentServiceFollowUp").click(function() {
        $('#preview_service').val('Follow Up');
    });

    $("#AppointmentDateAppointment").change(function() {
        $('#preview_date').val($("#AppointmentDateAppointment").val());
    });

    $("#first_preference_date").datepicker({dateFormat: 'yy-mm-dd'});

    $("#second_preference_date").datepicker({dateFormat: 'yy-mm-dd'});


    $("#time_in").change(function() {
        $('#preview_time_in').val($("#time_in").val());
    });

    $("#time_out").change(function() {
        $('#preview_time_out').val($("#time_out").val());
    });

    $("#AppointmentComment").change(function() {
        $('#preview_comment').val($("#AppointmentComment").val());
    });

    $(".products").change(function() {
        names = [];
        $('.products:checked').each(function() {
            names.push($(this).attr("name") + this.id);
        });
        $('#preview_products').val(names);
    });

    $('#AppointmentConfirmForm').validate({
        rules: {
            AppointmentFirstname: "required",
            AppointmentLastname: "required",
            AppointmentEmail: {
                required: true,
                email: true
            },
            AppointmentPhone: "required"
        },
        messages: {
            AppointmentFirstname: "Please enter your firstname",
            AppointmentLastname: "Please enter your lastname",
            AppointmentEmail: "Please enter a valid email address",
            AppointmentPhone: "Please enter your phone number"
        }
    });

});
