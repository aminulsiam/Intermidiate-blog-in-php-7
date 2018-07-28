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

		public function saveComment($data,$title)
		{
			$title   = $title;
			$user_id = $data['user'];
			$comment = $data['comment'];
			$query = "INSERT INTO tbl_comment(blog_title,user_id,blog_comment) VALUES ('$title','$user_id','$comment')";
			$this->db->insert($query);
		}



	}//end class block