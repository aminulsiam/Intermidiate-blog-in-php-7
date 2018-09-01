<?php
require_once 'classes/journalist.php';

use Journalist\Admin\Journalist;

$blog = new Journalist;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $msg = $blog->addJournalist($_POST);
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
                            Add Journalist
                        </header>
                        <div class="panel-body" style="padding: 40px;">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data">

                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Journalist name : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" placeholder="enter name here...." name="journalist_name" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Journalist E-mail : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" placeholder="enter email here..." name="journalist_email" type="email">
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Phone number : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="discription" name="journalist_number" placeholder="enter contact number here..." type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Password : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="discription" name="journalist_password" placeholder="enter password here..." type="password">
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
                                                            title: "Journalist added successfully !!!",
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