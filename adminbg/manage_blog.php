<?php
  require_once 'classes/blog.php';
  $blog = new Blog;
  if(isset($_GET['category'])){
    $category = $_GET['category'];
    $result = $blog->selectAllBlogByCategory($category);  
  }
  
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
     Manage all <strong class="text-info"><?php echo $category;?></strong> category blog
    </div>
   <div id="delete"></div>
    <div>
      <table class="table table-hover table-bordered" ui-jq="footable" ui-options='{
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
            <th class="col-md-1">Sl No.</th>
            <th class="col-md-2">Title</th>
            <th class="col-md-1">Author</th>
            <th class="col-md-5 text-center">Blog Description</th>
            <th class="col-md-1">Date</th>
            <th class="col-md-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1 ; while ($value = $result->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr id="<?php  echo $value['id'];?>">
            <td><?php echo $i++;?></td>
            <td><?php echo $value['blog_title'];?></td>
            <td><?php echo $value['blog_author'];?></td>
            <td><?php echo strip_tags($value['blog_description']);?></td>
            <!-- <td><?//php echo $value['comment'];?></td> -->
            <td><?php echo $value['created_at'];?></td>
            <td>
              <a href="blog_details.php?id=<?php echo $value['id'];?>">
              	<i class="fa fa-eye"></i>
              </a> |
              <a href="edit_blog.php?id=<?php echo $value['id'];?>" class="btn btn-sm"> <i class="glyphicon glyphicon-pencil" style="color: blue"></i></a>|
              <a class="btn btn-sm" onclick="deleteBlog(<?php echo $value['id'];?>)">
                <i class="glyphicon glyphicon-trash"></i>
              </a>
              <!-- //deleteCategory(<?php //echo $value['id'];?>) -->
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>



         <!-- footer -->
            <?php include 'inc/footer.php';?>		  
         <!-- / footer -->
