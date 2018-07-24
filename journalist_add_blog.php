
<!-- header and left sideber -->

<?php 
  include './partials/header_leftsideber.php';
  include './classes/journalist.php';

  use Journalist\Frontend\Journalist;

  if(!$_SESSION['journalist_email']){
    header('location:adminbg/404.html');
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $journalist = new Journalist;
    $msg = $journalist->saveJournalistBlog($_POST);
  }

?>

<!-- start-content -->
<div class="content">
    
  <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Blog <a href="logout.php" style="float: right">
                              <button class="btn btn-danger">logout</button>
                            </a> <hr>
                        </header>
                        <div class="panel-body" style="padding: 40px;">
                            <div class="form" style="width: 120%">
                                <?php 
                                  if(isset($msg)){
                                    echo "<h4 class='text-success alert alert-success' style='width:72%;margin-bottom:5%;margin-left:8%;';>your blog is send to admin , if admin accepted your blog then is published.</h4>";
                                  }
                                ?>
                                <form class="cmxform form-horizontal " method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Blog title : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" placeholder="enter blog title here...." name="blog_title" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                      <label for="" class="control-label col-lg-3">Category : </label>
                       <div class="col-lg-6">
                         <select class="form-control" name="blog_category">
                          <option>Select category</option>
                          <?php
                            $result = $category->selectCategory();
                            while ($value=$result->fetch(PDO::FETCH_ASSOC)) {
                          ?>
                          <option value="<?php echo $value['id']?>"><?php echo $value['category'];?></option>
                        <?php }?>
                        </select>
                        
                       </div>
                    </div>

                                    <div class="form-group ">
                                        <label class="control-label col-lg-3">Author : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="blog_author" value="<?php echo $_SESSION['journalist_name'];?>" readonly type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Blog description : </label>
                                        <div class="col-lg-6">
                                          <textarea name="blog_description" id="editor1">    
                            </textarea>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>
                                          <!-- 
                                            <input class=" form-control" name="blog_description"  --><!-- placeholder="enter blog description..." type="text"> -->
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="image" class="control-label col-lg-3">Blog Picture : </label>
                                        <div class="col-lg-6">
                                            <input class="form-control-file" name="blog_image" type="file" style="margin-top: 5px;">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="caption" class="control-label col-lg-3">Image caption : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="discription" name="image_caption" placeholder="enter image caption..." type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-block btn-primary" type="submit" name="btn">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>



</div>

<!-- start rightsideber -->

<?php include './partials/right_sideber.php'; ?>

<!-- start footer  -->
<?php include './partials/footer.php'; ?>
    