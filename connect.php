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
    
    public function addTestimonial(){
        
           
       
        $order_id   = $_POST['order_id'];
        $content  = addslashes($_POST['content']);
        $author = addslashes($_POST['author']);
        $link  = $_POST['link'];
            
        $sql = "INSERT INTO testimonial (content, author, order_id, link)
                                VALUES ('$content', '$author', '$order_id', '$link')";
                                
                        
        mysql_query($sql) or die (mysql_error());
         
       
        
    }
    
    public function updateTestimonial($testimonial_id=""){
        
        
        $order_id   = $_POST['order_id'];
        $content  = addslashes($_POST['content']);
        $author = addslashes($_POST['author']);
        $link  = $_POST['link'];

        
        
        $sql = "UPDATE `testimonial`
                SET 
                    `content`         =   '$content' ,
                    `author`       =   '$author',
                    `order_id`     =   '$order_id' ,
                    `link`    =   '$link'
                WHERE `id`= $testimonial_id ";
                
        mysql_query($sql) or die (mysql_error());  
        
    }
    
    public function deleteTestimonial($testimonial_id=""){
        
        $sql = "DELETE FROM testimonial
            WHERE id = $testimonial_id";
                     
        mysql_query($sql) or die (mysql_error());       
        
    }
    
    public function detailTestimonial($testimonial_id=""){
        
        
        if ($testimonial_id){
            
            $sql = "SELECT testimonial.*  FROM  testimonial WHERE testimonial.id = $testimonial_id";
        }
        
              
        $result = mysql_query($sql) or die (mysql_error());
        
        return mysql_fetch_assoc($result);
        
        
    }
    
    public function getListTestimonial(){
        
        $sql = "SELECT * FROM  testimonial order by order_id ASC";
                     
        $result = mysql_query($sql) or die (mysql_error());
        
        return $result;
          
    }
    
    function mysql_resultTo2DAssocArray () {
        
        $sql = "SELECT * FROM  testimonial order by order_id ASC";
                     
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
    
    public function updateRate($testimonial_id="",$rate=""){
        
        
        $sql = "UPDATE `testimonial`
                SET 
                    `rate`         =   '$rate'
                WHERE `id`= $testimonial_id ";
                
        mysql_query($sql) or die (mysql_error()); 
        
        if (mysql_affected_rows() == 1)
            return true;
        else
            return false; 
        
    }
}

?>