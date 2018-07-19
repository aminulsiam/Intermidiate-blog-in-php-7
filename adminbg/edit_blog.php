<?php
	require_once 'classes/blog.php';

    use Blog\Blog;
    
	$blog = new Blog;

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $blog->selectBlog($id);
        $value = $result->fetch(PDO::FETCH_ASSOC);
    }

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$msg = $blog->updateBlog($_POST);        
	}
?>

	<?php include"./inc/header.php";?>
<!--header end-->


	<!--sidebar start-->
		<?php include"./inc/sidebar.php";?>
	<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- MAIN CONTENT START -->
			<div class="">
            <!-- page start-->
           
            
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update Blog
                        </header>
                        <div class="panel-body" style="padding: 40px;">
                            <div class="form">

                                <form class="cmxform form-horizontal " method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Blog title : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" value="<?php echo $value['blog_title'];?>" name="blog_title" type="text" >
                                            <input class="form-control" value="<?php echo $value['id'];?>" name="blog_id" type="hidden" >
                                        </div>
                                    </div>

                                    <div class="form-group">
									    <label class="control-label col-lg-3">Category : </label>
										   <div class="col-lg-6">
				                            <select class="form-control" name="blog_category" id="category">
    										   	  <option>Select category</option>
    										   	<?php 
    										   		$category_result = $blog->selectCategoryInBlog();
    										   		while($category_value = $category_result->fetch(PDO::FETCH_ASSOC)){ 
    										   	?>
    										      <option value="<?php echo $category_value['id'];?>"><?php echo $category_value['category'];?></option>
    										    <?php } ?>
										    </select>
										    
										   </div>
								  	</div>

                                    <div class="form-group ">
                                        <label class="control-label col-lg-3">Author : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="blog_author" value="Admin" readonly="" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-lg-3">Blog description : </label>
                                        <div class="col-lg-6">
                                        	<textarea name="blog_description" id="editor1">
                                               <?php echo $value['blog_description'];?>    
            								</textarea>
								            <script>
								                CKEDITOR.replace( 'editor1' );
								            </script>
                                        	<!-- 
                                            <input class=" form-control" name="blog_description"  --><!-- placeholder="enter blog description..." type="text"> -->
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="image" class="control-label col-lg-3">Picture : </label>
                                        <div class="col-lg-6">
                                            <input class="form-control-file" name="blog_image" type="file" style="margin-top: 5px;">
                                            <span>
                                                 <img src="<?php echo $value['image'];?>" width="100px" height="150px">
                                            </span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Image caption : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="discription" name="image_caption" value="<?php echo $value['image_caption'];?>" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label col-lg-3">Status : </label>
                                           <div class="col-lg-6">
                                                 <select class="form-control" name="blog_status">
                                                    <?php 
                                                        if($value['status']==0){
                                                    ?>
                                                      <option value="0">Unpublished</option>
                                                      <?php }else{?>
                                                      <option value="1">Published</option>
                                                      <?php } ?>
                                                </select>
                                           </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" name="btn">Save</button>
                                        </div>
                                    </div>
                                </form>


                                <span>
                                	<?php if(isset($msg)){  
		                         		echo '<script type="text/javascript">
		                         				jQuery(function() {
											        swal({
													  title: "Blog inserted successfully done!",
													  icon: "success",
													  button: "ok",
													});
											    });
		                         			  </script> ';
                         	 		}?>
                                </span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>

		<!-- MAIN CONTENT END -->
	</section>
 <!-- footer -->

         <script type="text/javascript">
             document.getElementById('category').value="<?php echo $value["category_id"];?>";
         </script>   

 		<?php include "./inc/footer.php";?>