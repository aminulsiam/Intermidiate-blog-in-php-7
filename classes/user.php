<?php
	/**
	* ------------  User Class
	*/

	require_once '../db/db.php';
	require_once '../vendor/autoload.php';
	use Carbon\Carbon;

	class User
	{
		private $db;
		public function __construct()
		{
			$this->db = new DB;
		}

		// user image function
		public function userImage()
		{
		    // usage 3rd party pakages
	            $image = new Bulletproof\Image($_FILES);
		    $image->setLocation('../images');
		    $image->setDimension(600, 400);
		    if($image["image"]){
		        $upload = $image->upload(); 
		        if($upload == true){
		            return $upload->getFullPath();
		        }else{
		            echo $image["error"]; 
		        }
		    }
	            
		}

		// Registration user information
		public function saveUser($data)
		{
			$username = $this->db->validation($data['username']);
			$password = $this->db->validation(md5($data['password']));
			$email    = $data['email'];
			$picture  = $this->userImage();
			$created  = Carbon::now();
			$query = "INSERT INTO tbl_user(username,password,email,image,created_at) VALUES ('$username','$password','$email','$picture','$created')";
			$this->insert($query);
		}

		// user login
		public function userLogin($data)
		{
			$username = $data['username'];
			$password = md5($data['password']);
			$query = "SELECT username,password,image,status FROM tbl_user WHERE username='$username' AND password='$password'";
			$result = $this->db->select($query);
			$value  = $result > 0 ? $result->fetch(PDO::FETCH_ASSOC) : " ";
			$count  = $result > 0 ? $result->rowCount() : " ";
			if($count > 0){
				if($value['status'] == 1){
					session_start();
					$_SESSION['username']= $value['username'];
					$_SESSION['id']= $value['id'];
					$_SESSION['image'] = $value['image'];
					header('location:../index.php');
				}else{
					$_SESSION['status_msg'] = "This admin deactivated your accout,please conntact this site admin.";
					header('location:login.php');
				}
			}else{
				$_SESSION['wrong_msg'] = "Please give valid username and password";
				header('location:login.php');
			}
		}
		

	}//end class block