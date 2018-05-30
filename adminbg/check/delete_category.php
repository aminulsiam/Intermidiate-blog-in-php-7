<?php

	require_once"../../db/db.php";
	$db = new DB;
	if(isset($_POST['id'])){
		$categoryId = $_POST['id'];
		$sql = "DELETE FROM tbl_category WHERE id='$categoryId'";
		$db->delete($sql);	
	}

	