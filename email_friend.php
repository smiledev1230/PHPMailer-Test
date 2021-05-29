<style>
body{font-family:Arial}
    /* ----------- dialog-form ----------- */
    .error{
        color: red;
        margin-left: 150px;
    }
    #dialog-form{
        border:solid 2px #b7ddf2;
        background:#ebf4fb;
    }
    #dialog-form h1 {
        font-size:14px;
        font-weight:bold;
        margin-bottom:8px;
    }
    #dialog-form p{
        font-size:11px;
        color:#666666;
        margin-bottom:20px;
        border-bottom:solid 1px #b7ddf2;
        padding-bottom:10px;
    }
    #dialog-form label{
        display:block;
        font-weight:bold;
        text-align:right;
        width:140px;
        float:left;
    }
    #dialog-form .small{
        color:#666666;
        display:block;
        font-size:11px;
        font-weight:normal;
        text-align:right;
        width:140px;
    }

    #dialog-form .txt{
        float:left;
        font-size:12px;
        padding:4px 2px;
        border:solid 1px #aacfe4;
        width:290px;
        margin:2px 0 5px 10px;
    }

    #dialog-form textarea{
        float:left;
        font-size:12px;
        padding:4px 2px;
        border:solid 1px #aacfe4;
        width:290px;
        margin:2px 0 5px 10px;
    }

    #dialog-form button{
        clear:both;
        margin-left:150px;
        width:125px;
        height:31px;
        background:#666666 url(img/button.png) no-repeat;
        text-align:center;
        line-height:31px;
        color:#FFFFFF;
        font-size:11px;
        font-weight:bold;
    }

    #submit{
        color: #fff;
        font-size: 12px;
        font-family: arial;
        border: none;
        margin-left: 150px;
        background: #F9CD06 no-repeat; 
        width:125px;
        height:31px;
    }

    .clear{
        clear: both;
    }
</style>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script>
    (function($,W,D)
    {
        var JQUERY4U = {};

        JQUERY4U.UTIL =
            {
            setupFormValidation: function()
            {
                //form validation rules
                $("#contact").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        from: {
                            required: true,
                            email: true
                        },
                        subject: {
                            required: true,
                            minlength: 3
                        }
                    },
                    messages: {
                        email: {
                            required: "Please provide a correct email address.",
                            email: "Please provide a correct email address."
                        },
                        from: {
                            required: "Please provide a correct email address.",
                            email: "Please provide a correct email address."
                        },
                        subject: {
                            required: "Please enter a valid email address",
                            minlength: "Subject should at least 3 characters in length."
                        }
                    },
                    errorElement: "div", 
                    
                    errorPlacement: function(error, element) {
                        $(element).next().after(error);
                    },
                    /*
                    submitHandler: function(form) {
                        alert('Thank you, your friend will be mailed soon!');
                        $(("#contact")).submit();
                        window.close();
                    }
                    */
                });
            }
        };

        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);
    
</script>

<div id="dialog-form" title="Email to your friend">
    <form id="contact" name="contact" action="/mailer/mail/sendmessage.php" method="post">
        <fieldset>
            <legend>Send this page to your friend</legend>
            <label for="email"><span class="required">*</span>To:</label>
            <input name="email" type="email" id="email" class="txt" />
            <div class="clear"></div>

            <label for="email"><span class="required">*</span>Your Email:</label>
            <input name="from" type="email" id="from" class="txt" />
            <div class="clear"></div>

            <label for="email"><span class="required">*</span>Subject:</label>
            <input name="subject" type="text" id=subject" class="txt"  value="Honest Install"/>
            <div class="clear"></div>

            <label for="comments">Message:</label>
            <textarea name="msg" id="msg"></textarea>
            <div class="clear"></div>

            <label for="url"><span class="required">*</span>URL:</label>
            <input name="url" type="text" id=url" class="txt" readonly="readonly" value="<?= 'http://honestinstall.com' . $_GET['p']; ?>"/>
            <div class="clear"></div>

            <input id="submit" type="submit" name="submit" value="Submit"/>
            <div class="clear"></div>
        </fieldset>
    </form>
</div>