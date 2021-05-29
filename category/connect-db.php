<?php
class db {
	//$conn,$result: la 2 gia tri trong resourse vi vay can phai kiem tra.
	public $conn = NULL;
	public $result = NULL;
	public $host="localhost";
	public $user="honest25_honest1";
	public $pass="I~H7hSkRF!@}M-u";
	public $database="honest25_testimonial";
    public $data = "";
    //define a maxim size for the uploaded images

    const MAX_SIZE = '10000';

	function __construct(){
		$this->conn = mysql_connect($this->host, $this->user, $this->pass);
		mysql_select_db($this -> database, $this->conn);
		mysql_query("set names 'utf8'"); 	 
	}

	function getdata($sql) {
		if (is_resource($this->conn)) {
			if (is_resource($this->result)) mysql_free_result($this->result);
			
				$this->result = mysql_query( $sql, $this->conn  );
		}
	}
	function fetchRow() {
		if (is_resource($this->result)) {
	   		$row = mysql_fetch_assoc($this->result);
	   		if (is_array($row))
			return $row;    		
		}
	return FALSE;
	} 
    // this is the function that will create the thumbnail image from the uploaded image
    // the resize will be done considering the width and height defined, but without deforming the image
    public function make_thumb($img_name, $filename, $desired_width)
    {
        
        //get image extension.
        $ext= $this->getExtension($img_name);
        
        //creates the new image using the appropriate function from gd library
        if(!strcmp("jpg",$ext) || !strcmp("jpeg",$ext))
        $src_img=imagecreatefromjpeg($img_name);
        
        if(!strcmp("png",$ext))
        $src_img=imagecreatefrompng($img_name);
        
        if(!strcmp("gif",$ext))
        $src_img=imagecreatefromgif($img_name);
        
        /* read the source image */
        $width = imageSX($src_img);
        $height = imageSY($src_img);
        
        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));
        
        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
        	
        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $src_img, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
        
        // output the created image to the file. Now we will have the thumbnail into the file named by $filename
        if(!strcmp("png",$ext))
        	imagepng($virtual_image,$filename);
        else if(!strcmp("gif",$ext))
        	imagegif($virtual_image,$filename);
        else
        	imagejpeg($virtual_image,$filename);
        
        //destroys source and destination images.
        imagedestroy($virtual_image);
        imagedestroy($src_img);
        
        return true;
    }
    
    // This function reads the extension of the file.
    // It is used to determine if the file is an image by checking the extension.
    public function getExtension($str) {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }
    
    public function addImages(){
        $errors=0;
        $width = mt_rand(250,450);
        // checks if the form has been submitted
        if(isset($_FILES))
        {
            //reads the name of the file the user submitted for uploading
            $image=$_FILES['file']['name'][0];
            // if it is not empty
            if ($image)
            {
                // get the original name of the file from the clients machine
                $filename = stripslashes($_FILES['file']['name'][0]);
                
                // get the extension of the file in a lower case format
                $extension = $this->getExtension($filename);
                $extension = strtolower($extension);
                // if it is not a known extension, we will suppose it is an error, print an error message
                //and will not upload the file, otherwise we continue
                if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
                {
                    echo '<h1>Unknown extension!</h1>';
                    $errors=1;
                }
                else
                {
                    // get the size of the image in bytes
                    // $_FILES[\'image\'][\'tmp_name\'] is the temporary filename of the file in which the uploaded file was stored on the server
                    $size=getimagesize($_FILES['file']['tmp_name'][0]);
                    $sizekb=filesize($_FILES['file']['tmp_name'][0]);
                    
                    //compare the size with the maxim size we defined and print error if bigger
                    if ($sizekb > db::MAX_SIZE*1024)
                    {
                        echo '<h1>You have exceeded the size limit!</h1>';
                        $errors=1;
                    }
                    
                    //we will give an unique name, for example the time in unix time format
                    $image_name=time().'.'.$extension;
                    //the new name will be containing the full path where will be stored (images folder)
                    //Create a folder if it doesn't already exist
                    if (!file_exists('../images/uploadimg')) {
                        mkdir('../images/uploadimg', 0777, true);
                    }
                    $newname="../images/uploadimg/".$image_name;
                    $copied = copy($_FILES['file']['tmp_name'][0], $newname);
                    //we verify if the image has been uploaded, and print error instead
                    if (!$copied)
                    {
                        echo '<h1>Copy unsuccessfull!</h1>';
                        $errors=1;
                    }
                    else
                    {
                        if (!file_exists('../images/uploadimg/thumbs')) {
                            mkdir('../images/uploadimg/thumbs', 0777, true);
                        }   
                        // the new thumbnail image will be placed in images/thumbs/ folder
                        $thumb_name='../images/uploadimg/thumbs/thumb_'.$image_name;
                        // call the function that will create the thumbnail. The function will get as parameters
                        //the image name, the thumbnail name and the width and height desired for the thumbnail
                        $thumb= $this->make_thumb($newname,$thumb_name,$width);
                        
                        /* update data into database */
                          
                        if ($thumb){
                            $sql = "INSERT INTO images (name)
                                                    VALUES ('$image_name')";
                                         
                            mysql_query($sql) or die (mysql_error()); 
                            $id = mysql_insert_id();
                            
                            if ($id > 0){
                                $sql1 = "UPDATE `images`
                                            SET 
                                                `order_id`         =   '$id'
                                            WHERE `id`= $id ";
                                            
                                mysql_query($sql1) or die (mysql_error());
                            }
                        }
                        
                    }
                }
                
                
              
            } 
            
        }
    }
    
    public function getListImage(){
        
        $sql = "SELECT * FROM  images order by order_id ASC";
                     
        $result = mysql_query($sql) or die (mysql_error());
        
        return $result;
        
    }
    
    function mysql_Array () {
        
        //$sql = "SELECT * FROM  images WHERE `cat_id`= '0'  order by order_id ASC";
        $sql = "SELECT * FROM  images order by order_id ASC";
                     
        $result = mysql_query($sql) or die (mysql_error());
        
        $i=0;
        
        $ret = array();
        while ($row = mysql_fetch_assoc($result)) {
            foreach ($row as $key => $value) {
                $ret[$i][$key] = $value;
                }
            $i++;
        }
        return ($ret);
    }
    
    public function updateDragDrop($image_id,$order_id){
        if ($image_id){
            $sql = "UPDATE `images`
                        SET 
                            `order_id`         =   '$order_id'
                        WHERE `id`= $image_id";
                    
            mysql_query($sql) or die (mysql_error());
        }
    }
    
    public function updateSubtitle($image_id,$subtitle){
        if ($image_id){
            $sql = "UPDATE `images`
                        SET 
                            `subtitle`         =   '$subtitle'
                        WHERE `id`= $image_id";
                   
            mysql_query($sql) or die (mysql_error());
        }
    }
    
    public function deleteImage($image_id){
        
        if ($image_id){
             $sql = "DELETE FROM images
            WHERE id = $image_id";
                     
        mysql_query($sql) or die (mysql_error()); 
        }
        
    }
	/* Category Functoin */
	public function addCat($cat_name){
		$id = mysql_insert_id();
		$sql = "INSERT INTO category (name)
							VALUES ('$cat_name')";
				 
		mysql_query($sql) or die (mysql_error());
		$id = mysql_insert_id();
                            
                        if ($id > 0){
                                $sql1 = "UPDATE `category`
                                            SET 
                                                `order_id`         =   '$id'
                                            WHERE `id`= $id ";
                                            
                                mysql_query($sql1) or die (mysql_error());
                            }		
	}
	public function getListCat(){
        
        $sql = "SELECT * FROM  category order by order_id ASC";
                     
        $result = mysql_query($sql) or die (mysql_error());
        
        return $result;
        
    }
	public function getTitleCat($cat_id){
        
        $sql = "SELECT name FROM  category WHERE id = $cat_id";
                     
        $result = mysql_query($sql) or die (mysql_error());
        $row = mysql_fetch_row($result); // get the single row.
		echo $row[0]; // display the value.
        
    }
	public function getImgFeatured($cat_id){
        
        $sql = "SELECT img_fetured FROM  category WHERE id = $cat_id";
                     
        $result = mysql_query($sql) or die (mysql_error());
        $row = mysql_fetch_row($result); // get the single row.
        
    }
	public function getImgByID($image_id){
        
        $sql = "SELECT * FROM  images WHERE id = $image_id";
                     
        $result = mysql_query($sql) or die (mysql_error());
        
        $i=0;
        
        $ret = array();
        while ($row = mysql_fetch_assoc($result)) {
            foreach ($row as $key => $value) {
                $ret[$i][$key] = $value;
                }
            $i++;
        }
        return ($ret);
        
    }
	public function deleteCat($cat_id){
        
        if ($cat_id){
             $sql = "DELETE FROM category
            WHERE id = $cat_id";
                     
        mysql_query($sql) or die (mysql_error()); 
        }
        
    }
	public function updateCattitle($cat_id,$cat_name){
        if ($cat_id){
            $sql = "UPDATE `category`
                        SET 
                            `name`         =   '$cat_name'
                        WHERE `id`= $cat_id";
                   
            mysql_query($sql) or die (mysql_error());
        }
    }
	public function setfeaturedimage($cat_id,$image_id){
        if ($cat_id){
            $sql = "UPDATE `category`
                        SET 
                            `img_fetured`         =   '$image_id'
                        WHERE `id`= $cat_id";
                   
            mysql_query($sql) or die (mysql_error());
        }
    }
	public function addimgforcat($listcat,$image_id){
	   
        /* check new category exists or not */
        $arr_new = explode(",",$listcat);
        $old_listcat = $this->getOldlistcat($image_id);
        $arr_old = explode(",",$old_listcat);
        
        if (!$arr_old) $arr_old = array();

        foreach($arr_new as $catnew_id){
            if( !in_array( $catnew_id ,$arr_old  ) )
            {
                $catnew .= $catnew_id.',';
                
            }else{
                
                $catnew = '';
            }
        }
        
        $new_listcat = trim($old_listcat.",".$catnew,',');
        
        if ($image_id){
            $sql = "UPDATE `images`
                        SET 
                            `cat_id`         =   '$new_listcat'
                        WHERE `id`= $image_id";
                    
            mysql_query($sql) or die (mysql_error());
        }
    }
    public function getOldlistcat($image_id){
        
        $sql = "SELECT cat_id FROM  images WHERE id = $image_id";
                     
        $result = mysql_query($sql) or die (mysql_error());
        $row = mysql_fetch_row($result); // get the single row.
        
        return $row[0];
        
    }
	public function removeimgforcat($image_id, $cat_id){
	   
        $old_listcat = $this->getOldlistcat($image_id);
        $arr_old = explode(",",$old_listcat);
        unset($arr_old[array_search( $cat_id, $arr_old )]);
        $new_listcat = trim(implode(",",$arr_old),",");
        //echo $new_listcat; 
        
        if ($image_id){
            $sql = "UPDATE `images`
                        SET 
                            `cat_id`         =   '$new_listcat'
                        WHERE `id`= $image_id";
                 
            mysql_query($sql) or die (mysql_error());
        }
    }
	public function updateCatDragDrop($cat_id,$order_id){
        if ($cat_id){
            $sql = "UPDATE `category`
                        SET 
                            `order_id`         =   '$order_id'
                        WHERE `id`= $cat_id";
                    
            mysql_query($sql) or die (mysql_error());
        }
    }
	function catsql_Array () {
        
        $sql = "SELECT * FROM  category order by order_id ASC";
                     
        $result = mysql_query($sql) or die (mysql_error());
        
        $i=0;
        
        $ret = array();
        while ($row = mysql_fetch_assoc($result)) {
            foreach ($row as $key => $value) {
                $ret[$i][$key] = $value;
                }
            $i++;
        }
        return ($ret);
    }
	function img_by_cat($cat_id) {
        
        $sql = "SELECT * FROM  images WHERE INSTR(`cat_id`, '{$cat_id}') > 0 order by order_id ASC";
                  
        $result = mysql_query($sql) or die (mysql_error());
        
        $i=0;
        
        $ret = array();
        while ($row = mysql_fetch_assoc($result)) {
            foreach ($row as $key => $value) {
                $ret[$i][$key] = $value;
                }
            $i++;
        }
        return ($ret);
    }
	function catbyid($cat_id) {
        
        $sql = "SELECT * FROM  category WHERE `id`= $cat_id order by order_id ASC";
                     
        $result = mysql_query($sql) or die (mysql_error());
        
        $i=0;
        
        $ret = array();
        while ($row = mysql_fetch_assoc($result)) {
            foreach ($row as $key => $value) {
                $ret[$i][$key] = $value;
                }
            $i++;
        }
        return ($ret);
    }
}

?>