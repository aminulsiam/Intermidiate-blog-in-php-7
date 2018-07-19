<?php
	namespace Frontend\Blog;

	/**
	* ------------  User Class
	*/

	require_once './db/db.php';
	require_once './vendor/autoload.php';
	use Carbon\Carbon;

	class Blog
	{
		private $db;
		
		public function __construct()
		{
			$this->db = new \DB;
		}

		// select all blog
		public function selectBlogInFrontend()
		{
			$query = "SELECT t1.*,t2.* FROM tbl_blog AS t1 INNER JOIN tbl_image AS t2 
			          ON t1.id=t2.blog_id WHERE t1.status=1";
			return $this->db->select($query);          
		}

		// select single blog if continue reading are clicking
		public function selectSingleBlogInFrontend($blog_id)
		{
			$query = "SELECT t1.*,t2.*,t3.* FROM tbl_blog AS t1 INNER JOIN 
					  tbl_image AS t2 ON t1.id=t2.blog_id INNER JOIN 
					  tbl_category AS t3 ON t1.category_id=t3.id WHERE t1.id = '$blog_id'";
			return $this->db->select($query);
		}

		public function selectCategorywiseBlog($category)
		{
			$query = "SELECT t1.*,t2.*,t3.* FROM tbl_blog AS t1 INNER JOIN 
			          tbl_image AS t2 ON t1.id=t2.blog_id INNER JOIN
					  tbl_category AS t3 ON t1.category_id=t3.id WHERE 
					  t3.category='$category' AND t1.status=1";
			return $this->db->select($query);
		}

		// title wise blog
		public function selectTitlewiseBlog($title)
		{
			$query = "SELECT t1.*,t2.*,t3.* FROM tbl_blog AS t1 INNER JOIN 
			          tbl_image AS t2 ON t1.id=t2.blog_id INNER JOIN
					  tbl_category AS t3 ON t1.category_id=t3.id WHERE 
					  t1.blog_title='$title' AND t1.status=1";
			return $this->db->select($query);	
		}

		
		

	}//end class block