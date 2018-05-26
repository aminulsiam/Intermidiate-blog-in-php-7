<?php
	
	if(isset($_POST['id'])){
		require_once"../../db/db.php";
		$db = new DB;
		$id = $_POST['id'];
		$sql = "DELETE FROM tbl_blog WHERE id='$id'";
		$deleted = $db->delete($sql);
		if($deleted == true){
			$selectQuery = "SELECT * FROM tbl_image WHERE blog_id='$id'";
			$result = $db->select($selectQuery);
			$value  = $result->fetch(PDO::FETCH_ASSOC);
			unlink($value['image']);
			$deleteQuery = "DELETE FROM tbl_image WHERE blog_id='$id'";
			$db->delete($deleteQuery);

		}
	}
	