<?php
require_once( dirname(__FILE__).'/form.lib.php' );

define( 'PHPFMG_USER', "suyadi@gmail.com" ); // must be a email address. for sending password to you.
define( 'PHPFMG_PW', "5d9c33" );

?>
<?php
/**
 * GNU Library or Lesser General Public License version 2.0 (LGPLv2)
*/

# main
# ------------------------------------------------------
error_reporting( E_ERROR ) ;
phpfmg_admin_main();
# ------------------------------------------------------




function phpfmg_admin_main(){
    $mod  = isset($_REQUEST['mod'])  ? $_REQUEST['mod']  : '';
    $func = isset($_REQUEST['func']) ? $_REQUEST['func'] : '';
    $function = "phpfmg_{$mod}_{$func}";
    if( !function_exists($function) ){
        phpfmg_admin_default();
        exit;
    };

    // no login required modules
    $public_modules   = false !== strpos('|captcha|', "|{$mod}|", "|ajax|");
    $public_functions = false !== strpos('|phpfmg_ajax_submit||phpfmg_mail_request_password||phpfmg_filman_download||phpfmg_image_processing||phpfmg_dd_lookup|', "|{$function}|") ;   
    if( $public_modules || $public_functions ) { 
        $function();
        exit;
    };
    
    return phpfmg_user_isLogin() ? $function() : phpfmg_admin_default();
}

function phpfmg_ajax_submit(){
    $phpfmg_send = phpfmg_sendmail( $GLOBALS['form_mail'] );
    $isHideForm  = isset($phpfmg_send['isHideForm']) ? $phpfmg_send['isHideForm'] : false;

    $response = array(
        'ok' => $isHideForm,
        'error_fields' => isset($phpfmg_send['error']) ? $phpfmg_send['error']['fields'] : '',
        'OneEntry' => isset($GLOBALS['OneEntry']) ? $GLOBALS['OneEntry'] : '',
    );
    
    @header("Content-Type:text/html; charset=$charset");
    echo "<html><body><script>
    var response = " . json_encode( $response ) . ";
    try{
        parent.fmgHandler.onResponse( response );
    }catch(E){};
    \n\n";
    echo "\n\n</script></body></html>";

}


function phpfmg_admin_default(){
    if( phpfmg_user_login() ){
        phpfmg_admin_panel();
    };
}



function phpfmg_admin_panel()
{    
    phpfmg_admin_header();
    phpfmg_writable_check();
?>    
<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td valign=top style="padding-left:280px;">

<style type="text/css">
    .fmg_title{
        font-size: 16px;
        font-weight: bold;
        padding: 10px;
    }
    
    .fmg_sep{
        width:32px;
    }
    
    .fmg_text{
        line-height: 150%;
        vertical-align: top;
        padding-left:28px;
    }

</style>

<script type="text/javascript">
    function deleteAll(n){
        if( confirm("Are you sure you want to delete?" ) ){
            location.href = "admin.php?mod=log&func=delete&file=" + n ;
        };
        return false ;
    }
</script>


<div class="fmg_title">
    1. Email Traffics
</div>
<div class="fmg_text">
    <a href="admin.php?mod=log&func=view&file=1">view</a> &nbsp;&nbsp;
    <a href="admin.php?mod=log&func=download&file=1">download</a> &nbsp;&nbsp;
    <?php 
        if( file_exists(PHPFMG_EMAILS_LOGFILE) ){
            echo '<a href="#" onclick="return deleteAll(1);">delete all</a>';
        };
    ?>
</div>


<div class="fmg_title">
    2. Form Data
</div>
<div class="fmg_text">
    <a href="admin.php?mod=log&func=view&file=2">view</a> &nbsp;&nbsp;
    <a href="admin.php?mod=log&func=download&file=2">download</a> &nbsp;&nbsp;
    <?php 
        if( file_exists(PHPFMG_SAVE_FILE) ){
            echo '<a href="#" onclick="return deleteAll(2);">delete all</a>';
        };
    ?>
</div>

<div class="fmg_title">
    3. Form Generator
</div>
<div class="fmg_text">
    <a href="http://www.formmail-maker.com/generator.php" onclick="document.frmFormMail.submit(); return false;" title="<?php echo htmlspecialchars(PHPFMG_SUBJECT);?>">Edit Form</a> &nbsp;&nbsp;
    <a href="http://www.formmail-maker.com/generator.php" >New Form</a>
</div>
    <form name="frmFormMail" action='http://www.formmail-maker.com/generator.php' method='post' enctype='multipart/form-data'>
    <input type="hidden" name="uuid" value="<?php echo PHPFMG_ID; ?>">
    <input type="hidden" name="external_ini" value="<?php echo function_exists('phpfmg_formini') ?  phpfmg_formini() : ""; ?>">
    </form>

		</td>
	</tr>
</table>

<?php
    phpfmg_admin_footer();
}



function phpfmg_admin_header( $title = '' ){
    header( "Content-Type: text/html; charset=" . PHPFMG_CHARSET );
?>
<html>
<head>
    <title><?php echo '' == $title ? '' : $title . ' | ' ; ?>PHP FormMail Admin Panel </title>
    <meta name="keywords" content="PHP FormMail Generator, PHP HTML form, send html email with attachment, PHP web form,  Free Form, Form Builder, Form Creator, phpFormMailGen, Customized Web Forms, phpFormMailGenerator,formmail.php, formmail.pl, formMail Generator, ASP Formmail, ASP form, PHP Form, Generator, phpFormGen, phpFormGenerator, anti-spam, web hosting">
    <meta name="description" content="PHP formMail Generator - A tool to ceate ready-to-use web forms in a flash. Validating form with CAPTCHA security image, send html email with attachments, send auto response email copy, log email traffics, save and download form data in Excel. ">
    <meta name="generator" content="PHP Mail Form Generator, phpfmg.sourceforge.net">

    <style type='text/css'>
    body, td, label, div, span{
        font-family : Verdana, Arial, Helvetica, sans-serif;
        font-size : 12px;
    }
    </style>
</head>
<body  marginheight="0" marginwidth="0" leftmargin="0" topmargin="0">

<table cellspacing=0 cellpadding=0 border=0 width="100%">
    <td nowrap align=center style="background-color:#024e7b;padding:10px;font-size:18px;color:#ffffff;font-weight:bold;width:250px;" >
        Form Admin Panel
    </td>
    <td style="padding-left:30px;background-color:#86BC1B;width:100%;font-weight:bold;" >
        &nbsp;
<?php
    if( phpfmg_user_isLogin() ){
        echo '<a href="admin.php" style="color:#ffffff;">Main Menu</a> &nbsp;&nbsp;' ;
        echo '<a href="admin.php?mod=user&func=logout" style="color:#ffffff;">Logout</a>' ;
    }; 
?>
    </td>
</table>

<div style="padding-top:28px;">

<?php
    
}


function phpfmg_admin_footer(){
?>

</div>

<div style="color:#cccccc;text-decoration:none;padding:18px;font-weight:bold;">
	:: <a href="http://phpfmg.sourceforge.net" target="_blank" title="Free Mailform Maker: Create read-to-use Web Forms in a flash. Including validating form with CAPTCHA security image, send html email with attachments, send auto response email copy, log email traffics, save and download form data in Excel. " style="color:#cccccc;font-weight:bold;text-decoration:none;">PHP FormMail Generator</a> ::
</div>

</body>
</html>
<?php
}


function phpfmg_image_processing(){
    $img = new phpfmgImage();
    $img->out_processing_gif();
}


# phpfmg module : captcha
# ------------------------------------------------------
function phpfmg_captcha_get(){
    $img = new phpfmgImage();
    $img->out();
    //$_SESSION[PHPFMG_ID.'fmgCaptchCode'] = $img->text ;
    $_SESSION[ phpfmg_captcha_name() ] = $img->text ;
}



function phpfmg_captcha_generate_images(){
    for( $i = 0; $i < 50; $i ++ ){
        $file = "$i.png";
        $img = new phpfmgImage();
        $img->out($file);
        $data = base64_encode( file_get_contents($file) );
        echo "'{$img->text}' => '{$data}',\n" ;
        unlink( $file );
    };
}


function phpfmg_dd_lookup(){
    $paraOk = ( isset($_REQUEST['n']) && isset($_REQUEST['lookup']) && isset($_REQUEST['field_name']) );
    if( !$paraOk )
        return;
        
    $base64 = phpfmg_dependent_dropdown_data();
    $data = @unserialize( base64_decode($base64) );
    if( !is_array($data) ){
        return ;
    };
    
    
    foreach( $data as $field ){
        if( $field['name'] == $_REQUEST['field_name'] ){
            $nColumn = intval($_REQUEST['n']);
            $lookup  = $_REQUEST['lookup']; // $lookup is an array
            $dd      = new DependantDropdown(); 
            echo $dd->lookupFieldColumn( $field, $nColumn, $lookup );
            return;
        };
    };
    
    return;
}


function phpfmg_filman_download(){
    if( !isset($_REQUEST['filelink']) )
        return ;
        
    $info =  @unserialize(base64_decode($_REQUEST['filelink']));
    if( !isset($info['recordID']) ){
        return ;
    };
    
    $file = PHPFMG_SAVE_ATTACHMENTS_DIR . $info['recordID'] . '-' . $info['filename'];
    phpfmg_util_download( $file, $info['filename'] );
}


class phpfmgDataManager
{
    var $dataFile = '';
    var $columns = '';
    var $records = '';
    
    function phpfmgDataManager(){
        $this->dataFile = PHPFMG_SAVE_FILE; 
    }
    
    function parseFile(){
        $fp = @fopen($this->dataFile, 'rb');
        if( !$fp ) return false;
        
        $i = 0 ;
        $phpExitLine = 1; // first line is php code
        $colsLine = 2 ; // second line is column headers
        $this->columns = array();
        $this->records = array();
        $sep = chr(0x09);
        while( !feof($fp) ) { 
            $line = fgets($fp);
            $line = trim($line);
            if( empty($line) ) continue;
            $line = $this->line2display($line);
            $i ++ ;
            switch( $i ){
                case $phpExitLine:
                    continue;
                    break;
                case $colsLine :
                    $this->columns = explode($sep,$line);
                    break;
                default:
                    $this->records[] = explode( $sep, phpfmg_data2record( $line, false ) );
            };
        }; 
        fclose ($fp);
    }
    
    function displayRecords(){
        $this->parseFile();
        echo "<table border=1 style='width=95%;border-collapse: collapse;border-color:#cccccc;' >";
        echo "<tr><td>&nbsp;</td><td><b>" . join( "</b></td><td>&nbsp;<b>", $this->columns ) . "</b></td></tr>\n";
        $i = 1;
        foreach( $this->records as $r ){
            echo "<tr><td align=right>{$i}&nbsp;</td><td>" . join( "</td><td>&nbsp;", $r ) . "</td></tr>\n";
            $i++;
        };
        echo "</table>\n";
    }
    
    function line2display( $line ){
        $line = str_replace( array('"' . chr(0x09) . '"', '""'),  array(chr(0x09),'"'),  $line );
        $line = substr( $line, 1, -1 ); // chop first " and last "
        return $line;
    }
    
}
# end of class



# ------------------------------------------------------
class phpfmgImage
{
    var $im = null;
    var $width = 73 ;
    var $height = 33 ;
    var $text = '' ; 
    var $line_distance = 8;
    var $text_len = 4 ;

    function phpfmgImage( $text = '', $len = 4 ){
        $this->text_len = $len ;
        $this->text = '' == $text ? $this->uniqid( $this->text_len ) : $text ;
        $this->text = strtoupper( substr( $this->text, 0, $this->text_len ) );
    }
    
    function create(){
        $this->im = imagecreate( $this->width, $this->height );
        $bgcolor   = imagecolorallocate($this->im, 255, 255, 255);
        $textcolor = imagecolorallocate($this->im, 0, 0, 0);
        $this->drawLines();
        imagestring($this->im, 5, 20, 9, $this->text, $textcolor);
    }
    
    function drawLines(){
        $linecolor = imagecolorallocate($this->im, 210, 210, 210);
    
        //vertical lines
        for($x = 0; $x < $this->width; $x += $this->line_distance) {
          imageline($this->im, $x, 0, $x, $this->height, $linecolor);
        };
    
        //horizontal lines
        for($y = 0; $y < $this->height; $y += $this->line_distance) {
          imageline($this->im, 0, $y, $this->width, $y, $linecolor);
        };
    }
    
    function out( $filename = '' ){
        if( function_exists('imageline') ){
            $this->create();
            if( '' == $filename ) header("Content-type: image/png");
            ( '' == $filename ) ? imagepng( $this->im ) : imagepng( $this->im, $filename );
            imagedestroy( $this->im ); 
        }else{
            $this->out_predefined_image(); 
        };
    }

    function uniqid( $len = 0 ){
        $md5 = md5( uniqid(rand()) );
        return $len > 0 ? substr($md5,0,$len) : $md5 ;
    }
    
    function out_predefined_image(){
        header("Content-type: image/png");
        $data = $this->getImage(); 
        echo base64_decode($data);
    }
    
    // Use predefined captcha random images if web server doens't have GD graphics library installed  
    function getImage(){
        $images = array(
			'10A1' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZUlEQVR4nGNYhQEaGAYTpIn7GB0YAhimMLQii7E6MIYwhDJMRRYTdWBtZXR0CEXVK9Lo2hAA0wt20sqsaStTV0UtRXYfmjqEWCi6GGsrK4Y6xhB0MdEQhgCgWGjAIAg/KkIs7gMAl1bJprG+IesAAAAASUVORK5CYII=',
			'5CE7' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7QkMYQ1lDHUNDkMQCGlgbXYG0CIqYSAO6WGCASAMrWA7hvrBp01YtDV21MgvZfa1gda0oNkPEpiCLBbSC7QhAFhOZAnILowOyGGsA2M0oYgMVflSEWNwHAGJMy/RtCcAnAAAAAElFTkSuQmCC',
			'88AC' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7WAMYQximMEwNQBITmcLayhDKECCCJBbQKtLo6OjowIKmjrUh0AHZfUujVoYtXRWZhew+NHVw81xDsYgB1WHaEYDiFpCbgWIobh6o8KMixOI+AOo7zDyc5A+kAAAAAElFTkSuQmCC',
			'1FE8' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWUlEQVR4nGNYhQEaGAYTpIn7GB1EQ11DHaY6IImxOog0sDYwBAQgiYmCxRiBJLJeFHVgJ63Mmhq2NHTV1Cwk9zFiMY8Rp3l47YC4JQQohubmgQo/KkIs7gMA3rfIvz34saAAAAAASUVORK5CYII=',
			'AC25' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdElEQVR4nGNYhQEaGAYTpIn7GB0YQxlCGUMDkMRYA1gbHR0dHZDViUwRaXBtCEQRC2gVAZKBrg5I7otaOm3VqpWZUVFI7gOrawWagaQ3NBTIm4IqBlLnEMDogCoGdIsDQ0AAihhjKGtowFSHQRB+VIRY3AcAmNfMF9tkz+wAAAAASUVORK5CYII=',
			'9D5C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7WANEQ1hDHaYGIImJTBFpZW1gCBBBEgtoFWl0bWB0YEEXm8rogOy+aVOnrUzNzMxCdh+rq0ijQ0OgA4rNrZhiAmA7AlHsALmF0dEBxS0gNzOEMqC4eaDCj4oQi/sAkcvLnmDmzO8AAAAASUVORK5CYII=',
			'7BE6' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7QkNFQ1hDHaY6IIu2irSyNjAEBKCKNbo2MDoIIItNAaljdEBxX9TUsKWhK1OzkNzH6ABWh2IeawPEPBEkMREsYgENmG4JaMDi5gEKPypCLO4DANTTy0G6PRIjAAAAAElFTkSuQmCC',
			'36D6' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYElEQVR4nGNYhQEaGAYTpIn7RAMYQ1hDGaY6IIkFTGFtZW10CAhAVtkq0sjaEOgggCw2RaQBJIbsvpVR08KWropMzUJ23xTRVqA6DPNcgXpFCIhhcws2Nw9U+FERYnEfADvZzFUcdq60AAAAAElFTkSuQmCC',
			'4465' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcklEQVR4nM2QsQ2AMAwE7cIbwD5Okd5IccM0brJBwgYpYEpE5wAlSPnvTrZ0ejgeMRip//gVyKCo4lmCiiGwv8MEStYzKhjJMLLz27bWWt3X1flJmTIFtsn9qs4aTTp2uZAtfGcYWOTGQKHyCPt91xe/E/tmysfK8AObAAAAAElFTkSuQmCC',
			'C67A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcElEQVR4nGNYhQEaGAYTpIn7WEMYQ1hDA1qRxURaWYH8gKkOSGIBjSKNQDIgAFmsQaSBodHRQQTJfVGrpoWtWroyaxqS+wIaRFsZpjDC1MH0NjoEMIaGoNnh6ICqDuQW1gZUMbCb0cQGKvyoCLG4DwA1T8vbo9iUngAAAABJRU5ErkJggg==',
			'DC42' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7QgMYQxkaHaY6IIkFTGFtdGh1CAhAFmsVaXCY6ugggibGEOjQIILkvqil01atzMxaFYXkPpA6oImNDmh6WUMDWhnQ7Wh0mMKA7pZGhwBMNzuGhgyC8KMixOI+AKi1z7IkjFmVAAAAAElFTkSuQmCC',
			'CDEF' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAVUlEQVR4nGNYhQEaGAYTpIn7WENEQ1hDHUNDkMREWkVaWRsYHZDVBTSKNLqiizWgiIGdFLVq2srU0JWhWUjuQ1OHWwyLHdjcAnUzithAhR8VIRb3AQAPPMpcQfffiAAAAABJRU5ErkJggg==',
			'54AE' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7QkMYWhmmMIYGIIkB2VMZQhkdGFDFQhkdHVHEAgMYXVkbAmFiYCeFTVu6dOmqyNAsZPe1irQiqYOKiYa6hqKKBbQyYKgTmYIpxhoAFkNx80CFHxUhFvcBAPHhyoakX9TZAAAAAElFTkSuQmCC',
			'39C0' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYUlEQVR4nGNYhQEaGAYTpIn7RAMYQxhCHVqRxQKmsLYyOgRMdUBW2SrS6NogEBCALDYFJMboIILkvpVRS5emrlqZNQ3ZfVMYA5HUQc1jaMQUY8GwA5tbsLl5oMKPihCL+wAQgMwRGLTVyQAAAABJRU5ErkJggg==',
			'681E' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYklEQVR4nGNYhQEaGAYTpIn7WAMYQximMIYGIImJTGFtZQhhdEBWF9Ai0uiILtYAVDcFLgZ2UmTUyrBV01aGZiG5L2QKijqI3laRRgcixESw6AW5mTHUEcXNAxV+VIRY3AcAOX/J8ImpCwwAAAAASUVORK5CYII=',
			'1D68' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYElEQVR4nGNYhQEaGAYTpIn7GB1EQxhCGaY6IImxOoi0Mjo6BAQgiYk6iDS6Njg6iKDoBYkxwNSBnbQya9rK1KmrpmYhuQ+sDs08iN5ALOZhiGG6JQTTzQMVflSEWNwHALPDykfGrF/aAAAAAElFTkSuQmCC',
			'D5BA' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7QgNEQ1lDGVqRxQKmiDSwNjpMdUAWawWKNQQEBKCKhbA2OjqIILkvaunUpUtDV2ZNQ3JfQCtDoytCHUKsITA0BNU8kBiquimsraxoekMDGENYQxlRxAYq/KgIsbgPANIzzipxg4djAAAAAElFTkSuQmCC',
			'838D' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWUlEQVR4nGNYhQEaGAYTpIn7WANYQxhCGUMdkMREpoi0Mjo6OgQgiQW0MjS6NgQ6iKCoYwCrE0Fy39KoVWGrQldmTUNyH5o6nOZhtwPTLdjcPFDhR0WIxX0AtyTLFCVrVdIAAAAASUVORK5CYII=',
			'112D' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZUlEQVR4nGNYhQEaGAYTpIn7GB0YAhhCGUMdkMRYHRgDGB0dHQKQxEQdWANYGwIdRND1IsTATlqZtSpq1crMrGlI7gOra2XE1DsFi1gAphijAyOqW0JYQ1lDA1HcPFDhR0WIxX0Am4TFTn5898oAAAAASUVORK5CYII=',
			'C79D' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7WENEQx1CGUMdkMREWhkaHR0dHQKQxAIaGRpdGwIdRJDFGhhaWRFiYCdFrVo1bWVmZNY0JPcB1QUwhKDrZXRgQDevkbWBEU1MpFWkgRHNLawhQBVobh6o8KMixOI+AG1dy3M5oQu5AAAAAElFTkSuQmCC',
			'52F3' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7QkMYQ1hDA0IdkMQCGlhbWRsYHQJQxEQaXYG0CJJYYAADWCwAyX1h01YtXRq6amkWsvtaGaawItTBxAJY0cwLaGV0QBcTAepEdwtrgGgo0F4UNw9U+FERYnEfAI4gzEJXQMd2AAAAAElFTkSuQmCC',
			'94C4' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nM2QrRHAIAxGg4hH0H0w+IhimCYV2QC6AYYpS13aItsr+dy7/LwLtEcxzJRP/JBAIHomxVyGYjxtmlHvQrZyZSYgQyblt5daa2spKT8MTpD7Rn1ZlhjYxFUxK9D77N1FzknNRs5//e/FDPwOQ1fNBu81zxwAAAAASUVORK5CYII=',
			'AA07' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7GB0YAhimMIaGIImxBjCGMIQyNIggiYlMYW1ldHRAEQtoFWl0bQgAQoT7opZOW5m6KmplFpL7oOpake0NDRUNBYpNYUAzz9HRIQBdzCEU6Ep0sSmoYgMVflSEWNwHAL6fzPpelMhoAAAAAElFTkSuQmCC',
			'F2F9' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7QkMZQ1hDA6Y6IIkFNLC2sjYwBASgiIk0ujYwOoigiDEgi4GdFBq1aunS0FVRYUjuA6qbAjRvKpreAKBYA6oYowNQDM0O1gZMt4iGugLNQ3bzQIUfFSEW9wEAnlLMh8sVRrAAAAAASUVORK5CYII=',
			'F4C5' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7QkMZWhlCHUMDkMSA7KmMDoEODKhioawNgmhijK6sQOyA5L7QqKVLl65aGRWF5L6ABpFWViAtgqJXNNQVQ4yhFWQHuhijQ0AAmvuAbnaY6jAIwo+KEIv7APz0zEYEVfdrAAAAAElFTkSuQmCC',
			'19B6' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZ0lEQVR4nGNYhQEaGAYTpIn7GB0YQ1hDGaY6IImxOrC2sjY6BAQgiYk6iDS6NgQ6CKDoBYo1Ojogu29l1tKlqaErU7OQ3Ae0IxCoDsU8RgcGsHkiKGIsWMSwuCUE080DFX5UhFjcBwBNhMn1w84zZwAAAABJRU5ErkJggg==',
			'0AE1' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZklEQVR4nGNYhQEaGAYTpIn7GB0YAlhDHVqRxVgDGENYGximIouJTGFtBYqFIosFtIo0ujYwwPSCnRS1dNrK1NBVS5Hdh6YOKiYaii4mMgVTHWsAphijA1As1CE0YBCEHxUhFvcBAC55y72xTiW2AAAAAElFTkSuQmCC',
			'73D8' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7QkNZQ1hDGaY6IIu2irSyNjoEBKCIMTS6NgQ6iCCLTWFoZW0IgKmDuClqVdjSVVFTs5Dcx+iAog4MWRswzRPBIhbQgOmWgAYsbh6g8KMixOI+AAWHzPwZdiBCAAAAAElFTkSuQmCC',
			'017B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7GB0YAlhDA0MdkMRYAxgDGBoCHQKQxESmsILFRJDEAloZAhgaHWHqwE6KWroqatXSlaFZSO4Dq5vCiGIeWCyAEcU8kSkgEVQxoK0BrA2oehkdWEOBYihuHqjwoyLE4j4A55nIibElZNwAAAAASUVORK5CYII=',
			'22D9' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcklEQVR4nGNYhQEaGAYTpIn7WAMYQ1hDGaY6IImJTGFtZW10CAhAEgtoFWl0bQh0EEHW3cqALAZx07RVS5euiooKQ3ZfAMMU1oaAqch6GR0YAoBiDchirEBRoBiKHSJAUXS3hIaKhrqiuXmgwo+KEIv7ADSYzDXgHEkYAAAAAElFTkSuQmCC',
			'3EB6' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWElEQVR4nGNYhQEaGAYTpIn7RANEQ1lDGaY6IIkFTBFpYG10CAhAVtkKFGsIdBBAFgOrc3RAdt/KqKlhS0NXpmYhuw+iDqt5IgTEsLkFm5sHKvyoCLG4DwDEZ8vmVOj6EAAAAABJRU5ErkJggg==',
			'55D9' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7QkNEQ1lDGaY6IIkFNIg0sDY6BASgizUEOoggiQUGiIQgiYGdFDZt6tKlq6KiwpDd18rQ6NoQMBVZL1SsAVksoFUEJIZih8gU1lZ0t7AGMIagu3mgwo+KEIv7AKA4zU6Ywg6MAAAAAElFTkSuQmCC',
			'650E' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpIn7WANEQxmmMIYGIImJTBFpYAhldEBWF9Ai0sDo6Igq1iASwtoQCBMDOykyaurSpasiQ7OQ3BcyhaHRFaEOorcVm5hIoyOaHSJTWFvR3cIawBiC7uaBCj8qQizuAwDiicpnpAA1QQAAAABJRU5ErkJggg==',
			'DC88' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWklEQVR4nGNYhQEaGAYTpIn7QgMYQxlCGaY6IIkFTGFtdHR0CAhAFmsVaXBtCHQQQRNjRKgDOylq6bRVq0JXTc1Cch+aOrgYKxbzMOzA4hZsbh6o8KMixOI+AO67zmPskPACAAAAAElFTkSuQmCC',
			'F899' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYklEQVR4nGNYhQEaGAYTpIn7QkMZQxhCGaY6IIkFNLC2Mjo6BASgiIk0ujYEOoigqWNFiIGdFBq1MmxlZlRUGJL7QOoYQgKmiqCZ5wAi0cQcGwIw7MB0C6abByr8qAixuA8AciTNUvBxpsMAAAAASUVORK5CYII=',
			'6637' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZ0lEQVR4nGNYhQEaGAYTpIn7WAMYQxhDGUNDkMREprC2sjY6NIggiQW0iDQCSVQxEA+oLgDJfZFR08JWTV21MgvJfSFTRFuB6lqR7Q1oFQHpnIJFLIABwy2ODljcjCI2UOFHRYjFfQBZ8Mz4R9sgygAAAABJRU5ErkJggg==',
			'33B7' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYElEQVR4nGNYhQEaGAYTpIn7RANYQ1hDGUNDkMQCpoi0sjY6NIggq2xlaHRtCEAVm8IAVheA5L6VUavCloauWpmF7D6IulYGTPOmYBELYMBwi6MDFjejiA1U+FERYnEfAKLdzFfeVzPcAAAAAElFTkSuQmCC',
			'F380' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWklEQVR4nGNYhQEaGAYTpIn7QkNZQxhCGVqRxQIaRFoZHR2mOqCIMTS6NgQEBKCKAdU5OogguS80alXYqtCVWdOQ3IemDsm8QCxi6HZgcwummwcq/KgIsbgPADxnzSEX/nF5AAAAAElFTkSuQmCC',
			'C485' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcElEQVR4nGNYhQEaGAYTpIn7WEMYWhlCGUMDkMREWhmmMjo6OiCrC2hkCGVtCEQVa2B0BapzdUByX9SqpUtXha6MikJyXwDQREZHhwYRFL2ioa4gGVQ7WkF2iKC6BaQ3ANl9EDczTHUYBOFHRYjFfQC43ctDXsoIIAAAAABJRU5ErkJggg==',
			'E525' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcklEQVR4nGNYhQEaGAYTpIn7QkNEQxlCGUMDkMQCGkQaGB0dHRjQxFgbAtHFQhgaAl0dkNwXGjV16aqVmVFRSO4Dmt3o0MoANAFZL1BsCrqYSKNDAKMDqhhrK6MDQwCy+0JDGENYQwOmOgyC8KMixOI+AB8BzEaTwoKkAAAAAElFTkSuQmCC',
			'C053' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7WEMYAlhDHUIdkMREWhlDWBsYHQKQxAIaWVtZQXLIYg0ija5TQTTCfVGrpq1MzcxamoXkPpA6ByAZgKYXJCaCYQeqGMgtjI6OKG4BuZkhlAHFzQMVflSEWNwHAPz7zNokVl/KAAAAAElFTkSuQmCC',
			'2A12' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAc0lEQVR4nM2QwQ2AIAxF2wMb1H3KBj3QiyM4BRzYANlBppTgpUaPmtB/e/lNXwrtMRFmyi9+TkCgwM6GUcEAAUQMk+wyBmSy25kSl963frUeW21ttX4yesneQF60s3xziaNXLKOLiWWqlLx6DRP878O8+J2iJswOB1LfAwAAAABJRU5ErkJggg==',
			'E712' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nM2QsQ2AMAwEnYINzD5mAxd2k2mcIhsEhsiUmC4GSpDi704v/cnQH2cwU37xU1mVGuw0MDYoJMB8Y5skwsgqNDAc/DT3w9Pz4Oc99l6JG4mcVQhsMWctMrwYR2e0pJvKBP/7MC9+J1rFzQKKgPhLAAAAAElFTkSuQmCC',
			'1E84' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7GB1EQxlCGRoCkMRYHUQaGB0dGpHFRIFirA0BrQEoesHqpgQguW9l1tSwVaGroqKQ3AdR5+iArpe1ITA0BEMsoAGLHShioiGYbh6o8KMixOI+AKqQykVVLEU1AAAAAElFTkSuQmCC',
			'F004' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAX0lEQVR4nGNYhQEaGAYTpIn7QkMZAhimMDQEIIkFNDCGMIQyNKKKsbYyOjq0ooqJNLo2BEwJQHJfaNS0lamroqKikNwHURfogKk3MDQE0w5sbkETw3TzQIUfFSEW9wEAPybOt9pDDqYAAAAASUVORK5CYII=',
			'A09C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7GB0YAhhCGaYGIImxBjCGMDo6BIggiYlMYW1lbQh0YEESC2gVaXQFiiG7L2rptJWZmZFZyO4DqXMIgasDw9BQoFgDqlhAK2srI4YdmG4JaMV080CFHxUhFvcBAJQByzJUyFRFAAAAAElFTkSuQmCC',
			'CA6B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7WEMYAhhCGUMdkMREWhlDGB0dHQKQxAIaWVtZGxwdRJDFGkQaXRsYYerATopaNW1l6tSVoVlI7gOrQzevQTTUtSEQ1bxGkHmoYiKtIo2OaHpZQ0QaHdDcPFDhR0WIxX0AK2zMf6AwUTIAAAAASUVORK5CYII=',
			'5DB3' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAX0lEQVR4nGNYhQEaGAYTpIn7QkNEQ1hDGUIdkMQCGkRaWRsdHQJQxRpdQSSSWGAAUKzRoSEAyX1h06atTA1dtTQL2X2tKOoQYmjmBWARE5mC6RbWAEw3D1T4URFicR8AmBvOz6+AXNUAAAAASUVORK5CYII=',
			'BE29' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7QgNEQxlCGaY6IIkFTBFpYHR0CAhAFmsVaWBtCHQQQVPHgBADOyk0amrYqpVZUWFI7gOra2WYKoJmHsMUhgYMsQAGDDsYHRhQ3AJyM2toAIqbByr8qAixuA8Am9rMgDgw9UMAAAAASUVORK5CYII=',
			'6E2E' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7WANEQxlCGUMDkMREpog0MDo6OiCrC2gRaWBtCEQVaxABknAxsJMio6aGrVqZGZqF5L4QoHkMrYyoeluBYlOwiAWgioHd4oAqBnIza2ggipsHKvyoCLG4DwC0A8lXVQDomgAAAABJRU5ErkJggg==',
			'700B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZklEQVR4nGNYhQEaGAYTpIn7QkMZAhimMIY6IIu2MoYwhDI6BKCIsbYyOjo6iCCLTRFpdG0IhKmDuClq2srUVZGhWUjuY3RAUQeGrA0QMWTzRBow7QhowHQLkI3p5gEKPypCLO4DAAz9ypggF2uLAAAAAElFTkSuQmCC',
			'6511' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7WANEQxmmMLQii4lMEWlgCGGYiiwW0CLSwBjCEIoi1iASgqQX7KTIqKlLV01btRTZfSFTGBod0OwIaMUmJoIhJjKFtRXdfawBjCGMoQ6hAYMg/KgIsbgPAPg1zDW1meP/AAAAAElFTkSuQmCC',
			'5D8A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpIn7QkNEQxhCGVqRxQIaRFoZHR2mOqCKNbo2BAQEIIkFBog0Ojo6OogguS9s2rSVWaErs6Yhu68VRR1czLUhMDQE2Q6IGIo6kSkgt6DqZQ0AuZkR1bwBCj8qQizuAwCuUsxP4BjR3wAAAABJRU5ErkJggg==',
			'F5A2' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpIn7QkNFQxmmMEx1QBILaBBpYAhlCAhAE2N0dHQQQRULYYWohrsvNGrq0qWrooAQ4T6gOY2uDQGNqHYAxUIDWhlQzQOpm4IqxtoKtCMAVYwRaG9gaMggCD8qQizuAwD5wc6rVN/GZAAAAABJRU5ErkJggg==',
			'D21C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7QgMYQximMEwNQBILmMLayhDCECCCLNYq0ugYwujAgiLG0OgwhdEB2X1RS1ctXTVtZRay+4DqpjAg1MHEAjDFgPwpaHZMYW0A6kZxS2iAaKhjqAOKmwcq/KgIsbgPACuTzDD4nxIYAAAAAElFTkSuQmCC',
			'1DD1' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWElEQVR4nGNYhQEaGAYTpIn7GB1EQ1hDGVqRxVgdRFpZGx2mIouJOog0ujYEhKLqBYvB9IKdtDJr2srUVVFLkd2Hpo5UMZBbUMREQ8BuDg0YBOFHRYjFfQC3a8shZ8m+jQAAAABJRU5ErkJggg==',
			'E0C8' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXUlEQVR4nGNYhQEaGAYTpIn7QkMYAhhCHaY6IIkFNDCGMDoEBASgiLG2sjYIOoigiIk0ujYwwNSBnRQaNW1l6qpVU7OQ3IemDkmMEc08bHZgugWbmwcq/KgIsbgPADNtzP650SFwAAAAAElFTkSuQmCC',
			'A633' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7GB0YQxhDGUIdkMRYA1hbWRsdHQKQxESmiDQyNAQ0iCCJBbQCeY0ODQFI7otaOi1s1dRVS7OQ3BfQKtqKpA4MQ0NFwCJo5mERw3RLQCummwcq/KgIsbgPAEkGzjxkg3vnAAAAAElFTkSuQmCC',
			'B646' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7QgMYQxgaHaY6IIkFTGFtZWh1CAhAFmsVaWSY6ugggKJOpIEh0NEB2X2hUdPCVmZmpmYhuS9gimgra6MjhnmuoYEOImhiDo2OqGIgtzSiugWbmwcq/KgIsbgPAHMtzhoIss3zAAAAAElFTkSuQmCC',
			'3437' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7RAMYWhlDGUNDkMQCpjBMZW10aBBBVtnKEAqUQRWbwujKAFQXgOS+lVFLl66aumplFrL7poi0AtW1otjcKhrqALIJ1Q6gmoAABlS3tLI2OjpgcTOK2ECFHxUhFvcBAFMAzBvoQjOCAAAAAElFTkSuQmCC',
			'E3EB' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAU0lEQVR4nGNYhQEaGAYTpIn7QkNYQ1hDHUMdkMQCGkRaWRsYHQJQxBgaXYFiIqhiyOrATgqNWhW2NHRlaBaS+9DU4TMPiximW7C5eaDCj4oQi/sAuYfL1bFFJIIAAAAASUVORK5CYII=',
			'3B43' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7RANEQxgaHUIdkMQCpoi0MrQ6OgQgq2wVaXSY6tAggiwGUhfo0BCA5L6VUVPDVmZmLc1Cdh9QHWsjXB3cPNfQAFTzQHY0otoBdksjqluwuXmgwo+KEIv7AHIozgleuSW4AAAAAElFTkSuQmCC',
			'4579' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAd0lEQVR4nM3QQQqAIBCF4efCG0z3sRtMoC06jS26wegN3HjKJAhGalmUAy4+UH4G9XIi/jTv9MkQbODktHlqNzMrM4dNjpRZIY91PO1IyjmVWuoyqz4WrE6Q9NsQmjEidS3UfoPrzW42omuBGN+sb/5qf8/NTd8ODdzMCcYczpUAAAAASUVORK5CYII=',
			'E622' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7QkMYQxhCGaY6IIkFNLC2Mjo6BASgiIk0sjYEOoigisFJmPtCo6aFrVqZtSoKyX0BDaKtDK0MjQ5o5jlMAYqiiwUwTGFAd4sDQwC6m1lDA0NDBkH4URFicR8AE63M1sTdfNQAAAAASUVORK5CYII=',
			'7BB2' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7QkNFQ1hDGaY6IIu2irSyNjoEBKCKNbo2BDqIIItNAatrEEF2X9TUsKWhQArJfYwOYHWNyHawNoDMC2hFdosIRGwKslhAA8QtqGIgNzOGhgyC8KMixOI+AIUFzVaRb95eAAAAAElFTkSuQmCC',
			'C349' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7WENYQxgaHaY6IImJtIq0MrQ6BAQgiQU0glQ5OoggizUwtDIEwsXATopatSpsZWZWVBiS+0DqWIG60fQ2uoYGNIig29HogGIH2C2NqG7B5uaBCj8qQizuAwCYgs1mDMq/fwAAAABJRU5ErkJggg==',
			'B189' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7QgMYAhhCGaY6IIkFTGEMYHR0CAhAFmtlDWBtCHQQQVHHAFTnCBMDOyk0alXUqtBVUWFI7oOoc5iKoreVAWheQAMWMSx2oLolNIA1FN3NAxV+VIRY3AcAeY3K5tPMm9kAAAAASUVORK5CYII=',
			'C758' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdElEQVR4nGNYhQEaGAYTpIn7WENEQ11DHaY6IImJtDI0ujYwBAQgiQU0gsQYHUSQxRoYWlmnwtWBnRS1atW0pZlZU7OQ3AeUDwCSqOYBzWJoCEQ1r5G1gRVNTKRVpIHR0QFFL2sIUEUoA4qbByr8qAixuA8A5kPMnvMx4XkAAAAASUVORK5CYII=',
			'5039' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7QkMYAhhDGaY6IIkFNDCGsDY6BASgiLG2MjQEOoggiQUGiDQ6NDrCxMBOCps2bWXW1FVRYcjuawWpc5iKrBcsBjQVWSygFWRHAIodIlMw3cIagOnmgQo/KkIs7gMA+p7MwemETJsAAAAASUVORK5CYII=',
			'596F' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7QkMYQxhCGUNDkMQCGlhbGR0dHRhQxEQaXRtQxQIDQGKMMDGwk8KmLV2aOnVlaBay+1oZA13RzGNoZQDqDUS1o5UFQ0xkCqZbWAPAbkY1b4DCj4oQi/sAx2nKA7BluokAAAAASUVORK5CYII=',
			'A342' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcklEQVR4nGNYhQEaGAYTpIn7GB1YQxgaHaY6IImxBoi0MrQ6BAQgiYlMAalydBBBEgsAqmIIdGgQQXJf1NJVYSszs1ZFIbkPpI610aER2Y7QUIZG11CgDKp5IFVTUMVEQKIBqGIgNzuGhgyC8KMixOI+APWgzd3+nMc0AAAAAElFTkSuQmCC',
			'2195' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAc0lEQVR4nM2QMQ6AMAhFYeAGPRAd3DGRwd7AW7D0Buod7CltNxodNSl/e/mEF6A8xmCk/OJHAgKKKo6FHQVjZN+TTEI2dwwyNDax9ztLurY1Je/Xbixiwe0iV2Y9o9rEesOz0Fhk8X6qpKBw8AD/+zAvfjdPVsh2GTNOkAAAAABJRU5ErkJggg==',
			'B62E' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7QgMYQxhCGUMDkMQCprC2Mjo6OiCrC2gVaWRtCEQVmyICJOFiYCeFRk0LW7UyMzQLyX0BU0RbGVoZMcxzmIJFLABNDOQWB1QxkJtZQwNR3DxQ4UdFiMV9AHOiysgEYv1tAAAAAElFTkSuQmCC',
			'EE8B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAATUlEQVR4nGNYhQEaGAYTpIn7QkNEQxlCGUMdkMQCGkQaGB0dHQLQxFgbAh1EcKsDOyk0amrYqtCVoVlI7iPFPAJ24HTzQIUfFSEW9wEAq+LLzvp7xgsAAAAASUVORK5CYII=',
			'22B4' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdElEQVR4nM3QMQ6AIAxA0TL0BngfHNhrQhdOQwduQLwBC6e0Y1FHjdKkw0+avADj8gr8aV7xIbmEDIVM8w0rShDbqHqJum2DChIlNLK+ffTOI2frI2goa7C3LgBh2ThZi1ZUyWTRqpapMS8cT+av/u/BufEdbd/N9m+YF8gAAAAASUVORK5CYII=',
			'72A6' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAeUlEQVR4nGNYhQEaGAYTpIn7QkMZQximMEx1QBZtZW1lCGUICEARE2l0dHR0EEAWm8LQ6NoQ6IDivqhVS5euikzNQnIfowPDFNaGQBTzWBsYAlhDAx1EkMREgCqB6lDEAoAqWRsCUPQGNIiGujYEoLp5gMKPihCL+wC+9MwlIlsd4AAAAABJRU5ErkJggg==',
			'ADB3' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYklEQVR4nGNYhQEaGAYTpIn7GB1EQ1hDGUIdkMRYA0RaWRsdHQKQxESmiDS6NgQ0iCCJBbQCxRodGgKQ3Be1dNrK1NBVS7OQ3IemDgxDQ3GYhymG4ZaAVkw3D1T4URFicR8AhxnPLenZz0kAAAAASUVORK5CYII=',
			'9FBB' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXklEQVR4nGNYhQEaGAYTpIn7WANEQ11DGUMdkMREpog0sDY6OgQgiQW0AsUaAh1E0MUQ6sBOmjZ1atjS0JWhWUjuY3XFNI8Bi3kCWMSwuYU1ACiG5uaBCj8qQizuAwDS7cvPN5Kr1QAAAABJRU5ErkJggg==',
			'D9AC' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbUlEQVR4nGNYhQEaGAYTpIn7QgMYQximMEwNQBILmMLayhDKECCCLNYq0ujo6OjAgibm2hDogOy+qKVLl6auisxCdl9AK2MgkjqoGEOjayi6GAvYPBQ7gG5hbQhAcQvIzUAxFDcPVPhREWJxHwAYxM3oluzVIwAAAABJRU5ErkJggg==',
			'2B7E' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7WANEQ1hDA0MDkMREpoi0MjQEOiCrC2gVaXRAE2NoBaprdISJQdw0bWrYqqUrQ7OQ3RcAVDeFEUUvowPQvABUMdYGEaBpqGIiDSKtrA2oYqGhQDc3MKK4eaDCj4oQi/sAjzrJ2pcMedsAAAAASUVORK5CYII=',
			'0176' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAc0lEQVR4nGNYhQEaGAYTpIn7GB0YAlhDA6Y6IImxBjAGMDQEBAQgiYlMYQWKBToIIIkFtDIEMDQ6OiC7L2rpqqhVS1emZiG5D6xuCiOKeWCxAEYHERQ7QCKoYkBbA1gbGFD0MjqwhgLFUNw8UOFHRYjFfQBemMjx1yPDVgAAAABJRU5ErkJggg==',
			'2DBD' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7WANEQ1hDGUMdkMREpoi0sjY6OgQgiQW0ijS6NgQ6iCDrBokB1Ykgu2/atJWpoSuzpiG7LwBFHRgyOmCax9qAKSbSgOmW0FBMNw9U+FERYnEfAEeTzEfBVdomAAAAAElFTkSuQmCC',
			'A225' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAd0lEQVR4nM2QMQ6AIAxF24Eb4H3qwF4Su3ADbwEDN8AjMMgpxa1ER03o315+m5dCe0yEmfKLHxJuICismGGTcV1J92yxyUU/MM6QKHpHyi/UVtu5h6D8eq9A7jfUrghwpwPjjASMNDITb8oDW8QJHzTB/z7Mi98FsVXLU1KyxPwAAAAASUVORK5CYII=',
			'733D' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYUlEQVR4nGNYhQEaGAYTpIn7QkNZQxhDGUMdkEVbRVpZGx0dAlDEGBodGgIdRJDFpoBEHWFiEDdFrQpbNXVl1jQk9zE6oKgDQ9YGTPNEsIgFNGC6JaABi5sHKPyoCLG4DwCHbcvLbx/IwwAAAABJRU5ErkJggg==',
			'FF3C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAVklEQVR4nGNYhQEaGAYTpIn7QkNFQx1DGaYGIIkFNIg0sDY6BIigiTE0BDqwoIs1Ojoguy80amrYqqkrs5Ddh6YOxTxsYuh2YHMLI5qbByr8qAixuA8AosHNXiJTGMYAAAAASUVORK5CYII=',
			'597D' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdklEQVR4nM3QwQmAMAxA0QTMBh0obpCCdQinSA/ZQNygB53SIggNelQ0uT1o+QS2yyj8aV/pSwMOlGLixkTJQCOLs5C5WmgsSrXcn3YkjUspU1mnpe0zjDyjewsGmcWbWFd/8xZmMlJ0LSS1WdE1f3W/B/embwcOecuwCOuMIQAAAABJRU5ErkJggg==',
			'E323' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7QkNYQxhCGUIdkMQCGkRaGR0dHQJQxBgaXUEyqGKtIDIAyX2hUavCVq3MWpqF5D6wOrBKVPMcpjCgm9foEIAuBnSLAyOKW0BuZg0NQHHzQIUfFSEW9wEAzffNcYL3E6oAAAAASUVORK5CYII=',
			'D0D1' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAV0lEQVR4nGNYhQEaGAYTpIn7QgMYAlhDGVqRxQKmMIawNjpMRRFrZW1lbQgIRRUTaXQFksjui1o6bWUqkER2H5o6PGJgO7C5BUUM6ubQgEEQflSEWNwHAOqZzm+pEPAuAAAAAElFTkSuQmCC',
			'3F79' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7RANEQ11DA6Y6IIkFTBEBkQEByCpbQWKBDiLIYiB1jY4wMbCTVkZNDVu1dFVUGLL7QOqmMEwVQTcvgKEBXYzRgQHFDpBbWIEqkd0iGgAWQ3HzQIUfFSEW9wEAAuHL1Bh5/dEAAAAASUVORK5CYII=',
			'F302' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZUlEQVR4nGNYhQEaGAYTpIn7QkNZQximMEx1QBILaBBpZQhlCAhAEWNodHR0dBBBFWtlBalGcl9o1KqwpauigBDhPqi6Rgc081wbAloZMOxwmMKAxS2oYiA3M4aGDILwoyLE4j4A23TNiZOGUncAAAAASUVORK5CYII=',
			'1FF7' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAV0lEQVR4nGNYhQEaGAYTpIn7GB1EQ11DA0NDkMRYHUQaWIG0CJKYKBYxRqhYAJL7VmZNDVsaCqSQ3AdV18qAqXcKFrEATDFGB2Qx0RBMsYEKPypCLO4DAIduyDLMX5UGAAAAAElFTkSuQmCC',
			'F13E' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWElEQVR4nGNYhQEaGAYTpIn7QkMZAhhDGUMDkMQCGhgDWBsdHRhQxFgDGBoC0cQYAhgQ6sBOCo1aFbVq6srQLCT3oalDiGEzD4sYFreEort5oMKPihCL+wBLhsnsvcO4hAAAAABJRU5ErkJggg==',
			'092E' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7GB0YQxhCGUMDkMRYA1hbGR0dHZDViUwRaXRtCEQRC2gVaXRAiIGdFLV06dKslZmhWUjuC2hlDHRoZUTTy9DoMIURzQ6WRocAVDGwWxxQxUBuZg0NRHHzQIUfFSEW9wEAhrnJLScz8uUAAAAASUVORK5CYII=',
			'184E' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZElEQVR4nGNYhQEaGAYTpIn7GB0YQxgaHUMDkMRYHVhbGVodHZDViTqINDpMRRVjBKkLhIuBnbQya2XYyszM0Cwk94HUsTai6xVpdA0NxBBzwFAHtANNTDQE080DFX5UhFjcBwAHGsgjPtc4hAAAAABJRU5ErkJggg==',
			'9528' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAeUlEQVR4nGNYhQEaGAYTpIn7WANEQxlCGaY6IImJTBFpYHR0CAhAEgtoFWlgbQh0EEEVCwGSMHVgJ02bOnXpqpVZU7OQ3MfqytDo0MqAYh5DK1BsCiOKeQKtIo0OAahiIlNYWxkdUPWyBjCGsIYGoLh5oMKPihCL+wCdoMud6gVkRQAAAABJRU5ErkJggg==',
			'50A3' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcklEQVR4nGNYhQEaGAYTpIn7QkMYAhimMIQ6IIkFNDCGMIQyOgSgiLG2Mjo6NIggiQUGiDS6AmUCkNwXNm3aytRVUUuzkN3XiqIOIRYagGJeQCtrK2sDqpjIFMYQ1oZAFLewBjAEANWhuHmgwo+KEIv7AKUxzXdpvN2+AAAAAElFTkSuQmCC',
			'CE86' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAX0lEQVR4nGNYhQEaGAYTpIn7WENEQxlCGaY6IImJtIo0MDo6BAQgiQU0ijSwNgQ6CCCLNYDUOToguy9q1dSwVaErU7OQ3AdVh2peA8Q8ESx2iBBwCzY3D1T4URFicR8APizLf4xbU5UAAAAASUVORK5CYII=',
			'C191' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7WEMYAhhCGVqRxURaGQMYHR2mIosFNLIGsDYEhKKINTCAxGB6wU6KAqKVmVFLkd0HUscQEtCKrpehAU2skSGAEU1MpJUB5BYUMdYQ1lCgm0MDBkH4URFicR8Al+zKLvy46PIAAAAASUVORK5CYII=',
			'D228' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdklEQVR4nGNYhQEaGAYTpIn7QgMYQxhCGaY6IIkFTGFtZXR0CAhAFmsVaXRtCHQQQRFjaHRoCICpAzspaumqpatWZk3NQnIfUN0UhlYGNPMYAhimMKKZx+jAEIAmNoW1ASSKrDc0QDTUNTQAxc0DFX5UhFjcBwDHic1SfnnEqAAAAABJRU5ErkJggg==',
			'1CC1' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAX0lEQVR4nGNYhQEaGAYTpIn7GB0YQxlCHVqRxVgdWBsdHQKmIouJOog0uDYIhKLqFWlgbWCA6QU7aWXWtFVLV4EQwn1o6vCKAe1AEwO7BUVMNATs5tCAQRB+VIRY3AcABpzJvUGfb9IAAAAASUVORK5CYII='        
        );
        $this->text = array_rand( $images );
        return $images[ $this->text ] ;    
    }
    
    function out_processing_gif(){
        $image = dirname(__FILE__) . '/processing.gif';
        $base64_image = "R0lGODlhFAAUALMIAPh2AP+TMsZiALlcAKNOAOp4ANVqAP+PFv///wAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQFCgAIACwAAAAAFAAUAAAEUxDJSau9iBDMtebTMEjehgTBJYqkiaLWOlZvGs8WDO6UIPCHw8TnAwWDEuKPcxQml0Ynj2cwYACAS7VqwWItWyuiUJB4s2AxmWxGg9bl6YQtl0cAACH5BAUKAAgALAEAAQASABIAAAROEMkpx6A4W5upENUmEQT2feFIltMJYivbvhnZ3Z1h4FMQIDodz+cL7nDEn5CH8DGZhcLtcMBEoxkqlXKVIgAAibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkphaA4W5upMdUmDQP2feFIltMJYivbvhnZ3V1R4BNBIDodz+cL7nDEn5CH8DGZAMAtEMBEoxkqlXKVIg4HibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpjaE4W5tpKdUmCQL2feFIltMJYivbvhnZ3R0A4NMwIDodz+cL7nDEn5CH8DGZh8ONQMBEoxkqlXKVIgIBibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpS6E4W5spANUmGQb2feFIltMJYivbvhnZ3d1x4JMgIDodz+cL7nDEn5CH8DGZgcBtMMBEoxkqlXKVIggEibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpAaA4W5vpOdUmFQX2feFIltMJYivbvhnZ3V0Q4JNhIDodz+cL7nDEn5CH8DGZBMJNIMBEoxkqlXKVIgYDibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpz6E4W5tpCNUmAQD2feFIltMJYivbvhnZ3R1B4FNRIDodz+cL7nDEn5CH8DGZg8HNYMBEoxkqlXKVIgQCibbK9YLBYvLtHH5K0J0IACH5BAkKAAgALAEAAQASABIAAAROEMkpQ6A4W5spIdUmHQf2feFIltMJYivbvhnZ3d0w4BMAIDodz+cL7nDEn5CH8DGZAsGtUMBEoxkqlXKVIgwGibbK9YLBYvLtHH5K0J0IADs=";
        $binary = is_file($image) ? join("",file($image)) : base64_decode($base64_image); 
        header("Cache-Control: post-check=0, pre-check=0, max-age=0, no-store, no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: image/gif");
        echo $binary;
    }

}
# end of class phpfmgImage
# ------------------------------------------------------
# end of module : captcha


# module user
# ------------------------------------------------------
function phpfmg_user_isLogin(){
    return ( isset($_SESSION['authenticated']) && true === $_SESSION['authenticated'] );
}


function phpfmg_user_logout(){
    session_destroy();
    header("Location: admin.php");
}

function phpfmg_user_login()
{
    if( phpfmg_user_isLogin() ){
        return true ;
    };
    
    $sErr = "" ;
    if( 'Y' == $_POST['formmail_submit'] ){
        if(
            defined( 'PHPFMG_USER' ) && strtolower(PHPFMG_USER) == strtolower($_POST['Username']) &&
            defined( 'PHPFMG_PW' )   && strtolower(PHPFMG_PW) == strtolower($_POST['Password']) 
        ){
             $_SESSION['authenticated'] = true ;
             return true ;
             
        }else{
            $sErr = 'Login failed. Please try again.';
        }
    };
    
    // show login form 
    phpfmg_admin_header();
?>
<form name="frmFormMail" action="" method='post' enctype='multipart/form-data'>
<input type='hidden' name='formmail_submit' value='Y'>
<br><br><br>

<center>
<div style="width:380px;height:260px;">
<fieldset style="padding:18px;" >
<table cellspacing='3' cellpadding='3' border='0' >
	<tr>
		<td class="form_field" valign='top' align='right'>Email :</td>
		<td class="form_text">
            <input type="text" name="Username"  value="<?php echo $_POST['Username']; ?>" class='text_box' >
		</td>
	</tr>

	<tr>
		<td class="form_field" valign='top' align='right'>Password :</td>
		<td class="form_text">
            <input type="password" name="Password"  value="" class='text_box'>
		</td>
	</tr>

	<tr><td colspan=3 align='center'>
        <input type='submit' value='Login'><br><br>
        <?php if( $sErr ) echo "<span style='color:red;font-weight:bold;'>{$sErr}</span><br><br>\n"; ?>
        <a href="admin.php?mod=mail&func=request_password">I forgot my password</a>   
    </td></tr>
</table>
</fieldset>
</div>
<script type="text/javascript">
    document.frmFormMail.Username.focus();
</script>
</form>
<?php
    phpfmg_admin_footer();
}


function phpfmg_mail_request_password(){
    $sErr = '';
    if( $_POST['formmail_submit'] == 'Y' ){
        if( strtoupper(trim($_POST['Username'])) == strtoupper(trim(PHPFMG_USER)) ){
            phpfmg_mail_password();
            exit;
        }else{
            $sErr = "Failed to verify your email.";
        };
    };
    
    $n1 = strpos(PHPFMG_USER,'@');
    $n2 = strrpos(PHPFMG_USER,'.');
    $email = substr(PHPFMG_USER,0,1) . str_repeat('*',$n1-1) . 
            '@' . substr(PHPFMG_USER,$n1+1,1) . str_repeat('*',$n2-$n1-2) . 
            '.' . substr(PHPFMG_USER,$n2+1,1) . str_repeat('*',strlen(PHPFMG_USER)-$n2-2) ;


    phpfmg_admin_header("Request Password of Email Form Admin Panel");
?>
<form name="frmRequestPassword" action="admin.php?mod=mail&func=request_password" method='post' enctype='multipart/form-data'>
<input type='hidden' name='formmail_submit' value='Y'>
<br><br><br>

<center>
<div style="width:580px;height:260px;text-align:left;">
<fieldset style="padding:18px;" >
<legend>Request Password</legend>
Enter Email Address <b><?php echo strtoupper($email) ;?></b>:<br />
<input type="text" name="Username"  value="<?php echo $_POST['Username']; ?>" style="width:380px;">
<input type='submit' value='Verify'><br>
The password will be sent to this email address. 
<?php if( $sErr ) echo "<br /><br /><span style='color:red;font-weight:bold;'>{$sErr}</span><br><br>\n"; ?>
</fieldset>
</div>
<script type="text/javascript">
    document.frmRequestPassword.Username.focus();
</script>
</form>
<?php
    phpfmg_admin_footer();    
}


function phpfmg_mail_password(){
    phpfmg_admin_header();
    if( defined( 'PHPFMG_USER' ) && defined( 'PHPFMG_PW' ) ){
        $body = "Here is the password for your form admin panel:\n\nUsername: " . PHPFMG_USER . "\nPassword: " . PHPFMG_PW . "\n\n" ;
        if( 'html' == PHPFMG_MAIL_TYPE )
            $body = nl2br($body);
        mailAttachments( PHPFMG_USER, "Password for Your Form Admin Panel", $body, PHPFMG_USER, 'You', "You <" . PHPFMG_USER . ">" );
        echo "<center>Your password has been sent.<br><br><a href='admin.php'>Click here to login again</a></center>";
    };   
    phpfmg_admin_footer();
}


function phpfmg_writable_check(){
 
    if( is_writable( dirname(PHPFMG_SAVE_FILE) ) && is_writable( dirname(PHPFMG_EMAILS_LOGFILE) )  ){
        return ;
    };
?>
<style type="text/css">
    .fmg_warning{
        background-color: #F4F6E5;
        border: 1px dashed #ff0000;
        padding: 16px;
        color : black;
        margin: 10px;
        line-height: 180%;
        width:80%;
    }
    
    .fmg_warning_title{
        font-weight: bold;
    }

</style>
<br><br>
<div class="fmg_warning">
    <div class="fmg_warning_title">Your form data or email traffic log is NOT saving.</div>
    The form data (<?php echo PHPFMG_SAVE_FILE ?>) and email traffic log (<?php echo PHPFMG_EMAILS_LOGFILE?>) will be created automatically when the form is submitted. 
    However, the script doesn't have writable permission to create those files. In order to save your valuable information, please set the directory to writable.
     If you don't know how to do it, please ask for help from your web Administrator or Technical Support of your hosting company.   
</div>
<br><br>
<?php
}


function phpfmg_log_view(){
    $n = isset($_REQUEST['file'])  ? $_REQUEST['file']  : '';
    $files = array(
        1 => PHPFMG_EMAILS_LOGFILE,
        2 => PHPFMG_SAVE_FILE,
    );
    
    phpfmg_admin_header();
   
    $file = $files[$n];
    if( is_file($file) ){
        if( 1== $n ){
            echo "<pre>\n";
            echo join("",file($file) );
            echo "</pre>\n";
        }else{
            $man = new phpfmgDataManager();
            $man->displayRecords();
        };
     

    }else{
        echo "<b>No form data found.</b>";
    };
    phpfmg_admin_footer();
}


function phpfmg_log_download(){
    $n = isset($_REQUEST['file'])  ? $_REQUEST['file']  : '';
    $files = array(
        1 => PHPFMG_EMAILS_LOGFILE,
        2 => PHPFMG_SAVE_FILE,
    );

    $file = $files[$n];
    if( is_file($file) ){
        phpfmg_util_download( $file, PHPFMG_SAVE_FILE == $file ? 'form-data.csv' : 'email-traffics.txt', true, 1 ); // skip the first line
    }else{
        phpfmg_admin_header();
        echo "<b>No email traffic log found.</b>";
        phpfmg_admin_footer();
    };

}


function phpfmg_log_delete(){
    $n = isset($_REQUEST['file'])  ? $_REQUEST['file']  : '';
    $files = array(
        1 => PHPFMG_EMAILS_LOGFILE,
        2 => PHPFMG_SAVE_FILE,
    );
    phpfmg_admin_header();

    $file = $files[$n];
    if( is_file($file) ){
        echo unlink($file) ? "It has been deleted!" : "Failed to delete!" ;
    };
    phpfmg_admin_footer();
}


function phpfmg_util_download($file, $filename='', $toCSV = false, $skipN = 0 ){
    if (!is_file($file)) return false ;

    set_time_limit(0);


    $buffer = "";
    $i = 0 ;
    $fp = @fopen($file, 'rb');
    while( !feof($fp)) { 
        $i ++ ;
        $line = fgets($fp);
        if($i > $skipN){ // skip lines
            if( $toCSV ){ 
              $line = str_replace( chr(0x09), ',', $line );
              $buffer .= phpfmg_data2record( $line, false );
            }else{
                $buffer .= $line;
            };
        }; 
    }; 
    fclose ($fp);
  

    
    /*
        If the Content-Length is NOT THE SAME SIZE as the real conent output, Windows+IIS might be hung!!
    */
    $len = strlen($buffer);
    $filename = basename( '' == $filename ? $file : $filename );
    $file_extension = strtolower(substr(strrchr($filename,"."),1));

    switch( $file_extension ) {
        case "pdf": $ctype="application/pdf"; break;
        case "exe": $ctype="application/octet-stream"; break;
        case "zip": $ctype="application/zip"; break;
        case "doc": $ctype="application/msword"; break;
        case "xls": $ctype="application/vnd.ms-excel"; break;
        case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
        case "gif": $ctype="image/gif"; break;
        case "png": $ctype="image/png"; break;
        case "jpeg":
        case "jpg": $ctype="image/jpg"; break;
        case "mp3": $ctype="audio/mpeg"; break;
        case "wav": $ctype="audio/x-wav"; break;
        case "mpeg":
        case "mpg":
        case "mpe": $ctype="video/mpeg"; break;
        case "mov": $ctype="video/quicktime"; break;
        case "avi": $ctype="video/x-msvideo"; break;
        //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
        case "php":
        case "htm":
        case "html": 
                $ctype="text/plain"; break;
        default: 
            $ctype="application/x-download";
    }
                                            

    //Begin writing headers
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public"); 
    header("Content-Description: File Transfer");
    //Use the switch-generated Content-Type
    header("Content-Type: $ctype");
    //Force the download
    header("Content-Disposition: attachment; filename=".$filename.";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$len);
    
    while (@ob_end_clean()); // no output buffering !
    flush();
    echo $buffer ;
    
    return true;
 
    
}
?>