<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * This is a placeholder class.
 * Create the same file in app/Controller/AppController.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       Cake.Controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {
	
	var $uses = array('Team');
	
	public function checkteam() {
		$team_id = $this->Session->read('team_id');
		$this->Session->write('referal_url', $this->here);
		if(!empty($team_id)) {
			//$this->layout = 'team';
			$find_team = $this->Team->findById($team_id); //debug($find_a);  //find admin details
			$this->set('find_team', $find_team);
			$this->set('team_id', $team_id);
		} else {
			echo '<script type="text/javascript">';
			echo 'window.location = "'.'http://'.$_SERVER['SERVER_NAME'].$this->webroot.'index.php'.'/teams/login"';
			echo '</script>';
		}
	}
	
	function file_extension($filename)
	{
		if(function_exists('pathinfo')) {
			$path_info = pathinfo($filename);
			if(isset($path_info['extension'])) {
				return $path_info['extension'];
			} else {
				return '';
			}
		} else {
			return '';
		}
	}
	
	function gd_thumbnail($input_filepath = null, $output_filepath = null, $ext = null)
	{
		$thumbwidth = 200;
		$thumbheight = 200;
		$medthumbhei = 360;
		$medthumbwid = 480;
		list($width, $height) = getimagesize($input_filepath);
		$ratio_orig = $width/$height;
//		echo $orgfile;
		if ($thumbwidth/$thumbheight > $ratio_orig) {
   		  $thumbwidth = $thumbheight*$ratio_orig;
		} else {
		   $thumbheight = $thumbwidth/$ratio_orig;
		}
		
//		$thumbname = $actualfile;
		$ext = strtolower($ext);
		$tn = imagecreatetruecolor($thumbwidth, $thumbheight);
		if($ext == "jpg")
		$image = imagecreatefromjpeg($input_filepath);
		else if($ext == "png")
		$image = imagecreatefrompng($input_filepath);
		else if($ext == "gif")
		$image = imagecreatefromgif($input_filepath);
		imagecopyresized($tn, $image, 0, 0, 0, 0, $thumbwidth, $thumbheight, $width, $height); 
		imagejpeg($tn, $output_filepath , 100); 
	}
	
	function gd_thumbnail_square($input_filepath = null,$output_filepath = null,$ext = null, $thumbwidth=86, $thumbheight=86)
	{
		list($width, $height) = getimagesize($input_filepath);
		$ratio_orig = $width/$height;
		
		$ext = strtolower($ext);
		$tn = imagecreatetruecolor($thumbwidth, $thumbheight);
		if($ext == "jpg")
		$image = imagecreatefromjpeg($input_filepath);
		else if($ext == "png")
		$image = imagecreatefrompng($input_filepath);
		else if($ext == "gif")
		$image = imagecreatefromgif($input_filepath);
		imagecopyresampled($tn, $image, 0, 0, 0, 0, $thumbwidth, $thumbheight, $width, $height); 
		imagejpeg($tn, $output_filepath , 100); 
		
		unlink($input_filepath);
	}

	function gd_mediumthumbnail($input_filepath = null,$output_filepath = null,$ext = null)
	{
		
		$thumbwidth = 100;
		$thumbheight = 100;
		$medthumbhei = 360;
		$medthumbwid = 480;
		list($width, $height) = getimagesize($input_filepath);
		$ratio_orig = $width/$height;
//		echo $orgfile;
		if ($medthumbwid/$medthumbhei > $ratio_orig) {
   		  $medthumbwid = $medthumbhei*$ratio_orig;
		} else {
		   $medthumbhei = $medthumbwid/$ratio_orig;
		}
		
//		$thumbname = $actualfile;
		$ext = strtolower($ext);
		//$mthumbpath = $uploadDir . $hash . "_M.jpg"; //// Path where thumb nail image will be stored
		$tn = imagecreatetruecolor($medthumbwid, $medthumbhei);		
		imagejpeg($tn, $output_filepath , 100); 
		
		if($ext == "jpg")
		$image = imagecreatefromjpeg($input_filepath);
		
		else if($ext == "png")
		$image = imagecreatefrompng($input_filepath);
		else if($ext == "gif")
		$image = imagecreatefromgif($input_filepath);
		
		imagecopyresized($tn, $image, 0, 0,0,0, $medthumbwid, $medthumbhei, $width, $height); 
		imagejpeg($tn, $output_filepath , 100); 
		
		unlink($input_filepath);
	}
	
	
	// E-mail validation
	function isValidEmail($temp_email) {
		
		// trim() the entered E-Mail
		$str_trimmed = trim($temp_email);
		// find the @ position
		$at_pos = strrpos($str_trimmed, "@");
		// find the . position
		$dot_pos = strrpos($str_trimmed, ".");
		// this will cut the local part and return it in $local_part
		$local_part = substr($str_trimmed, 0, $at_pos);
		// this will cut the domain part and return it in $domain_part
		$domain_part = substr($str_trimmed, $at_pos);
		if(!isset($str_trimmed) || is_null($str_trimmed) || empty($str_trimmed) || $str_trimmed == "") {
			//$this->email_status = "You must insert something";
			return false;
        } elseif(!$this->valid_local_part($local_part)) {
        	//$this->email_status = "Invalid E-Mail Address";
			return false;
		} elseif(!$this->valid_domain_part($domain_part)) {
			//$this->email_status = "Invalid E-Mail Address";
			return false;
		} elseif($at_pos > $dot_pos) {
			//$this->email_status = "Invalid E-Mail Address";
			return false;
		} elseif(!$this->valid_local_part($local_part)) {
			//$this->email_status = "Invalid E-Mail Address";
			return false;
		} elseif(($str_trimmed[$at_pos + 1]) == ".") {
			//$this->email_status = "Invalid E-Mail Address";
			return false;
		} elseif(!preg_match("/[(@)]/", $str_trimmed) || !preg_match("/[(.)]/", $str_trimmed)) {
			//$this->email_status = "Invalid E-Mail Address";
			return false;
		} else {
			//$this->email_status = "";
			return true;
		}
	}
	
	######## Three functions to HELP isValidEmail() ########
	function valid_dot_pos($email) {
		$str_len = strlen($email);
		for($i=0; $i<$str_len; $i++) {
			$current_element = $email[$i];
			if($current_element == "." && ($email[$i+1] == ".")) {
				return false;
				break;
			} else { }
		}
		return true;
	}
	
	function valid_local_part($local_part) {
		if(preg_match("/[^a-zA-Z0-9-_@.!#$%&'*\/+=?^`{\|}~]/", $local_part)) {
			return false;
		} else {
			return true;
		}
	}
	
	function valid_domain_part($domain_part) {
		if(preg_match("/[^a-zA-Z0-9@#\[\].]/", $domain_part)) {
			return false;
		} elseif(preg_match("/[@]/", $domain_part) && preg_match("/[#]/", $domain_part)) {
			return false;
		} elseif(preg_match("/[\[]/", $domain_part) || preg_match("/[\]]/", $domain_part)) {
			$dot_pos = strrpos($domain_part, ".");
			if(($dot_pos < strrpos($domain_part, "]")) || (strrpos($domain_part, "]") < strrpos($domain_part, "["))) {
				return true;
			} elseif(preg_match("/[^0-9.]/", $domain_part)) {
				return false;
			} else {
				return false;
			}
		} else {
			return true;
		}
	}
}
