<link rel="stylesheet" href="assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
		<?php
require_once "connect.php";
$testimonial_id = isset($_GET['id'])?($_GET['id']):"";
$delete = isset($_GET['del'])?($_GET['del']):"";
$p = new db;

if (isset($_POST['update']) == true) 
{
    $p ->updateTestimonial($testimonial_id);
	header("location: /testimonial.php");
}
if (isset($_POST['add']) == true)
{
    $p ->addTestimonial();
	header("location: /testimonial.php");  
}

if ($testimonial_id){
   $row = $p->detailTestimonial($testimonial_id);
}

if ($delete){
   $row = $p->deleteTestimonial($delete);
   header("location: /testimonial.php"); 
}

$lists = $p->getListTestimonial();
 
?>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="includes/jquery.validate.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function($){
    
    $("#testimonial_form").validate({

		rules: {

			order_id: "required",

            author: "required",

            content: {

				required: true,

				minlength : 10

			}

		}

	});
    
})
</script>
<style>
body{
    font-family: 'archivo_narrowregular';
	color:#666}
.my_account {
    padding-top: 0px;
    width: 100%;
}
.my_account h1{
    
    text-align: center;
}
#testimonial_form .cl {
    padding-right: 30px;
    text-align: right;
}
.updateclient {
    margin: 0 auto;
    text-align: center;
    width: 50%;
}
table.reference, table.tecspec {
    border-collapse: collapse;
    width: 100%;
}
tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
}
table.reference tr:nth-child(odd) {
    background-color: #f1f1f1;
}
tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
table.reference th {
    color: #ffffff;
    background-color: #555555;
    border: 1px solid #555555;
    padding: 3px;
    vertical-align: top;
    text-align: left;
}
table.reference td {
    border: 1px solid #d4d4d4;
    padding: 5px;
    padding-top: 7px;
    padding-bottom: 7px;
    vertical-align: top;
}
span.required, label.error{
    color: red;
}
input.error, textarea.error{
    border: 1px solid red;
}
label.error {
    clear: both;
    display: block;
    margin-top: 10px;
}
</style>

<div class="my_account">
        
        <h1><?php echo ($testimonial_id)?'Update':'Add';?> Testimonial</h1>
        

        <div class="updateclient">
        
            <form id="testimonial_form" action=""  method="post">
                <input type="hidden" name="testimonial" value="<?php echo (isset($_GET['id']))?$_GET['id']:''?>" />
                <table width="100%" border="0" align="center" cellspacing="5" cellpadding="5">
                    <tbody><tr>
                        <td width="30%" class="cl"><strong>Order ID<span class="required">*</span></strong></td>
                        <td align="left">
                            <input type="text" value="<?php echo (isset($row['order_id']))?$row['order_id']:''?>" name="order_id" tabindex="4" id="order_id" size="40">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%" class="cl"><strong>Content:<span class="required">*</span></strong></td>
                        <td align="left">
                            <textarea rows="4" cols="50" name="content"><?php echo (isset($row['content']))?$row['content']:''?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%" class="cl"><strong>Author:<span class="required">*</span></strong></td>
                        <td align="left">
                            <input type="text" value="<?php echo (isset($row['author']))?$row['author']:''?>" name="author" tabindex="4" id="author" size="40">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%" class="cl"><strong>Link:</strong></td>
                        <td align="left">
                            <input type="text" value="<?php echo (isset($row['link']))?$row['link']:''?>" name="link" tabindex="4" id="link" size="40"><br />
                            <span>Ex: www.google.com or google.com</span>
                        </td>
                    </tr>
                    <tr>
                    <td>&nbsp;</td>
                    <td align="left">
                        <button class="greenBg rounded b1 gen1 cw" name="<?php echo ($testimonial_id)?'update':'add';?>" type="submit"><span><?php echo ($testimonial_id)?'Update':'Add';?></span></button>
                    </td>
                    
                    
                    </tr>
                    
                </tbody></table>
            </form>
            <!-- end contents here -->
        <h1>Testimonials</h1>  
        <table class="reference">
            <tbody>
                <tr>
                    <th style="width: 10%;">Order</th>
                    <th style="width: 55%;">Content</th>		
                    <th style="width: 15%;">Reviewer</th>
                    <th style="width: 10%;">Link</th>
                    <th style="width: 10%;">Action</th>
                </tr>
                <?php if (isset($lists)){?>
                    <?php while ($list = mysql_fetch_assoc($lists)) { ?>
                    <tr>
                        <td><?php echo $list['order_id']?></td>
                        <td><?php echo $list['content']?></td>		
                        <td><?php echo $list['author']?></td>
                        <td><?php echo $list['link']?></td>		
                        <td><a href="testimonial.php/edit?id=<?php echo $list['id']?>">Edit</a>&nbsp;&nbsp;&nbsp;<a href="testimonial.php/delete?del=<?php echo $list['id']?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
