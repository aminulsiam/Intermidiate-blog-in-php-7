<?php
	require "config.php";
	class DB{
		protected static $connect;
		
		// Database connect

			public function __construct()
			{
					try{
						self::$connect = new PDO('mysql:host='.host.';dbname='.db, user, pass);
						//$this->dbconnect=$connect;
					}catch(PDOException $e){
						echo $e->getMessage();
					}
			}

		//=========== Insert query 
		
			public function insert($query)
			{
					$stmt = self::$connect->prepare($query);
					$insert = $stmt->execute();
					if($insert){
						$msg = "Data Inserted Successfully Done";
						return $msg;
					}else{
						die("something wrong, please try again");
					}
			}

		//============ Select query
		
			public function select($query)
			{
					$stmt = self::$connect->prepare($query) or die("wrong");
	    	    	$stmt->execute();
		    	    if($stmt->rowCount()>0){
		    	    	return $stmt;
		    	    }else{
		    	    	return "Nothing found ";
		    	    }
		    	    //return $stmt->rowCount()>0 ? $stmt : false;
			}

		//=========== Update query
		
			public function update($query)
			{
				$stmt = self::$connect->prepare($query);
				$updated = $stmt->execute();
				if($updated){
					$msg = "Data updated Successfully";
					return $msg;
				}else{
					die("Data not updated,something went wrong");
				}
			}

		//============= Delete query
		
			public function delete($query)
			{
				$stmt = self::$connect->prepare($query);
				$delete = $stmt->execute();
				if($delete){
					$msg = "Data Delete Successfully";
					return $msg;
				}else{
					die("Data not Delete,something went wrong");
				}
			}

		// data validation
		public function validation($data) 
		{
		  //$data   = trim($data);
		  $string = str_replace(' ',' ', $data); // Replaces all spaces with hyphens.
   		  $data   = preg_replace('/[^A-Za-z0-9\. -]/','', $string); // Removes special chars.
   		  //$data   = mysqli_real_escape_string(self::$connect,$data);
		  return $data;
		}
	
}
	
?>