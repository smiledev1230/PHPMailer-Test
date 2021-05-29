<?php
    require_once "connect-db.php";
    $p = new db;
    $array = $p->catsql_Array();
   // print_r($array);
    ?>
	<?php foreach ($p->catsql_Array() as $cat) { 
			foreach ($p->getImgByID($cat['img_fetured']) as $arr) {
				$val = $arr['name']; 
			} ?>
			<div class="tile">
				<a class="tile-inner" target="_blank" href="category.php?cat_id=<?php echo $cat['id']?>">
						<img class="item" src="../images/uploadimg/thumbs/thumb_<?php echo $val ?>"  data-src="" />

					<span class='subtitle'><?php echo $cat['name']?></span>
				</a>
			</div>
		<?php
	}
?>