<?php
	/**
	* ------------  User Class
	*/

	require_once '../db/db.php';
	require_once '../vendor/autoload.php';
	use Carbon\Carbon;

	class User extends DB
	{
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
			$username = $this->validation($data['username']);
			$password = $this->validation(md5($data['password']));
			$email    = $data['email'];
			$picture  = $this->userImage();
			$created  = Carbon::now();
			$query = "INSERT INTO tbl_user(username,password,email,image,created_at) VALUES ('$username','$password','$email','$picture','$created')";
			$msg = $this->insert($query);
			// return $msg;
		}

		// user login
		public function userLogin($data)
		{
			$username = $data['username'];
			$password = md5($data['password']);
			$query = "SELECT username,password,image,status FROM tbl_user WHERE username='$username' AND password='$password'";
			$result = $this->select($query);
			$value  = $result->fetch(PDO::FETCH_ASSOC);
			$count  = $result->rowCount();
			if($count > 0){
				if($value['status'] == 1){
					session_start();
					$_SESSION['username']= $value['username'];
					$_SESSION['id']= $value['id'];
					$_SESSION['image'] = $value['image'];
					header('location:../index.php');
				}else{
					header('location:login.php');
				}
			}else{
				//header('location:index.php');
				die("wrong cretentials");
			}
		}
		

	}//end class block