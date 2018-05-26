<?php
	/**
	*  user class
	*/

	
	require_once '../db/db.php';
	require_once '../vendor/autoload.php';
	use Carbon\Carbon;

	class User extends DB
	{
		private $db;

		public function __construct()
		{
			$this->db = new DB;
		}

		// select all user for admin
		public function selectUser()
		{
			$query = "SELECT id,email,image,created_at,status FROM tbl_user ORDER BY id DESC";
			return $this->db->select($query);
		}


	}
?>