
<!-- header and left sideber -->

<?php 
  include './partials/header_leftsideber.php'; 
  // if(!$_SESSION['username']){
  //   header('location:adminbg/404.html');
  // }
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
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">E-mail : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" placeholder="enter your email here...." name="blog_title" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Password : </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="discription" name="image_caption" placeholder="enter your password" type="password">
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
    