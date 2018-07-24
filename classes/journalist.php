<?php
	 namespace Journalist\Frontend;
	/**
	*  Journalist class 
	*/
	require_once './db/db.php';
	require_once './vendor/autoload.php';
	require_once './bndate.php';

	define("BEGIN", "BEGIN");
	define("COMMIT","COMMIT");
	
	class Journalist
	{
		private $db;
		private $bongabda;

		public function __construct()
		{
			$this->db = new \DB;
		}

		// journalist login 
		public function journalistLogin($data)
		{
			$email    = $data['journalist_email'];
			$password = $data['journalist_password'];
			$md5pass  = md5($password);
			$query = "SELECT email,password,name FROM tbl_journalist WHERE email='$email' AND password='$md5pass' ";
			$result = $this->db->select($query);
			$value  = $result->fetch(\PDO::FETCH_ASSOC);

			if($value){
				session_start();
				$_SESSION['journalist_email']= $value['email'];
				$_SESSION['journalist_name']=$value['name'];
				$_SESSION['id']= $value['id'];
				header('location:journalist_add_blog.php');
			}else{
				header('location:journalist_login.php');
			}
		}

		// journalist blog save
		public function saveJournalistBlog($data)
		{
			$category    = $data['blog_category'];
			$blog_title  = $data['blog_title'];
			$author      = $data['blog_author'];
			$description = $data['blog_description'];
			$blog_status = (int)0;
			$blog_image  = $this->blogImage();
			$caption     = $data['image_caption'];
			$created_at  = bn_date(date('l, d M Y, h:i a'));
			BEGIN;
		    $query = "INSERT INTO tbl_blog(category_id,blog_title,blog_author,blog_description,status,created_at) VALUES ('$category','$blog_title','$author','$description','$blog_status','$created_at');
					INSERT INTO tbl_image(image,image_caption,blog_id) VALUES ('$blog_image','$caption',LAST_INSERT_ID())";
			COMMIT;
			$msg = $this->db->insert($query);
			return $msg;
		}

		// SAVE BLOG IMAGE 
		public function blogImage()
		{
			$name      = $_FILES['blog_image']['name'];
			$tmp       = $_FILES['blog_image']['tmp_name'];
			$size      = $_FILES['blog_image']['size'];
			$extention = array('jpg','jpeg','png','gif');
			$img_type  = pathinfo($name, PATHINFO_EXTENSION);
	        $case_img  = strtolower($img_type);
	        $u_name    = substr(md5(time()), 0,10).'.'.$case_img;
	        $img_dict  = './images/' . $u_name;
	        //$cheak     = getimagesize($tmp);
	        if(!empty($tmp)){
	        	if($size > 5242880){
	        		die("This file is too large.Upload a small file among 5 MB.");
	        	}else{
	        		if(\in_array($case_img,$extention)){
	        			move_uploaded_file($tmp,$img_dict);
	        			return $img_dict;
	        		}else{
	        			die("Please upload a valid image");
	        		}
	        	}
	        }else{
	        	die("Upload image is must . otherwise you can't upload a blog.");
	        } 
		}



	}//end class block
?>