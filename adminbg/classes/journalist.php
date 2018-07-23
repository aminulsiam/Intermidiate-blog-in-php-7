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

		// journalist login 
		public function journalistLogin($data)
		{
			$email    = $data['journalist_email'];
			$password = $data['journalist_password'];
			$md5pass  = sha1('$password');
			$query = "SELECT email,password FROM tbl_journalist WHERE email='$email' AND password='$md5pass' ";
			$result = $this->db->select($query);
			echo "<pre>";
			print_r($result);
			die();
			$value  = $result->fetch(PDO::FETCH_ASSOC);

			if($value){
				session_start();
				$_SESSION['journalist_email']= $value['name'];
				$_SESSION['id']= $value['id'];
				header('location:journalist_add_blog.php');
			}else{
				header('location:journalist_login.php');
			}
		}


	}//end class block
?>