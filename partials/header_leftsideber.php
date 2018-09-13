<?php
	session_start();
    require "classes/Fcategory.php";
    
    use Category\Frontend\Category;

    $category = new Category;
    $result = $category->selectCategory();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>My-blog</title>
        <link rel="stylesheet" href="adminbg/css/bootstrap.min.css" >

        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <!-- Magnific image css -->
        <link rel="stylesheet" href="magnific/magnific-popup.css">
        <meta name="keywords" content="FeedLive iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <link href='//fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script src="adminbg/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <!---start-wrap---->
        <div class="wrap">
            <!---start-sidebar---->
            <div class="left-sidebar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" title="logo" /></a>
                    <h1>News Portal</h1>
                    
                    <div class="user_login_icon">
                        <?php
                        	if(isset($_SESSION['image'])){
                        		if($_SESSION['image'] != Null ){
                        			$path = $_SESSION['image'];
                        			$image = "<img src='classes/$path' class='user_login_img'  id='logout' style='margin-top: 0;'>";
                        			echo $image;
                                    // echo "<b style='color:white;'>".$_SESSION['username']."</b>";	
                        		}
                        	}else{
                        ?>
                        <span id='user_icon'>
                            <i class='fa fa-user-o'></i>
                        </span>
                        <?php } ?>

	                    <span id="logout_user">
	                        <div class="loginElement">
	                            <a href="logout.php">Logout</a>
	                        </div>
	                    </span>

	                    <span id="loginRegister">
	                        <div class="loginElement">
	                            <a href="login/login.php">Login</a> <b>|</b> 
	                            <a href="registration/registration.php">Registration</a>
	                        </div>
	                    </span>
                    </div>
               </div>
                <div class="top-nav">
                    <ul>
                        <?php 
                            while($value = $result->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <li class="category_li">
                            <a href="show_categorywise_blog.php?category=<?php echo $value['category'];?>">
                                <?php echo $value['category'];?>
                            </a>
                        </li>
                        <?php }  //end while ?> 
                    </ul>
                </div>
            </div>













