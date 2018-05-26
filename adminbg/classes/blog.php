<?php
	/**
	* ==========  BLOG CLASS
	*/
	require_once '../db/db.php';
	require_once '../vendor/autoload.php';
	use Carbon\Carbon;

	define("BEGIN", "BEGIN");
	define("COMMIT","COMMIT");

	class Blog extends DB
	{
		private $db;

		public function __construct()
		{
			$this->db = new DB;
		}
		// SAVE BLOG
		public function saveBlog($data)
		{
			$category    = $this->db->validation($data['blog_category']);
			$blog_title  = $this->db->validation($data['blog_title']);
			$author      = $this->db->validation($data['blog_author']);
			$description = $data['blog_description'];
			$blog_status = $data['blog_status'];
			$blog_image  = $this->blogImage();
			$caption     = $this->db->validation($data['image_caption']);
			$created_at  = Carbon::now();
			BEGIN;
		    $query = "INSERT INTO tbl_blog(                                  category_id,blog_title,blog_author,blog_description,status,created_at) VALUES ('$category','$blog_title','$author','$description','$blog_status','$created_at');
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
	        $img_dict  = '../images/' . $u_name;
	        //$cheak     = getimagesize($tmp);
	        if(!empty($tmp)){
	        	if($size > 5242880){
	        		die("This file is too large.Upload a small file among 5 MB.");
	        	}else{
	        		if(in_array($case_img,$extention)){
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

		// select category when blog save
		public function selectCategoryInBlog()
		{
			$query = "SELECT id,category FROM tbl_category ORDER BY id DESC";
			return $this->db->select($query);
		}

		// select category in blog to see the categorywise blog
		public function selectAllCategory()
		{
			$query = "SELECT * FROM tbl_category ORDER BY id DESC";
			return $this->db->select($query);
		}

		// select blog by category
		public function selectAllBlogByCategory($category)
		{
			$query = "SELECT t1.*,t2.category FROM tbl_blog AS t1 INNER JOIN tbl_category AS t2 ON t1.category_id=t2.id WHERE category='$category' ORDER BY id DESC";
			return $this->db->select($query);
		}

		// select blog for update
		public function selectBlog($id)
		{
			$query = "SELECT t1.*,t2.*,t3.* FROM tbl_blog AS t1 INNER JOIN tbl_category AS t2 ON t1.category_id=t2.id INNER JOIN tbl_image AS t3 ON t1.id=t3.blog_id 
			    WHERE t1.id='$id'";
			return $this->db->select($query);
			
		}

		// update blog 
		public function updateBlog($data)
		{
			$id = $data['blog_id'];
			$image = $_FILES['blog_image']['name'];
			if($image != Null){
				$query = "SELECT * FROM tbl_image WHERE blog_id='$id'";
				$result = $this->db->select($query);
				$image_path = $result->fetch(PDO::FETCH_ASSOC);
				unlink($image_path['image']);
				$blog_title  = $this->db->validation($data['blog_title']);
				$category    = $this->db->validation($data['blog_category']);
				$author      = $this->db->validation($data['blog_author']);
				$description = $this->db->validation($data['blog_description']);
				$img_dict    = $this->db->blogImage();
				$caption     = $this->db->validation($data['image_caption']);

				$query = "UPDATE tbl_blog AS t1,tbl_image AS t2 SET 
				            t1.blog_title='$blog_title',  
				            t1.category_id='$category',
				            t1.blog_author='$author',
				            t1.blog_description='$description',
				            t2.image='$img_dict',
				            t2.image_caption='$caption' 
				            WHERE t1.id='$id' AND t2.blog_id=t1.id";
				$msg = $this->db->update($query);
				session_start();
				$_SESSION['msg'] = "Blog updated successfully";
				header("location:manage_blog.php?category='$category'");            
			}else{
				$category    = $this->db->validation($data['blog_category']);
				$blog_title  = $this->db->validation($data['blog_title']);
				$author      = $this->db->validation($data['blog_author']);
				$description = $this->db->validation($data['blog_description']);
				$caption     = $this->db->validation($data['image_caption']);

				$query = "UPDATE tbl_blog SET category_id='$category', blog_title='$blog_title',blog_author='$author',blog_description='$description' WHERE id='$id' ";
				$msg = $this->db->update($query);
				$_SESSION['msg'] = "Blog updated successfully";
				header("location:manage_blog.php?category=$category ");
			}	
		}

		// select all categoriwise  blog for admin
		public function selectBlogById($id){
			$query = "SELECT t1.*,t2.* FROM tbl_blog AS t1 INNER JOIN tbl_image AS t2 ON t1.id=t2.blog_id WHERE t1.id='$id' ";
			return $this->db->select($query);
		}





	}
?>