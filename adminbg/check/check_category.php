<?php
	require_once"../../db/db.php";
	$db = new DB;
	if(!empty($_POST["category"])){
		$category = $_POST['category'];
		$sql = "SELECT category FROM tbl_category WHERE category='$category'";
		$result = $db->select($sql);
		$value = count($result->fetch(PDO::FETCH_ASSOC));
		if($value > 0 or $value != "No data is here") {
			echo 1;
		}else{
			echo 0;
		}
	}

?>