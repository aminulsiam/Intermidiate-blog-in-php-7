<?php
	 namespace Journalist\Frontend;
	/**
	*  Journalist class 
	*/
	require_once './db/db.php';
	
	class Journalist 
	{
		private $db;

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


	}//end class block
?>