<?php
	namespace Frontend\Comment;

	/**
	* ------------  Comment Class
	*/

	require_once './db/db.php';
	require_once './vendor/autoload.php';

	class Comment
	{
		private $db;
		
		public function __construct()
		{
			$this->db = new \DB;
		}

		// save user comment
		public function saveComment($data,$title)
		{
			$title   = $title;
			$user_id = $data['user'];
			$comment = $data['comment'];
			$query = "INSERT INTO tbl_comment(blog_title,user_id,blog_comment) VALUES ('$title','$user_id','$comment')";
			$this->db->insert($query);
		}

		// select user comment
		public function selectUserComment($title)
		{
			$query = "SELECT t1.*,t2.username FROM tbl_comment AS t1 INNER JOIN tbl_user AS t2 ON t1.user_id=t2.id WHERE t1.blog_title='$title' ORDER BY id DESC";
			return $this->db->select($query);
		}



	}//end class block












