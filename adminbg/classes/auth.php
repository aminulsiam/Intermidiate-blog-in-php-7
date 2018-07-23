<?php
	// namespace Auth;
	/**
	*  Auth class 
	*/
	require_once '../db/db.php';
	
	class Auth
	{
		private $db;

		public function __construct()
		{
			$this->db = new \DB;
		}

		// admin login 
		public function adminLogin($data)
		{
			$username = $data['username'];
			$password = $data['password'];
			$md5pass  = md5($password);
			$query = "SELECT username,password FROM tbl_admin WHERE username='$username' AND password='$md5pass'";
			$result = $this->db->select($query);
			$value  = $result->fetch(PDO::FETCH_ASSOC);
			if($value){
				session_start();
				$_SESSION['username']= $value['username'];
				$_SESSION['id']= $value['id'];
				header('location:dashboard.php');
			}else{
				header('location:index.php');
			}
		}

		// admin logout
		public function logout()
		{
		  unset($_SESSION['username']);
	          unset($_SESSION['id']);
	          header('location:index.php');
		}


	}
?>