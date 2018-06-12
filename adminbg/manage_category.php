<?php
  require_once 'classes/category.php';

  use Category\Category;
  
  $category = new Category();
  $result = $category->selectAllCategory();
?>
    <!--header start-->
        <?php include 'inc/header.php';?>
    <!--header end-->
    <!--sidebar start-->
        <?php include 'inc/sidebar.php';?>
    <!--sidebar end-->
<!--main content start-->
<section id="main-content">
		
		<!-- ============ TABLE =================  -->

			<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     <strong>Manage Category</strong>
    </div>
   <div id="delete"></div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th class="col-md-1"></th>
            <th class="col-md-3">ID</th>
            <th class="col-md-3">Category Name</th>
            <th class="col-md-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1 ; while ($value = $result->fetch(PDO::FETCH_ASSOC)) { ?>
	          <tr id="<?php echo $value['id'];?>">
	            <td></td>
	            <td><?php echo $i++;?></td>
	            <td><?php echo $value['category'];?></td>
	            <td>
	              <a class="btn btn-sm" href="edit_category.php?id=<?php echo $value['id'];?>">
	                <i class="glyphicon glyphicon-pencil"></i></a> |
	              <a class="btn btn-sm" onclick="deleteCategory(<?php echo $value['id'];?>)">
                  <i class="glyphicon glyphicon-trash"></i>
                </a>
	            </td>
	          </tr>
          <?php } ?>
        </tbody>
      </table>
      <h3 class="text-success text-center">
      	<?php 
      		if(isset($_SESSION['msg'])){ 
      			echo $_SESSION['msg'];
      			unset($_SESSION['msg']);
      		  } 
      	?>			
      </h3>
    </div>
  </div>
</div>
</section>

         <!-- footer -->
            <?php include 'inc/footer.php';?>		  
         <!-- / footer -->
