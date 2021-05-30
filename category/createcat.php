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
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/dropzone.js"></script>

<link rel="stylesheet" href="../assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="../css/dropzone.css"/>
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
    width: 60%;
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
.tile-inner{
    text-decoration: none;
}
.updateclient .go{
    
    margin-bottom: 40px;
    cursor: pointer;
    
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
        		url: "drag-drop-cat.php",
        		data:  { cat_id: ui.item.attr('id'), order_id: ui.item.index()},
        		success: function(data){
        		      ui.item.attr('data-id',ui.item.index());
        		}
            });
        }
        
    });
    //$( "#sortable" ).disableSelection();
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
        
        <h1>Create Category</h1>
		<ul class="menu-bend">
			<li><a href="https://honestinstall.com/category/listcategory.php">List categories</a></li>
			<li><a href="https://honestinstall.com/category/listimg.php">List images</a></li>
		</ul>
        <div class="updateclient">
			<form action="" method="post" enctype="multipart/form-data">
				<label>Category Name : </label>
				<input type="text" name="cat_name">
				<input type="submit" value="submit" name="action">
			</form>
        </div>
</div>
<?php
	if(isset($_POST['action'])){
		if($_POST['cat_name'] != '') { 
		require_once "connect-db.php";
		
		$p = new db;
		$cat_name = $_POST['cat_name'];
		//print_r($_FILES);
		$p->addCat($cat_name);
		echo '<h3 style="text-align:center" class="error">Created Complete, Move to category list <a href="https://honestinstall.com/category/listcategory.php">Click Here</a></h3>';
		}else{
			echo '<h3 class="error">Please Input Category Name !</h3>';
		}
	}
?>
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
