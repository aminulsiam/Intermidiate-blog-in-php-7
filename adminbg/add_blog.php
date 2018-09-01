<?php
require_once 'classes/blog.php';

use Blog\Blog;

$blog = new Blog;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $msg = $blog->saveBlog($_POST);
}
?>

<?php include"./inc/header.php"; ?>
<!--header end-->


<!--sidebar start-->
<?php include"./inc/sidebar.php"; ?>
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
                            Add Blog
                        </header>
                        <div class="panel-body" style="padding: 40px;">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data">
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
                                                $result = $blog->selectCategoryInBlog();
                                                while ($value = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['category']; ?></option>
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
                                        <label for="lastname" class="control-label col-lg-3">Blog description : </label>
                                        <div class="col-lg-6">
                                            <textarea name="blog_description" id="editor1">    
                                            </textarea>
                                            <script>
                                                CKEDITOR.replace('editor1');
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
                                        <label for="lastname" class="control-label col-lg-3">Image caption : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="discription" name="image_caption" placeholder="enter image caption..." type="text">
                                        </div>
                                    </div>

                                    <div class="checkbox" style="margin-left: 26%;
                                         margin-bottom: 20px;">
                                        <label>
                                            <input type="checkbox" value="yes" name="importance">Want to see this post in home page ??
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="control-label col-lg-3">Status : </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="blog_status">
                                                <option value="0">Unpublished</option>
                                                <option value="1">Published</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary btn-block" type="submit" name="btn">Save</button>
                                        </div>
                                    </div>
                                </form>
                                <span>
                                    <?php
                                    if (isset($msg)) {
                                        echo '<script type="text/javascript">
                                                jQuery(function() {
                                                swal({
                                                title: "Blog created successfully !!!",
                                                icon: "success",
                                                button: "ok",
                                              });
                                            });
                                          </script> ';
                                    }
                                    ?>
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

    <?php include "./inc/footer.php"; ?>