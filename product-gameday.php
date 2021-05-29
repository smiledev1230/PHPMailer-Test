<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Super Sunday Specials - Honest Install - TV INSTALLATION, HOME THEATER & AUDIO/VIDEO - Dallas, Texas</TITLE>
<META content="text/html; charset=iso-8859-1" http-equiv=Content-Type><LINK 
rel=stylesheet type=text/css href="honestinstall.css">
<SCRIPT type=text/JavaScript>
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
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}














//-->
</SCRIPT>

<SCRIPT language=JavaScript type=text/javascript 
src="scripts/checkfieldsproduct.js"></SCRIPT>

<META name=GENERATOR content="MSHTML 8.00.6001.19170">
<STYLE type=text/css>A:link {
	COLOR: #808080
}
A:visited {
	COLOR: #808080
}
A:hover {
	COLOR: #ffcc00
}
</STYLE>
<!--[if lte IE 9]>
<STYLE type=text/css>.prodboxbg {
	WIDTH: 730px
}
.txtheight {
	HEIGHT: 88px
}
</STYLE>
<LINK rel=stylesheet type=text/css href="all-ie-only.css"><![endif]--><!-- css !-->
<STYLE type=text/css media=screen>@import url( css/style.css );
</STYLE>
<!-- eof css !--><!-- Beginning of compulsory code below --><LINK rel=stylesheet 
type=text/css href="css/dropdown/dropdown.css" media=screen><LINK rel=stylesheet 
type=text/css href="css/dropdown/themes/drop/default.advanced.css" media=screen><!--[if lt IE 7]>
<script type="text/javascript" src="js/jquery/jquery.js"></script>
<script type="text/javascript" src="js/jquery/jquery.dropdown.js"></script>
<![endif]--><!-- / END --><!-- if IE !--><!--[if IE 7]><LINK rel=stylesheet 
type=text/css href="css/ie.css"><![endif]--><!--[if gte IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]--><!-- eof if IE !-->
<SCRIPT type=text/javascript>
function resetme(){
window.scrollTo(0,0);
document.forms["serviceform"].reset();
}
</SCRIPT>
</HEAD>
<BODY onload=resetme()><?php $menu="products"; include("includes/menu2.php"); ?>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=850 align=center>
  <TBODY>
  <TR vAlign=top>
    <TD class=mainBG><BR><BR>
      <TABLE border=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD><FONT size=4><STRONG><FONT face=Arial>Super Sunday 
            Specials</FONT></STRONG></FONT></TD>
          <TD align=right><FONT size=4><FONT face=Arial>from 
            $199.00</FONT></FONT></TD></TR></TBODY></TABLE>
      <DIV class=rndbg>
      <DIV align=center><IMG src="images/gameday.png" width=746><IMG 
      src="images/fadeline.jpg" width=746><BR>
      <SCRIPT type=text/javascript>
//######################################################################################
// Author: ricocheting.com
// Version: v2.0
// Date: 2011-03-31
// Description: displays the amount of time until the "dateFuture" entered below.

// NOTE: the month entered must be one less than current month. ie; 0=January, 11=December
// NOTE: the hour is in 24 hour format. 0=12am, 15=3pm etc
// format: dateFuture1 = new Date(year,month-1,day,hour,min,sec)
// example: dateFuture1 = new Date(2003,03,26,14,15,00) = April 26, 2003 - 2:15:00 pm

dateFuture1 = new Date(2012,0,31,0,0,0);

// TESTING: comment out the line below to print out the "dateFuture" for testing purposes
//document.write(dateFuture +"<br />");


//###################################
//nothing beyond this point
function GetCount(ddate,iid){

	dateNow = new Date();	//grab current date
	amount = ddate.getTime() - dateNow.getTime();	//calc milliseconds between dates
	delete dateNow;

	// if time is already past
	if(amount < 0){
		document.getElementById(iid).innerHTML="Now!";
	}
	// else date is still good
	else{
		days=0;hours=0;mins=0;secs=0;out="";

		amount = Math.floor(amount/1000);//kill the "milliseconds" so just secs

		days=Math.floor(amount/86400);//days
		amount=amount%86400;

		hours=Math.floor(amount/3600);//hours
		amount=amount%3600;

		mins=Math.floor(amount/60);//minutes
		amount=amount%60;

		secs=Math.floor(amount);//seconds

		if(days != 0){out += days +" "+((days==1)?"day":"days")+", ";}
		if(hours != 0){out += hours +":";}
		out += mins +":";
		out += secs +" "+((secs==1)?"":"")+", ";
		out = out.substr(0,out.length-2);
		document.getElementById(iid).innerHTML='Deals Expires on:  01-31-12 - <strong>' + out +'</strong> - Limited Appointments Available';

		setTimeout(function(){GetCount(ddate,iid)}, 1000);
	}
}

window.onload=function(){
	GetCount(dateFuture1, 'countbox1');
	//you can add additional countdowns here (just make sure you create dateFuture2 and countbox2 etc for each)
};
</SCRIPT>

      <DIV 
      style="PADDING-BOTTOM: 10px; LINE-HEIGHT: 25px; PADDING-LEFT: 10px; PADDING-RIGHT: 10px; FONT-SIZE: 16px; PADDING-TOP: 10px" 
      id=countbox1></DIV></DIV>
      <DIV class=proddetail>
      <TABLE class=pd border=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD vAlign=top>
            <H4><BR>Details</H4><STRONG></STRONG>
            <P><STRONG>Is your place ready for Super Sunday? If not let Honest 
            get you up to speed so your game day will be awesome. <BR>From TV 
            mounting to superior surround sound we have the deal for 
            you:<BR></STRONG><BR><STRONG><U><FONT size=4>Deal #1: 
            <BR></FONT></U></STRONG>(two choices) </P>
            <P><STRONG>Basic TV Mounting $199 <BR></STRONG><FONT 
            size=2>(Reg.&nbsp;Price <FONT color=#808080><STRIKE><FONT 
            name="MS Sans Serif">$249.00</FONT></STRIKE>)</FONT></FONT></P>
            <P>-Mounting of any TV up to 60” (with customer provided 
            bracket)<BR>-2 FREE HDMI cables (two 6ft or one 12ft)<BR>-Conceal 
            wires, external to wall, in paintable cable conduit<BR>-Setup &amp; 
            configure components/devices<BR>-Customer tutorial &amp; 
            education</P>
            <P><STRONG>Premium TV Mounting w/ Wire Concealment $399 
            <BR></STRONG><FONT size=2>(Reg.&nbsp;Price </FONT><FONT size=2><FONT 
            color=#808080><STRIKE><FONT 
            name="MS Sans Serif">$517.00</FONT></STRIKE>)<BR></FONT><BR></FONT>-Mounting 
            of any TV up to 60” <BR>-2 FREE HDMI cables (two 6ft or one 
            12ft)<BR>-Premium Tilt Bracket<BR>-In-Wall Wire Concealment with 
            Electrical Outlet*<BR>-Setup &amp; configure 
            components/devices<BR>-Customer tutorial &amp; education</P>
            <P><FONT size=1>*Basic wire concealment is from TV area, straight 
            down below, to component area, max distance of 
            10ft.<BR></FONT><BR><STRONG><U><FONT size=4>Deal #2: 
            </FONT></U></STRONG></P>
            <P><STRONG>Surround Sound Installation $299</STRONG></P>
            <P>-Installation of customer provided 5.1 speaker system 
            <BR>-In-wall wiring or wires concealed utilizing best 
            methods<BR>(for pre-wired homes deduct -$49)<BR>-Setup &amp; 
            configuration of A/V receiver and connection to<BR>other 
            components/sources <BR>-Customer tutorial &amp; education<BR>-For 
            7.1 system add $100</P>
            <P><FONT size=4><STRONG><U>Deal #3:</U></STRONG> </FONT></P>
            <P><STRONG>5.1 Surround Sound Bundle $995 + Install*</STRONG></P>
            <P>-Onkyo brand 5.1 stereo receiver HD capable (dual zone stereo add 
            $199) <BR>-Two pair (four) premium flush mount, in ceiling round 
            speakers<BR>-Center channel speaker (choice of flush mounted or 
            external) <BR>-Premium 8" Subwoofer <BR>-iPod/iPhone/MP3 
            Cable<BR>-Yellow Glove protection: our equivalent to white glove 
            service; 30 day guarantee on equipment (same as a traditional retail 
            store) but <BR>&nbsp;should an issue arise with your electronics no 
            trip back to the store, we come to you.</P>
            <P><FONT size=1>*must be purchased with installation: Surround Sound 
            Installation $299&nbsp; 
      </FONT></P></TD></TR></TBODY></TABLE></DIV></DIV><IMG 
      src="../../../../../images/bottomround.jpg"> 
      <DIV class=formbox>
      <H4>Schedule It or Ask a Question</H4>
      <FORM onSubmit="return CheckRequiredFields()" method=post name=serviceform 
      action=/scripts/serviceform.php>
      <TABLE border=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD width=166>
            <TABLE>
              <TBODY>
              <TR>
                <TD class=contactFormSpacing><INPUT value="I have a question" 
                  type=radio name=Subject> &nbsp;&nbsp;<LABEL><STRONG>I have a 
                  question</STRONG></LABEL></TD></TR></TBODY></TABLE></TD>
          <TD width=240>
            <TABLE>
              <TBODY>
              <TR>
                <TD class=contactFormSpacing><INPUT 
                  value="I want to schedule service" type=radio 
                  name=Subject>&nbsp;&nbsp;<STRONG>I want to schedule 
                  service</STRONG></TD></TR></TBODY></TABLE></TD>
          <TD><STRONG>Phone</STRONG> <SPAN style="COLOR: #0aa0fe">*</SPAN> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <INPUT style="WIDTH: 243px" 
            name=phone></TD></TR>
        <TR>
          <TD vAlign=top colSpan=2>
            <TABLE border=0 cellPadding=0 width="100%">
              <TBODY>
              <TR vAlign=top>
                <TD style="PADDING-TOP: 30px" vAlign=top><STRONG>Full 
                  Name</STRONG> <SPAN style="COLOR: #0aa0fe">*</SPAN></TD>
                <TD style="PADDING-TOP: 30px"><INPUT style="WIDTH: 240px" 
                  name=realname></TD></TR>
              <TR>
                <TD style="PADDING-TOP: 30px"><STRONG>Company/Org.</STRONG></TD>
                <TD style="PADDING-TOP: 30px"><INPUT style="WIDTH: 240px" 
                  name=Company></TD></TR>
              <TR>
                <TD style="PADDING-TOP: 30px"><STRONG>Email</STRONG> <SPAN 
                  style="COLOR: #0aa0fe">*</SPAN></TD>
                <TD style="PADDING-TOP: 30px"><INPUT style="WIDTH: 240px" 
                  name=email></TD></TR></TBODY></TABLE></TD>
          <TD vAlign=top><BR><BR><TEXTAREA class=txtheight onClick="document.serviceform.Comments.value='';" rows=15 cols=36 name=Comments>Comments</TEXTAREA><BR><BR><INPUT 
            value=http://honestinstall.com/thanks.php type=hidden name=redirect> 
            <INPUT value=phone,realname,email type=hidden name=required> <INPUT 
            value=service type=hidden name=recipient> <INPUT 
            value="Super Sunday Specials Inquiry" type=hidden name=subject> 
            <INPUT value=Submit alt=Submit src="images/submit.jpg" 
        type=image></TD></TR></TBODY></TABLE></FORM></DIV><BR><BR><BR>
      <P class=bottomText align=center><!--Start Customer Lobby--><A 
      onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" 
      href="http://www.customerlobby.com/reviews/403/honest-install/" 
      target=_blank><IMG style="DISPLAY: none" border=0 alt=Statistics 
      src="http://www.customerlobby.com/ctrack-403"><IMG border=0 
      alt="Review of Honest Install" 
      src="http://www.customerlobby.com/img/403/standard/"></A><!--End Customer Lobby--> 
      <BR><BR>SCHEDULE SERVICE NOW!<STRONG>&nbsp; 
      972-470-3528<BR><BR></STRONG>E-Mail us Directly: <A 
      title="E-Mail Honest Install" 
      href="mailto:info@HonestInstall.com"><STRONG>info@HonestInstall.com</STRONG></A></P>
      <P class=bottomText align=center><A href="contact.php"><STRONG>Schedule 
      Service/Inquiry Form</STRONG></A></P>
    </TD></TR></TBODY></TABLE><?php require("footer.php"); ?></BODY></HTML>
