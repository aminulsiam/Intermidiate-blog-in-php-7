<?php
  require_once 'classes/blog.php';
  $blog = new Blog;

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $blog->selectBlogById($id);  
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
    
    <!-- ============ main content start  =================  -->



<section class="wrapper">
    <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Basic table
    </div>
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
            <th>Sl No.</th>
            <th>Author</th>
            <th>Blog title</th>
            <th>Description</th>
            <th>Status</th>
            <th data-breakpoints="xs sm md" data-title="DOB">Time</th>
            <th data-breakpoints="xs">Image</th>
            <th>Caption</th>
          </tr>
        </thead>
        
        <tbody>
          <?php 
            $i = 1;
            while( $value = $result->fetch(PDO::FETCH_ASSOC)){
          ?>
          <tr data-expanded="true">
            <td class="col-md-1"><?php echo $i++;?></td>
            <td class="col-md-1"><?php echo $value['blog_author'];?></td>
            <td class="col-md-2"><?php echo $value['blog_title'];?></td>
            <td class="col-md-4"><?php echo $value['blog_description'];?></td>
            <td class="col-md-1">
              <?php 
                if($value['status'] == 1){
                  echo "Published";
                }else{
                  echo "Unpublished";
                }
              ?>
            </td>
            <td class="col-md-1"><?php echo $value['created_at'];?></td>
            <td>
              <a href="<?php echo $value['image'];?>" class="test-popup-link">image</a>
            </td>
            <td class="col-md-2"><?php echo $value['image_caption'];?></td>
          </tr>
          <?php }?>
        </tbody>

      </table>
    </div>
  </div>
</div>
</section>
      
      
    
    <!-- ============ main content end  =================  -->



         <!-- footer -->
            <?php include 'inc/footer.php';?>     
         <!-- / footer -->































