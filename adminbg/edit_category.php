<?php
require_once 'classes/category.php';

use Category\Category;

$category = new Category;

// SELECT CATEGORY
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $category->selectById($id);
    $value = $result->fetch(PDO::FETCH_ASSOC);
}

// UPDATE CATEGORY
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $msg = $category->updateCategory($_POST);
}
?>
<!--header start-->
<?php include 'inc/header.php'; ?>
<!--header end-->
<!--sidebar start-->
<?php include 'inc/sidebar.php'; ?>
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
                            <strong>Edit Category</strong>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form action="" method="post" name="myform">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3 ">
                                            <span class="pull-right">Category name : </span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" onkeyup="checkAvailability()" class="form-control" required name="category" id="category"
                                                   value="<?php echo $value['category']; ?>">
                                            <span id="category_availability"></span>

                                            <input type="hidden" onkeyup="checkAvailability()" class="form-control" required name="id" id="category"
                                                   value="<?php echo $value['id']; ?>">
                                            <span id="category_availability"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-5 col-lg-8" style="padding-top: 1%">
                                            <button class="btn btn-info btn-width" id="btn" type="submit" name="btn">update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
    </section>

    <!-- footer -->
    <?php include 'inc/footer.php'; ?>		  
    <!-- / footer -->
