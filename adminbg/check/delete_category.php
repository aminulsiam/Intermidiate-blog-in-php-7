<?php
	
	if($_POST['id']){
		require_once"../../db/db.php";
		$db = new DB;
		$id = $_POST['id'];
		$sql = "DELETE FROM tbl_category WHERE id='$id'";
		$db->delete($sql);
	}
	