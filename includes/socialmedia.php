<style>
    #BackgroundImage{position: fixed; bottom:105px; right:0px; z-index: 9999;}
    #contact .error{
        color: red;
    }
    .ui-dialog { z-index: 1000 !important ;}
    /* ----------- dialog-form ----------- */
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
    #dialog-form input{
        float:left;
        font-size:12px;
        padding:4px 2px;
        border:solid 1px #aacfe4;
        width:290px;
        margin:2px 0 20px 10px;
    }

    #dialog-form textarea{
        float:left;
        font-size:12px;
        padding:4px 2px;
        border:solid 1px #aacfe4;
        width:290px;
        margin:2px 0 20px 10px;
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
</style>
<div id="BackgroundImage">
    <a href="https://www.facebook.com/pages/Honest-Install/122796624447624" target="_blank"><img src="images/fb.png" alt="Facebook" title="Facebook" width="30" height="30"/></a><br/><br/>
    <a href="https://twitter.com/HonestInstall" target="_blank"><img src="images/Twitter.png" width="30" height="30" title="Twitter" /></a><br/><br/>
    <a href="https://www.linkedin.com/company/honest-install" target="_blank"><img src="images/Linked-In.png" width="30" height="30" title="Linked In" /></a><br/><br/>
    <a href="/custreviews.php"><img src="images/angieslist.png" height="30" width="30" title="Customer Reviews" /></a><br/><br/>
    <a href="/yelp.php" ><img src="images/yelp.png" width="30" height="30" title="Yelp" /></a><br/><br/>
    <a href="http://www.pinterest.com/honestinstall/"  target="_blank"><img src="images/Pinterest.png" width="30" height="30" title="Pinterest" /></a><br/><br/>
    <a href="http://instagram.com/honestinstall" target="_blank" ><img src="images/Instagram.png" width="30" height="30" title="Instagram" /></a><br/>

    <a class="fancybox" id="email-user" href="http://www.honestinstall.com/email_friend.php?p=<?php echo $_SERVER['PHP_SELF']; ?>" onclick="window.open(this.href, 'mywin', 'left=20,top=20,width=500,height=500,toolbar=0,resizable=0,scrollbars=0,location=0'); return false;"><img src="images/email.png" height="45" width="45"style="padding-top:4px" title="Email to a friend" /></a><br/>
    <a href="#" onClick="window.print();"><img src="images/print.png" height="30" width="30" style="padding-top:4px" title="Print" /></a><br/><br/>
    <a href="https://plus.google.com/111022148843598790482/about" target="_blank"><img src="images/gplus.png" height="30" width="30" title="Google Plus" /></a><br/><br/>
    <a href="http://www.houzz.com/pro/honestinstallav/honest-install" target="_blank"><img src="images/houzz.png" height="30" width="30" title="Houzz" /></a><br/><br/>
</div>