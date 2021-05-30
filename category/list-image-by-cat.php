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
	$cat_id = $_GET['cat_id'];
?>
<?php 
	if(isset($_POST['action'])){
		if(!empty($_POST['cat_name'])){
			$cat_name = $_POST['cat_name'];
			$p->updateCattitle($cat_id,$cat_name);
			if(!empty($_POST['fetured'])){
				$image_id = $_POST['fetured'];
				$p->setfeaturedimage($cat_id,$image_id);
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
function deleteImage(id,catid){
    $.ajax({
		type: "POST",
		url: "removeimgbycat.php",
		data:  { image_id: id, cat_id: catid},
		success: function(data){
	        $("#"+id).hide();
		}
    });
}
</script>
<div class="my_account">
    <h1>List Image by <?php $p->getTitleCat($cat_id); ?></h1>
    <form action="" method="post" style="text-align:center">
		<label>Change Name Category : </label>
		<input value="<?php $p->getTitleCat($cat_id); ?>" type="text" name="cat_name">
		<input type="submit" value="submit" name="action">
		<div class="updateclient">
			<ul id="sortable">
				<?php foreach ($p->catbyid($cat_id) as $arr) { ?>
					<?php $val = $arr['img_fetured']; ?>
				<?php } ?>
			<?php foreach ($p->img_by_cat($cat_id) as $arr) { ?>
				<li class="ui-state-default" id="<?php echo $arr['id'] ;?>" data-id="<?php echo $arr['order_id'] ?>">
					<input type="radio" name="fetured" value="<?php echo $arr['id'] ;?>" <?php if($arr['id'] == $val ) { ?> checked="checked" <?php } ?>>
					<button class="delete" type="button" onclick="deleteImage(<?php echo $arr['id'].','.$cat_id ;?>)">Delete</button>
					<img width="250" height="250" src="../images/uploadimg/thumbs/thumb_<?php echo $arr['name']?>" />
					<input class="subtitle" data-id="<?php echo $arr['id'] ;?>" type="text" name="subtitle" value="<?php echo $arr['subtitle']?>" placeholder="Type caption here.." />
				</li>
			<?php } ?>
			</ul>
		</div>
	</form>
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