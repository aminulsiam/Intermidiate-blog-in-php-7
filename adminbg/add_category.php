<?php
	require_once 'classes/category.php';
	$category = new Category;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$msg = $category->saveCategory($_POST);
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
	

	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
          
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <strong>Add Category</strong>
                            <!-- <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span> -->
                        </header>
                        <div class="">
                            <div class="form">
                                <form action="" method="post" name="myform">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3 ">
                                        	<span class="pull-right">Category name : </span>
                                    	</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" onkeyup="checkAvailability()" required name="category" id="category" placeholder="Enter category name">
                                            <span id="category_availability"></span> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-8" style="padding-top: 1%">
                                            <button class="btn btn-info btn-width" id="btn" type="submit" name="btn">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                         <h3 class="text-center text-success">
                         	<?php if(isset($msg)){  
                         		echo '<script type="text/javascript">
                         				jQuery(function() {
									        swal({
											  title: "Blog category created!!",
											  icon: "success",
											  button: "ok",
											});
									    });
                         			  </script> ';
                         	 }?>
                         </h3>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
</section>

         <!-- footer -->
            <?php include 'inc/footer.php';?>		  
         <!-- / footer -->
