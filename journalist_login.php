
<!-- header and left sideber -->

<?php 
  include './partials/header_leftsideber.php';
  include './classes/journalist.php';

  use Journalist\Frontend\Journalist;

  if(isset($_SESSION['journalist_email'])){
    header('location:journalist_add_blog.php');
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $journalist = new Journalist;
    $journalist->journalistLogin($_POST);
  }
?>

<!-- start-content -->
<div class="content">
    
  <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Journalist Login <hr>
                        </header>
                        <div class="panel-body" style="padding: 40px;">
                            <div class="form" style="width: 120%">
                                <form class="cmxform form-horizontal " method="post" action="">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">E-mail : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" placeholder="enter your email here...." name="journalist_email" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Password : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="journalist_password" placeholder="enter your password" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-block btn-primary" type="submit" name="btn">login</button>
                                        </div>
                                    </div>
                                </form>
                                <span>
                                  <?php if(isset($msg)){  
                                echo '<script type="text/javascript">
                                    jQuery(function() {
                              swal({
                            title: "Blog created successfully !!!",
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



</div>

<!-- start rightsideber -->

<?php include './partials/right_sideber.php'; ?>

<!-- start footer  -->
<?php include './partials/footer.php'; ?>
    