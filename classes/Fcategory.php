<?php
	namespace Category\Frontend;

	/**
	* Frondted category class
	*/

	require_once './db/db.php';
	require_once './vendor/autoload.php';
	use Carbon\Carbon;

	class Category
	{
		private $db;
		
		function __construct()
		{
			$this->db = new \DB;
		}

		// select category in fronted leftsideber
		public function selectCategory()
		{
			$query = "SELECT id,category FROM tbl_category ORDER BY id DESC";
			return $this->db->select($query);
		} 

	}
?>