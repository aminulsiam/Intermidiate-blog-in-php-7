<?php
	//namespace Category;

	require_once '../db/db.php';
	/**
	* ------------  CATEGORY CLASS
	*/
	class Category
	{
		private $db;

		public function __construct(){
			$this->db=new DB;
		}

		// SAVE CATEGORY 
		public function saveCategory($data)
		{
			$category = $data['category'];
			$query = "INSERT INTO tbl_category(category) VALUES ('$category')";
			$msg = $this->db->insert($query);
			return $msg;
		}

		// SELECT ALL CATEGORY
		public function selectAllCategory()
		{
			$query = "SELECT * FROM tbl_category ORDER BY id DESC";
			return $this->db->select($query);
			
		}

		// SELECT CATEGORY BY ID FOR UPDATE
		public function selectById($id)
		{
			$query = "SELECT id,category FROM tbl_category WHERE id='$id'";
			return $this->db->select($query);
		}

		// UPDATE CATEGORY
		public function updateCategory($data)
		{
			$category = $data['category'];
			$id       = $data['id'];
			$query = "UPDATE tbl_category SET category='$category' WHERE id='$id'";
			$this->db->update($query);
			session_start();
			$_SESSION['msg'] = "Category updated successfully";
			header("location:manage_category.php");
		}


	}
?>