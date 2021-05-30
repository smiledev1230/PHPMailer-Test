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
#listcat li {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    font-size: 22px;
    list-style: outside none none;
    text-align: left;
}
#listcat {
	margin:0 auto;
	padding:20px;
	width:500px;
	border:1px solid
}
.button-add {
    background: #cecece none repeat scroll 0 0;
    border-radius: 10px;
    color: #fff;
    display: block;
    margin: 10px auto;
    padding: 10px;
    text-decoration: none;
    width: 200px;
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
    $( "#listcat" ).sortable();
    $( "#listcat" ).sortable({
        update: function( event, ui ) { 
            //alert(ui.item.attr('id'));
            $.ajax({
        		type: "POST",
        		url: "drag-drop-cat.php",
        		data:  { cat_id: ui.item.attr('id'), order_id: ui.item.index()},
        		success: function(data){
        		      ui.item.attr('data-id',ui.item.index());
        		}
            });
        }
        
    });
    //$( "#listcat" ).disableSelection();
    $('.title').on('keyup', function(e) {
        if (e.which == 13) {
            e.preventDefault();
            $.ajax({
        		type: "POST",
        		url: "update-name.php",
        		data:  { cat_id: $(this).attr('data-id'), title: $(this).val()},
        		success: function(data){
        		}
            });
            
        }
    });
    
});
function deleteCat(id){
    $.ajax({
		type: "POST",
		url: "deletecat.php",
		data:  { cat_id: id},
		success: function(data){
	        $("#"+id).hide();
		}
    });
}
</script>
<div class="my_account">
        
        <h1>List Category</h1>
        <ul class="menu-bend">
			<li><a href="https://honestinstall.com/category/uploadimg.php">Upload image</a></li>
			<li><a href="https://honestinstall.com/category/listimg.php">List images</a></li>
		</ul>
        <div class="updateclient">
			<div class="list-cat">
				<ul id="listcat">
				<?php foreach ($p->catsql_Array() as $arr) { ?>
					<li class="ui-state-default" id="<?php echo $arr['id'] ;?>" data-id="<?php echo $arr['order_id'] ?>">
						<a onclick="deleteCat(<?php echo $arr['id'] ;?>)"><img src="../images/delete.png"></a>
						<a target="_blank" href="https://honestinstall.com/category/list-image-by-cat.php?cat_id=<?php echo $arr['id'] ;?>"><?php echo $arr['name']?></a>
					</li>
				<?php } ?>
				</ul>
			</div>
			<a class="button-add" href="https://honestinstall.com/category/createcat.php">Add Category</a>
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
