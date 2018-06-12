<?php
  require_once 'classes/blog.php';

  use Blog\Blog;
  
  $blog = new Blog;
  $result = $blog->selectAllCategory();
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
            <div class="">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Categorywise Blog
                        </header>
                        <div class="panel-body" style="padding: 40px;">
                            <div class="form">
                              
                              <div class="col-md-2"></div>
                <div class="col-md-7">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th><h4>Sl No.</h4></th>
                        <th><h4>Category</h4></th>
                        <th><h4>All blog</h4></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $i = 1;
                          while ($value = $result->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $value['category'];?></td>
                        <td>
                          <a href="manage_blog.php?category=<?php echo $value['category'];?>">
                            <button class="btn btn-info btn-block">see all blog</button>
                          </a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              
                  
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>

    </section>



         <!-- footer -->
            <?php include 'inc/footer.php';?>		  
         <!-- / footer -->

         