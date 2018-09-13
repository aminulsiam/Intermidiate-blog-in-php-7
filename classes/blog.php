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
			$query = "SELECT t1.*,t2.* FROM tbl_blog  AS t1 INNER JOIN tbl_image AS t2 
			          ON t1.id=t2.blog_id WHERE t1.status=1 ORDER BY t1.id DESC";
			return $this->db->select($query);          
		}

		// select blog by pagination
		public function selectBlogByPagination($start,$post_per_page)
		{
			$query = "SELECT t1.*,t2.* FROM tbl_blog AS t1 INNER JOIN tbl_image AS t2 
			          ON t1.id=t2.blog_id WHERE t1.status=1 LIMIT $start,$post_per_page 
			          ORDER BY t1.id DESC LIMIT 1,3";
			return $this->db->select($query);	
		}

		// if click category , every blog is showing under these category
		public function selectCategorywiseBlog($category)
		{
			$query = "SELECT t1.*,t2.*,t3.* FROM tbl_blog AS t1 INNER JOIN 
			          tbl_image AS t2 ON t1.id=t2.blog_id INNER JOIN
					  tbl_category AS t3 ON t1.category_id=t3.id WHERE 
					  t3.category='$category' AND t1.status=1 ORDER BY t1.id DESC";
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

		// select blog image and title as populer post
		public function selectBlogByPopulerity()
		{
			$query = "SELECT t1.id,t1.blog_title,t2.image FROM tbl_blog AS t1 INNER JOIN 
			tbl_image AS t2 ON t1.id=t2.blog_id WHERE t1.status=1 AND t1.blog_importance='yes'
			ORDER BY t1.id DESC ";
			return $this->db->select($query);          
		}
		

	}//end class block