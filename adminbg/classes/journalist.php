<?php
	 namespace Journalist\Admin;
	/**
	*  Journalist class 
	*/
	require_once '../db/db.php';
	
	class Journalist 
	{
		private $db;

		public function __construct()
		{
			$this->db = new \DB;
		}

		// insert journalist
		public function addJournalist($data)
		{
			$name     = $data['journalist_name'];
			$email    = $data['journalist_email'];
			$number   = $data['journalist_number'];
			$password = md5($data['journalist_password']);

			$query = "INSERT INTO tbl_journalist(name,email,phone,password) VALUES('$name','$email','$number','$password')";
			return $this->db->insert($query);
		}


	}
?>