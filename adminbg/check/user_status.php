<?php
	require_once"../../db/db.php";
	$db = new DB;

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$status = $_POST['status'];
		$query = "UPDATE tbl_user SET status='$status' WHERE id='$id'";
		$db->update($query);	
	}
	
	

