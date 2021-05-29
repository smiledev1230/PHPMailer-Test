
<script src="js/jquery.validate.js"></script>
<script language="javascript">

var onImg= "http://honestinstall.com/images/dau.png";
var offImg= "http://honestinstall.com/images/daul.png";
</script>
<style>
    .paddtop {
	    padding-top: 15px
	}
	.form {
	    margin: 30px 0;
	    font-family: "archivo_narrowregular", sans-serif;
	    background: #ffffff url("images/cformbg.jpg") repeat-x;
	}
	input {
	    font-family: "archivo_narrowregular", sans-serif;
	    padding-left: 10px;
	}
	.formcenter {
	    background: -webkit-linear-gradient(top, #fdfdfd, #ededed);
	    /* For Safari 5.1 to 6.0 */
	    
	    background: -o-linear-gradient(bottom, #e5e5e5, #f9f9f9);
	    /* For Opera 11.1 to 12.0 */
	    
	    background: -moz-linear-gradient(bottom, #c2c2c2, #f6f6f6);
	    /* For Firefox 3.6 to 15 */
	    
	    background: linear-gradient(to bottom, #fff, #bababa);
	    /* Standard syntax (must be last) */
	    
	    border: 2px solid #f7ca4d;
	    border-radius: 10px;
	    font-size: 15px;
	    max-width: 470px;
	    padding: 0 20px;
	    text-align: left;
	    width: 100%;
	    color: #555555;
	}
	.formcenter h4 {
	    text-align: left;
	}
	.form-radio-item {
	    display: block;
	    text-align: left;
	}
	.group {
	    text-align: left;
	    clear: both;
	    margin-bottom: 10px;
	}
	.fleft {
	    width: 48%;
	}
	.fright {
	    width: 48%;
	    float: right;
	}
	.form-input {
	    width: 95%;
	}
	.group div {
	    display: inline-block;
	}
	.group input {
	    border: 1px solid gray;
	    border-radius: 5px;
	    height: 30px;
	    font-size: 14px;
	    font-family: "archivo_narrowregular", sans-serif;
	}
	.group .form-label {
	    font-size: 15px;
	    font-weight: bold;
	    display: block;
	    margin-bottom: 5px;
	}
	.form-sub-label {
	    display: block;
	    margin-top: 5px;
	}
	.group textarea {
	    width: 100%;
	    border: 1px solid gray;
	    border-radius: 5px;
	    font-size: 14px;
	}
	.form-radio-item label {
	    font-size: 16px;
	}
	label,
	input[type="radio"] {
	    font-size: 16px;
	    vertical-align: middle;
	    margin-top: -1px;
	}
	.group-top {
	    margin-top: 10px;
	}
	.btn-submit {
	    margin-bottom: 30px;
	    margin-top: 25px;
	    text-align: left;
	}
	.btn-submit input {
	    border-radius: 5px;
	    background-color: #F3B300;
	    color: #fff;
	    padding: 10px 20px;
	    border: 1px solid #F3B300;
	    text-transform: uppercase;
	    font-size: 16px;
	}
	.btn-submit input:hover {
	    opacity: 0.7;
	}
	.tellus span {
	    font-style: italic;
	}
	.tellus strong {
	    cursor: pointer;
	}
	.group-radio {
	    margin: 10px 0;
	    padding-left: 15px;
	}
	.group-radio .tgroup {
	    font-size: 16px;
	}
	.group-radio .form-radio-item {
	    padding-left: 15px;
	}
	.group-radio label {
	    font-size: 16px;
	}
	.form-checkbox-item {
	    display: block;
	    padding-left: 15px;
	    font-size: 16px;
	}
	.res,
	.gres,
	.com,
	.gcom {
	    display: none;
	}
	.img-dau {
	    margin-right: 5px;
	    position: relative;
	    vertical-align: top;
	}
	.form-t {
	    margin: 0 -20px 30px;
	    padding: 1px 20px;
	    border-radius: 8px 8px 0 0;
	    background: #ffcb01;
	    /* Old browsers */
	    
	    background: -moz-linear-gradient(left, #ffcb01 1%, #ffcb01 68%, #fdf81a 100%);
	    /* FF3.6-15 */
	    
	    background: -webkit-linear-gradient(left, #ffcb01 1%, #ffcb01 68%, #fdf81a 100%);
	    /* Chrome10-25,Safari5.1-6 */
	    
	    background: linear-gradient(to right, #ffcb01 1%, #ffcb01 68%, #fdf81a 100%);
	    /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	    
	    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#ffcb01', endColorstr='#fdf81a', GradientType=1);
	    /* IE6-9 */
	}
	.form-t h4 {
	    color: #fff;
	    font-size: 24px;
	    padding-left: 70px;
	    margin-top: 1em;
	    margin-bottom: 1em;
	}
	.img-mail {
	    margin-top: 10px;
	    position: absolute;
	}
	label.error {
	    border: none !important;
	    color: red;
	}
	.error {
	    border: 1px dashed red !important;
	}
	.form-txt {
	    margin-left: 15px;
	    display: none;
	}
	.area-txt {
	    width: 95%;
	}
	@media only screen and (min-width: 768px) and (max-width: 850px) {
	    .header-text .companydesc {
	        padding-left: 125px;
	    }
	    .mainBG {
	        padding: 0;
	    }
	    .formcenter {
	        max-width: none;
	        width: 80%;
	    }
	    #wrapper {
	        width: auto;
	    }
	}
	@media only screen and (max-width: 767px) {
	    #wrapper {
	        width: auto;
	    }
	    .header-text .rev {
	        padding-top: 9px;
	    }
	    .mainBG {
	        padding: 0;
	    }
	    .formcenter {
	        max-width: none;
	        width: 80%;
	    }
	    .form {
	        margin: 30px 15px;
	    }
	    .fleft {
	        width: 100%;
	    }
	    .fright {
	        width: 100%;
	        clear: both;
	    }
	    .btn-submit {
	        text-align: center;
	    }
	}
	@media only screen and (max-width: 480px) {
	    .header-text .rev {
	        padding-left: 20px;
	    }
	    .header-text .rev {
	        padding-top: 0;
	    }
	    .header-text .morethan {
	        padding-right: 5px;
	    }
	    #input_3 {
	        width: auto;
	    }
	}
	#image_file {
	    opacity: 0;
	    position: absolute;
	    top: 20px;
	    left: 0px;
	    width: 130px;
	    cursor: pointer;
	}
	.image-label {
	    border-radius: 5px;
	    background-color: #F3B300;
	    color: #fff;
	    padding: 4px 20px;
	    border: 1px solid #F3B300;
	    text-transform: uppercase;
	    font-size: 14px;
	    cursor: pointer;
	}
</style>

<script type="text/javascript">

    jQuery(document).ready(function($){

        $(".tellus strong").click(function(){

            if ($(this).hasClass('show')){

                $(".res").fadeIn();

                $(".com").fadeIn();

                $(".form-radio-item").css('display','block');

                $(this).removeClass('show');

            }else {

                $(".res").fadeOut();

                $(".com").fadeOut();

                $(".gcom").fadeOut();

                $(".gres").fadeOut();

                $(this).addClass('show');

            }

        });

        

        $(".res").click(function(){

            $(".gres").fadeIn();

            $(".gcom").fadeOut();

        });

        

         $(".com").click(function(){

            $(".gcom").fadeIn();

            $(".gres").fadeOut();

        });

        $("#qservice").validate({

			rules: {

				fname: "required",

				lname: "required",
				phone: "required",
				city: "required",
				txtarea: "required",

				

				email: {

					required: true,

					email: true

				}

			},

			messages: {

				fname: "Please enter your first name",

				lname: "Please enter your last name",

				email: "Please enter a valid email address",
				city: "Please enter your city",
				phone: "Please enter your phone",
                txtarea: "Please enter your project desciption "

			}

		});

        

        $("input[name='rgroup']").click(function(){

            

            var find = $(this).parent().find('.rgroup-txt-0').hasClass('rgroup-txt-0');

            if (find){

                $(this).parent().find('.rgroup-txt-0').show();

            }else {

                $('.rgroup-txt-0').hide();

            }

            

            var find1 = $(this).parent().find('.rgroup-txt-1').hasClass('rgroup-txt-1');

            if (find1){

                $(this).parent().find('.rgroup-txt-1').show();

            }else {

                $('.rgroup-txt-1').hide();

            }

            

        });

        $("input[name='cgroup']").click(function(){

            

            var find = $(this).parent().find('.cgroup-txt-0').hasClass('cgroup-txt-0');

            if (find){

                $(this).parent().find('.cgroup-txt-0').show();

            }else {

                $('.cgroup-txt-0').hide();

            }

            

            var find1 = $(this).parent().find('.cgroup-txt-1').hasClass('cgroup-txt-1');

            if (find1){

                $(this).parent().find('.cgroup-txt-1').show();

            }else {

                $('.cgroup-txt-1').hide();

            }

            

        });

        $("input[name='cgroup1']").click(function(){

            

            var find = $(this).parent().find('.form-txt').hasClass('form-txt');

            if (find){

                $(this).parent().find('.form-txt').show();

            }else {

                $('.cgroup-txt1').hide();

            }

            

        });

        $("input[name='cgroup2']").click(function(){

            

            var find = $(this).parent().find('.form-txt').hasClass('form-txt');

            if (find){

                $(this).parent().find('.form-txt').show();

            }else {

                $('.cgroup-txt2').hide();

            }

            

        });

        

        $('form input[name=rgroup5]').click(function(){

                                         

            $(".cbox").prop('checked', false); 

                                                   

        });

        

        $(".cbox-0").click(function(){

            

            var find = $(this).parent().find('.form-txt').hasClass('rgroup-cbox-txt-0');

            if (find){

                $(this).parent().find('.form-txt').show();

                $(this).parent().find('.form-txt').removeClass('rgroup-cbox-txt-0');

            }else {

                $(this).parent().find('.form-txt').hide();

                $(this).parent().find('.form-txt').addClass('rgroup-cbox-txt-0');

            }

            

        });

        $(".cbox-1").click(function(){

            

            var find = $(this).parent().find('.form-txt').hasClass('rgroup-cbox-txt-1');

            if (find){

                $(this).parent().find('.form-txt').show();

                $(this).parent().find('.form-txt').removeClass('rgroup-cbox-txt-1');

            }else {

                $(this).parent().find('.form-txt').hide();

                $(this).parent().find('.form-txt').addClass('rgroup-cbox-txt-1');

            }

            

        });

        $(".cbox-2").click(function(){

            

            var find = $(this).parent().find('.form-txt').hasClass('rgroup-cbox-txt-2');

            if (find){

                $(this).parent().find('.form-txt').show();

                $(this).parent().find('.form-txt').removeClass('rgroup-cbox-txt-2');

            }else {

                $(this).parent().find('.form-txt').hide();

                $(this).parent().find('.form-txt').addClass('rgroup-cbox-txt-2');

            }

            

        });

        $(".cbox-3").click(function(){

            

            var find = $(this).parent().find('.form-txt').hasClass('rgroup-cbox-txt-3');

            if (find){

                $(this).parent().find('.form-txt').show();

                $(this).parent().find('.form-txt').removeClass('rgroup-cbox-txt-3');

            }else {

                $(this).parent().find('.form-txt').hide();

                $(this).parent().find('.form-txt').addClass('rgroup-cbox-txt-3');

            }

            

        });

        

        $(".cbox-4").click(function(){

            

            var find = $(this).parent().find('.form-txt').hasClass('cgroup-cbox-txt-0');

            if (find){

                $(this).parent().find('.form-txt').show();

                $(this).parent().find('.form-txt').removeClass('cgroup-cbox-txt-0');

            }else {

                $(this).parent().find('.form-txt').hide();

                $(this).parent().find('.form-txt').addClass('cgroup-cbox-txt-0');

            }

            

        });

    })
	

</script>


<div class="form">

        <div class="formcenter">

            <div class="form-t">

                <img class="img-mail" src="/images/mail-icon.png">

                <h4>Request Quote/Service</h4>

            </div>

            

            <form id="qservice" class="qservice" action="sendform.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="webpage"  value="<? echo $webpage; ?>">
                <span class="form-radio-item">

                    <input class="form-radio" id="input_0" name="im" value="Schedule Me (I'm ready for an appointment)" type="radio">

                    <label for="input_0"><strong>Schedule Me</strong> (I'm ready for an appointment) </label>

                </span>

                <span class="form-radio-item">

                    <input class="form-radio" id="input_1" name="im" value="Inquiry (I have a questions or want a quote)" type="radio">

                    <label for="input_1"><strong>Inquiry</strong> (I have a questions or want a quote) </label>

                </span>

                <div class="group group-top">

                    <label class="form-label form-label-top" for="input_12"> Name *</label>

                    <div class="fleft">

                        <input class="form-input" id="input_fname" name="fname" value="" type="text">

                        <label class="form-sub-label" for="input_fname"> <small>FIRST</small> </label>

                    </div>

                    <div class="fright">

                        <input class="form-input" id="input_lname" name="lname" value="" type="text">

                        <label class="form-sub-label" for="input_lname"> <small>LAST </small></label>

                    </div>

                </div>

                <div class="group">

                    <div class="fleft">

                        <label class="form-label" for="input_company"> Company/Organization </label>

                        <input class="form-input" id="input_company" name="company" value="" type="text">

                        

                    </div>

                </div>
                <div class="group">

                    <div class="fleft">

                        <label class="form-label" for="input_address"> Address </label>

                        <input class="form-input" id="input_address" name="address" value="" type="text">

                        

                    </div>

                    <div class="fright">

                        <label class="form-label" for="input_city"> City * </label>

                        <input class="form-input" id="input_city" name="city" value="" type="text">

                        

                    </div>

                </div>
                <div class="group">

                    <div class="fleft">

                        <label class="form-label" for="input_state"> State </label>

                        <input class="form-input" id="input_state" name="state" value="" type="text">

                        

                    </div>

                    <div class="fright">

                        <label class="form-label" for="input_zip"> Zip </label>

                        <input class="form-input" id="input_zip" name="zip" value="" type="text">

                        

                    </div>

                </div>

                <div class="group">

                    <div class="fleft">

                        <label class="form-label" for="input_email"> Email * </label>

                        <input class="form-input" id="input_email" name="email" value="" type="text">

                        

                    </div>

                    <div class="fright">

                        <label class="form-label" for="input_phone"> Phone *</label>

                        <input class="form-input" id="input_phone" name="phone" value="" type="text">

                        

                    </div>

                </div>

                <div class="group">

                    <label class="form-label" for="input_email"> Project Description *</label>

                    <textarea rows="7" name="txtarea"></textarea>

                </div>

                <div class="tellus">

                    <p><div  onclick="document.getElementById('imgClickAndChange').src = document.getElementById('imgClickAndChange').src == offImg ? onImg : offImg;"><strong class="show"  /><img src="/images/daul.png" class="img-dau" id="imgClickAndChange" >Tell us a bit more (if you dare)...<br>
<span style="font-weight:normal;"><em>We can respond quicker and assign the proper specialist</em><br>
<br>
<span style="font-style:normal;color:#3e82ff;text-decoration:underline">Expand</span></span></strong></div></p>

                </div>
                
                <span class="form-radio-item res">
				
                    <input class="form-radio" id="input_3" name="res_com" value="Residential" type="radio">

                    <label for="input_3">Residential</label>

                </span>
                <span class="form-radio-item com">

                    <input class="form-radio" id="input_4" name="res_com" value="Commercial" type="radio">

                    <label for="input_4">Commercial</label>

                </span>

                <!-- Residential-->

                

                <div class="group-radio gres">

                    <span class="tgroup"><strong>I found Honest:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_0" name="rgroup" value="Online Search/Google" type="radio">

                        <label for="ginput_0">Online Search/Google</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_1" name="rgroup" value="I'm an Existing Customer (welcome back!)" type="radio">

                        <label for="ginput_1">I'm an Existing Customer (welcome back!)</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_2" name="rgroup" value="Referred by a Cool Person" type="radio">

                        <label for="ginput_2">Referred by a Cool Person</label>

                        <br />

                        <input class="form-txt rgroup-txt-0" type="text" name="rgroup_txt_0" value=""  placeholder="name of person"/>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_3" name="rgroup" value="Yelp" type="radio">

                        <label for="ginput_3">Yelp</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_4" name="rgroup" value="Angies List" type="radio">

                        <label for="ginput_3">Angies List</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_5" name="rgroup" value="Facebook" type="radio">

                        <label for="ginput_5">Facebook</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_6" name="rgroup" value="Customer Lobby" type="radio">

                        <label for="ginput_6">Customer Lobby</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_7" name="rgroup" value="Other" type="radio">

                        <label for="ginput_7">Other</label>

                        <br />

                        <input class="form-txt rgroup-txt-1" type="text" name="rgroup_txt_1" value="" />

                    </span>

                

                </div>

                <div class="group-radio gres">

                    <span class="tgroup"><strong>About My Home:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_8" name="rgroup1" value="Existing Home" type="radio">

                        <label for="ginput_8">Existing Home</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_9" name="rgroup1" value="Just Moved/Gonna Move" type="radio">

                        <label for="ginput_9">Just Moved/Gonna Move</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_10" name="rgroup1" value="Building a New Home" type="radio">

                        <label for="ginput_10">Building a New Home</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_11" name="rgroup1" value="I am Renovating" type="radio">

                        <label for="ginput_11">I am Renovating</label>

                    </span>

                </div>

                <div class="group-radio gres">

                    <span class="tgroup"><strong>Home Tech History:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_12" name="rgroup2" value="I've never had the need for an AV provider" type="radio">

                        <label for="ginput_12">I've never had the need for an AV provider</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_13" name="rgroup2" value="Looking for someone new/want multiple quotes" type="radio">

                        <label for="ginput_13">Looking for someone new/want multiple quotes</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_14" name="rgroup2" value="I fired the my old AV compnay" type="radio">

                        <label for="ginput_14">I fired the my old AV compnay</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_15" name="rgroup2" value="I do most technology projects myself" type="radio">

                        <label for="ginput_15">I do most technology projects myself</label>

                    </span>

                </div>

                <div class="group-radio gres">

                    <span class="tgroup"><strong>Budget:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_16" name="rgroup3" value="Less than $2,500" type="radio">

                        <label for="ginput_16">Less than $2,500</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_17" name="rgroup3" value="$2,500-5,000" type="radio">

                        <label for="ginput_17">$2,500-5,000</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_18" name="rgroup3" value="$5,000-10,000" type="radio">

                        <label for="ginput_18">$5,000-10,000</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_19" name="rgroup3" value="10,000-50,000" type="radio">

                        <label for="ginput_19">10,000-50,000</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_20" name="rgroup3" value="50,000-100K" type="radio">

                        <label for="ginput_20">50,000-100K</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_21" name="rgroup3" value="100K+ (we're sending an armored car right now)" type="radio">

                        <label for="ginput_21">100K+ (we're sending an armored car right now)</label>

                    </span>

                </div>

                <div class="group-radio gres">

                    <span class="tgroup"><strong>I need a quote/design by:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_22" name="rgroup4" value="ASAP! (like yesterday)" type="radio">

                        <label for="ginput_22">ASAP! (like yesterday)</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_23" name="rgroup4" value="Within 1 Week" type="radio">

                        <label for="ginput_23">Within 1 Week</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_24" name="rgroup4" value="1-2 Weeks" type="radio">

                        <label for="ginput_24">1-2 Weeks</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_25" name="rgroup4" value="3-4 Weeks" type="radio">

                        <label for="ginput_25">3-4 Weeks</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_26" name="rgroup4" value="Not in any hurry" type="radio">

                        <label for="ginput_26">Not in any hurry</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_27" name="rgroup4" value="I Dunno" type="radio">

                        <label for="ginput_27">I Dunno</label>

                    </span>

                </div>

                <div class="group-radio gres">

                    <span class="tgroup"><strong>I am interested in (check all that interest me):</strong></span>

                    <span class="form-radio-item paddtop">

                        <input class="form-radio" id="ginput_28" name="rgroup5" value="Design" type="radio" style="display:none">

                        <label for="ginput_28" class="form-checkbox-item"><strong><em>Design</em></strong></label>

                        <span class="form-checkbox-item">

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Smart Home Design/Architecture"> Smart Home Design/Architecture<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Prewiring"> Prewiring<br>

                        </span>

                    </span>

                    <span class="form-radio-item paddtop">

                        <input class="form-radio" id="ginput_29" name="rgroup5" value="Home Entertainnment/Theater" type="radio"  style="display:none">

                        <label for="ginput_29"  class="form-checkbox-item"><strong><em>Home Entertainnment/Theater</em></strong></label>

                        <span class="form-checkbox-item">

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="TV Install"> TV Install<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="TV-De-Install Service"> TV-De-Install Service<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Multiroom Audio/SONOS"> Multiroom Audio/SONOS<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Media/Experience Room"> Media/Experience Room<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Outdoor Audio/Video"> Outdoor Audio/Video<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Setup/Configuration/Troubleshooting"> Setup/Configuration/Troubleshooting<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Universal Remotes"> Universal Remotes<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Programming"> Programming<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Cabling/Wiring/Electrical"> Cabling/Wiring/Electrical<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Off-Air Antenna Install"> Off-Air Antenna Install<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Technology Move/Relocation Services"> Technology Move/Relocation Services<br>

                            <input class="cbox cbox-0" type="checkbox" name="rgroup_cbox[]" value="Other"> Other<br>

                            <input class="form-txt rgroup-cbox-txt-0" name="rgroup_cbox_txt_0" value="" type="text"/>

                        </span>

                    </span>

                    <span class="form-radio-item paddtop"  >

                        <input class="form-radio" id="ginput_30" name="rgroup5" value="Home Automation/Control" type="radio" style="display:none">

                        <label for="ginput_30" class="form-checkbox-item"><strong><em>Home Automation/Control</em></strong></label>

                        <span class="form-checkbox-item">

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="App-Based Whole Home Control System"> App-Based Whole Home Control System<br>  <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Cellular Signal Amplifiers"> Cellular Signal Amplifiers<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Universal Remotes"> Universal Remotes<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Wi-fi & Networking"> Wi-fi & Networking<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Smart Lighting Control"> Smart Lighting Control<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Smart HVAC/Climate Control"> Smart HVAC/Climate Control<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Smart Smoke/CO Detection"> Smart Smoke/CO Detection<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Motorized Shades/Drapes"> Motorized Shades/Drapes<br>

                            <input class="cbox cbox-1" type="checkbox" name="rgroup_cbox[]" value="Other"> Other<br>

                            <input class="form-txt rgroup-cbox-txt-1" name="rgroup_cbox_txt_1" value="" type="text"/>

                        </span>

                    </span>

                    <span class="form-radio-item paddtop">

                        <input class="form-radio" id="ginput_31" name="rgroup5" value="Security" type="radio" style="display:none">

                        <label for="ginput_31" class="form-checkbox-item"><strong><em>Security</em></strong></label>

                        <span class="form-checkbox-item">

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Surveillance Systems & Cameras"> Surveillance Systems & Cameras<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Alarm"> Alarm<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Smart Locks"> Smart Locks<br>

                            <input class="cbox cbox-2" type="checkbox" name="rgroup_cbox[]" value="Other"> Other<br>

                            <input class="form-txt rgroup-cbox-txt-2" name="rgroup_cbox_txt_2" value="" type="text"/>

                        </span>

                    </span>

                    <span class="form-radio-item paddtop">

                        <input class="form-radio" id="ginput_32" name="rgroup5" value="Custom Projects/Next Level Stuff" type="radio"  style="display:none">

                        <label for="ginput_32" class="form-checkbox-item"><strong><em>Custom Projects/Next Level Stuff</em></strong></label>

                        <span class="form-checkbox-item">

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Mirror TVs"> Mirror TVs<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Hidden TV/Art TV"> Hidden TV/Art TV<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Digital Art Wall"> Digital Art Wall<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Motorized Lifts (Projector & TV)"> Motorized Lifts (Projector & TV)<br>

                            <input class="cbox" type="checkbox" name="rgroup_cbox[]" value="Invisible Speakers"> Invisible Speakers<br>

                            <input class="cbox cbox-3" type="checkbox" name="rgroup_cbox[]" value="I gotta idea!"> I got an idea!<br>

                            <input class="form-txt rgroup-cbox-txt-3" name="rgroup_cbox_txt_3" value="" type="text"/>

                        </span>

                    </span>

                    <span class="form-radio-item paddtop" >

                        <input class="form-radio" id="ginput_33" name="rgroup5" value="I'm interested in it all!" type="radio">

                        <label for="ginput_33"><strong>I'm interested in it all!</strong></label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_34" name="rgroup5" value="I Really Dunno" type="radio">

                        <label for="ginput_34"><strong>I Really Dunno?</strong></label>

                    </span>

                </div>

                <div class="group-radio gres">

                    <span class="tgroup"><strong>If my project requires product/equipment:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_35" name="rgroup6" value="I want to buy my own" type="radio">

                        <label for="ginput_35">I want to buy my own</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_36" name="rgroup6" value="I already have it" type="radio">

                        <label for="ginput_36">I already have it</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_37" name="rgroup6" value="Honest can quote/provide me" type="radio">

                        <label for="ginput_37">Honest can quote/provide me</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_38" name="rgroup6" value="N/A" type="radio">

                        <label for="ginput_38">N/A</label>

                    </span>

                </div>

                <div class="group-radio gres">

                    <span class="tgroup"><strong>Website:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_39" name="rgroup7" value="The Honest website is very cool" type="radio">

                        <label for="ginput_39">The Honest website is very cool</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_40" name="rgroup7" value="Site is typical" type="radio">

                        <label for="ginput_40">Site is typical</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_41" name="rgroup7" value="Site needs work" type="radio">

                        <label for="ginput_41">Site needs work</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_42" name="rgroup7" value="Site is terrible" type="radio">

                        <label for="ginput_42">Site is terrible</label>

                    </span>

                </div>

                <div class="group-radio gres">

                    <span class="tgroup"><strong>More to say:</strong></span>

                    <span class="form-radio-item" style="padding-left:0px">

                        <!--<input class="form-radio" id="ginput_43" name="rgroup8" value="Large fill-in field" type="radio">

                        <label for="ginput_43">Large fill-in field</label>
                        
                        <br />
                        -->
                        <textarea class="area-txt" rows="8" name="rgroup8_areatxt"></textarea>

                    </span>

                </div>

                <!-- end Residential-->

                <!-- Commercial-->

                <div class="group-radio gcom">

                    <span class="tgroup"><strong>I found Honest:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_44" name="cgroup" value="Online Search/Google" type="radio">

                        <label for="ginput_44">Online Search/Google</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_45" name="cgroup" value="I'm an Existing Customer (welcome back!)" type="radio">

                        <label for="ginput_45">I'm an Existing Customer (welcome back!)</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_46" name="cgroup" value="Referred by a Cool Person" type="radio">

                        <label for="ginput_46">Referred by a Cool Person</label>

                         <br />

                        <input class="form-txt cgroup-txt-0" type="text" name="cgroup_txt_0" value=""  placeholder="name of person"/>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_47" name="cgroup" value="Yelp" type="radio">

                        <label for="ginput_47">Yelp</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_48" name="cgroup" value="Angies List" type="radio">

                        <label for="ginput_48">Angies List</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_49" name="cgroup" value="Facebook" type="radio">

                        <label for="ginput_49">Facebook</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_50" name="cgroup" value="Customer Lobby" type="radio">

                        <label for="ginput_50">Customer Lobby</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_51" name="cgroup" value="Other" type="radio">

                        <label for="ginput_51">Other</label>

                        <br />

                        <input class="form-txt cgroup-txt-1" type="text" name="cgroup_txt_1" value="" />

                    </span>

                </div>

                <div class="group-radio gcom">

                    <span class="tgroup"><strong>My Facility:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_52" name="cgroup1" value="I need work in one location" type="radio">

                        <label for="ginput_52">I need work in one location</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_53" name="cgroup1" value="I need work in multiple locations" type="radio">

                        <label for="ginput_53">I need work in multiple locations</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_54" name="cgroup1" value="Other" type="radio">

                        <label for="ginput_54">Other</label>

                        <br />

                        <input class="form-txt cgroup-txt1" type="text" name="cgroup1_txt" value="" />

                    </span>

                </div>

                <div class="group-radio gcom">

                    <span class="tgroup"><strong>My Industry:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_55" name="cgroup2" value="Restaurant/Bar" type="radio">

                        <label for="ginput_55">Restaurant/Bar</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_56" name="cgroup2" value="Retail" type="radio">

                        <label for="ginput_56">Retail</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_57" name="cgroup2" value="Office/Corporate" type="radio">

                        <label for="ginput_57">Office/Corporate</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_58" name="cgroup2" value="Medical" type="radio">

                        <label for="ginput_58">Medical</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_59" name="cgroup2" value="Hospitality" type="radio">

                        <label for="ginput_59">Hospitality</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_60" name="cgroup2" value="Other" type="radio">

                        <label for="ginput_60">Other</label>

                        <br />

                        <input class="form-txt cgroup-txt2" type="text" name="cgroup2_txt" value="" />

                    </span>

                </div>

                <div class="group-radio gcom">

                    <span class="tgroup"><strong>Budget:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_61" name="cgroup3" value="Less than $2,500" type="radio">

                        <label for="ginput_61">Less than $2,500</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_62" name="cgroup3" value="$2,500-5,000" type="radio">

                        <label for="ginput_62">$2,500-5,000</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_63" name="cgroup3" value="$5,000-10,000" type="radio">

                        <label for="ginput_63">$5,000-10,000</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_64" name="cgroup3" value="10,000-50,000" type="radio">

                        <label for="ginput_64">10,000-50,000</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_65" name="cgroup3" value="50,000-100K" type="radio">

                        <label for="ginput_65">50,000-100K</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_66" name="cgroup3" value="100K+ (we're sending an armored car right now)" type="radio">

                        <label for="ginput_66">100K+ (we're sending an armored car right now)</label>

                    </span>

                </div>

                <div class="group-radio gcom">

                    <span class="tgroup"><strong>I need a quote/design by:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_67" name="cgroup4" value="ASAP! (like yesterday)" type="radio">

                        <label for="ginput_67">ASAP! (like yesterday)</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_68" name="cgroup4" value="Within 1 Week" type="radio">

                        <label for="ginput_68">Within 1 Week</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_69" name="cgroup4" value="1-2 Weeks" type="radio">

                        <label for="ginput_69">1-2 Weeks</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_70" name="cgroup4" value="3-4 Weeks" type="radio">

                        <label for="ginput_70">3-4 Weeks</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_71" name="cgroup4" value="Not in any hurry" type="radio">

                        <label for="ginput_71">Not in any hurry</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_72" name="cgroup4" value="I Dunno" type="radio">

                        <label for="ginput_72">I Dunno</label>

                    </span>

                </div>

                <div class="group-radio gcom">

                    <span class="tgroup"><strong>I am interested in (check all that interest me):</strong></span>

                    <span class="form-checkbox-item">

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Access Control"> Access Control<br>

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Alarm"> Alarm<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="App-Based Control System"> App-Based Control System<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Cell Signal Amplification Systems"> Cell Signal Amplification Systems<br>

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Audio/Video Conferencing"> Audio/Video Conferencing<br>

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Audio & Sound Systems"> Audio & Sound Systems<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Custom Project(s)"> Custom Project(s)<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Digital/Interactive Menu Boards"> Digital/Interactive Menu Boards<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Digital Signage"> Digital Signage<br>

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Emergency/Panic Systems"> Emergency/Panic Systems<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Motorized Shades/Drapes"> Motorized Shades/Drapes<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Outdoor Audio/Video"> Outdoor Audio/Video<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Productivity & Collaboration Solutions"> Productivity & Collaboration Solutions<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Panic/Threat Emergency Systems"> Panic/Threat Emergency Systems<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Project Design/Consulting"> Project Design/Consulting<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Public Announcement Systems"> Public Announcement Systems<br>

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Restaurant Notification Systems"> Restaurant Notification Systems<br>


                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Smart HVAC/Climate Control"> Smart HVAC/Climate Control<br>

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Smart Lighting Control"> Smart Lighting Control<br>


                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Smart Smoke/CO Detection"> Smart Smoke/CO Detection<br>

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Structured Wiring (includes phone/data)"> Structured Wiring (includes phone/data)<br> <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Structured Wiring (includes phone/data)"> Streaming Sound Systems
<br>

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Surveillance Systems & Cameras"> Surveillance Systems & Cameras<br>

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Telecom Project(s)"> Telecom Project(s)<br>

                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="TV & Projector Install"> TV & Projector Install<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Unified Communications"> Unified Communications<br>



                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Video Walls"> Video Walls<br>
                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Video Walls"> White Noise/Audio Masking Systems<br>




                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="Wi-fi & Networking"> Wi-fi & Networking<br>




                        <input class="cbox" type="checkbox" name="cgroup_cbox[]" value="I'm interested in hearing about it all!"> I'm interested in hearing about it all!<br>

                        <input class="cbox cbox-4" type="checkbox" name="cgroup_cbox[]" value="Other"> Other<br>

                        <input class="form-txt cgroup-cbox-txt-0" name="cgroup_cbox_txt_0" value="" type="text"/>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_73" name="cgroup5" value="I Really Dunno" type="radio">

                        <label for="ginput_73">I Really Dunno</label>

                    </span>

                    

                </div>

                <div class="group-radio gcom">

                    <span class="tgroup"><strong>If my project requires product/equipment:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_74" name="cgroup6" value="I want to buy my own" type="radio">

                        <label for="ginput_74">I want to buy my own</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_75" name="cgroup6" value="I already have it" type="radio">

                        <label for="ginput_75">I already have it</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_76" name="cgroup6" value="Honest can quote/provide me" type="radio">

                        <label for="ginput_76">Honest can quote/provide me</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_77" name="cgroup6" value="N/A" type="radio">

                        <label for="ginput_77">N/A</label>

                    </span>

                </div>

                <div class="group-radio gcom">

                    <span class="tgroup"><strong>Website:</strong></span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_78" name="cgroup7" value="The Honest website is very cool" type="radio">

                        <label for="ginput_78">The Honest website is very cool</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_79" name="cgroup7" value="Site is typical" type="radio">

                        <label for="ginput_79">Site is typical</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_80" name="cgroup7" value="Site needs work" type="radio">

                        <label for="ginput_80">Site needs work</label>

                    </span>

                    <span class="form-radio-item">

                        <input class="form-radio" id="ginput_81" name="cgroup7" value="Site is terrible" type="radio">

                        <label for="ginput_81">Site is terrible</label>

                    </span>

                </div>

                <div class="group-radio gcom">

                    <span class="tgroup"><strong>More to say:</strong></span>

                    <span class="form-radio-item">

                        <!--<input class="form-radio" id="ginput_82" name="cgroup8" value="Large fill-in field" type="radio">

                        <label for="ginput_82">Large fill-in field</label>
                        
                        <br />
                        -->
                        <textarea class="area-txt" rows="8" name="cgroup8_areatxt"></textarea>

                    </span>

                </div>

                

                <!-- end Commercial-->
                <div class="group">
                    <div class="g-recaptcha" data-sitekey="6LfRrhAUAAAAAIOGgqXq8QoedkexlZKiFMIc9FlK"></div>
                </div>

                <div class="btn-submit">

                    <input type="submit" value="Send to honest" name="submit-form"/>

                </div>

                

            </form>

        </div>

</div>
