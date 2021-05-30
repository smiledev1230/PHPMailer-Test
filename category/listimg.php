<?php
session_start();

$userinfo = array(
                'honest'=>'install2014'
                );

if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['username'])) {
    if($userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
    }else {
        //Invalid Login
    }
}
if(isset($_SESSION['username'])):
?>
<?php
    require_once "connect-db.php";
    $p = new db;

?>
<?php 
	if(isset($_POST['action'])){

        $listcat_id = '';
        
        foreach($_POST['cat_name'] as $cat_id){
		  $listcat_id.= $cat_id.',';	
        }
        
        $listcat = trim($listcat_id, ",");
        
		if(!empty($_POST['check_list'])){
			 foreach($_POST['check_list'] as $img_id){
				$p->addimgforcat($listcat,$img_id);
			 }
		   }
	}
?>
<link rel="stylesheet" href="../assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<style>
body{
    font-family: 'archivo_narrowregular';
	color:#666}
#sortable { list-style-type: none; margin: 0; padding: 0;}
#sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left;  font-size: 4em; text-align: center; }
.updateclient {
    margin: 0 auto;
    text-align: center;
    width: 1030px;
	margin-bottom:30px;
}
.my_account {
    padding-top: 0px;
    width: 100%;
}
.my_account h1{
    
    text-align: center;
}
#sortable input{
    display: block;
    height: 30px;
    width: 250px;
    margin: 0 auto;
}
#sortable .delete{
    display: block;
    cursor: pointer;
    margin: 5px auto;
}
.go{
    
    margin-bottom: 40px;
    clear: both;
    margin-left: auto;
    margin-right: auto;
    cursor: pointer;
    
}
.category-add {
    bottom: 0;
    position: fixed;
    width: 1030px;
	background:#fff;
	padding:20px;
}
input[type="checkbox"] {
    margin-top: -32px !important;
    position: absolute;
    width: 50px !important;
}
.menu-bend {
	text-align: center;
}
.menu-bend li {
	display: inline-block;
    padding: 0 15px;
	cursor: pointer;
}
.menu-bend a {
	font-weight: bold;
    text-decoration: underline;
}
</style>
<script>
$(document).ready(function(){
    $( "#sortable" ).sortable();
    $( "#sortable" ).sortable({
        update: function( event, ui ) { 
            //alert(ui.item.attr('id'));
            $.ajax({
        		type: "POST",
        		url: "update-drop-drag.php",
        		data:  { image_id: ui.item.attr('id'), order_id: ui.item.index()},
        		success: function(data){
        		      ui.item.attr('data-id',ui.item.index());
        		}
            });
        }
        
    });
    //$( "#sortable" ).disableSelection();
    $('.subtitle').on('keyup', function(e) {
        if (e.which == 13) {
            e.preventDefault();
            $.ajax({
        		type: "POST",
        		url: "update-subtitle.php",
        		data:  { image_id: $(this).attr('data-id'), subtitle: $(this).val()},
        		success: function(data){
        		}
            });
            
        }
    });
    
});
function deleteImage(id){
    $.ajax({
		type: "POST",
		url: "deleteimg.php",
		data:  { image_id: id},
		success: function(data){
	        $("#"+id).hide();
		}
    });
}
</script>
<div class="my_account">
    <h1>Edit Photos</h1>
    <ul class="menu-bend">
		<li><a href="https://honestinstall.com/category/listcategory.php">List categories</a></li>
		<li><a href="https://honestinstall.com/category/createcat.php">Add category</a></li>
	</ul>
    
    <div class="updateclient">
        <button class="go" type="button" onclick=" return window.location.href = 'https://honestinstall.com/category/uploadimg.php';">Back to Upload Photo</button>
		<form action="" method="post" enctype="multipart/form-data">
        <ul id="sortable">
        <?php foreach ($p->mysql_Array() as $arr) { ?>
            <li class="ui-state-default" id="<?php echo $arr['id'] ;?>" data-id="<?php echo $arr['order_id'] ?>">
                <button class="delete" type="button" onclick="deleteImage(<?php echo $arr['id'] ;?>)">Delete</button>
				<input type="checkbox" value="<?php echo $arr['id'] ;?>" name="check_list[]">
                <img width="250" height="250" src="../images/uploadimg/thumbs/thumb_<?php echo $arr['name']?>" />
                <input class="subtitle" data-id="<?php echo $arr['id'] ;?>" type="text" name="subtitle" value="<?php echo $arr['subtitle']?>" placeholder="Type caption here.." />
            </li>
        <?php } ?>
        </ul>
		<div style="clear:both"></div>
		<div class="category-add">
			<select name="cat_name[]" multiple>
				<?php foreach ($p->catsql_Array() as $arr) { ?>
					<option value="<?php echo $arr['id'] ;?>"><?php echo $arr['name']?></option>
				<?php } ?>
			</select>
			<input type="submit" value="Submit" name="action">
		</div>
		</form>
    </div>
</div>
<?php else: ?>
<div style="margin:0 auto;width:850px;">
<img src="https://honestinstall.com/images/random/2.png" />

<h2>Please Login</h2>
        <form name="login" action="" method="post">
            Username:&nbsp;<input type="text" name="username" value="" /><br />
            Password:&nbsp;<input type="password" name="password" value="" /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>
</div>
<?php endif; ?>