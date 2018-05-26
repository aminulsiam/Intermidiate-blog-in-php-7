<?php
	session_start();
	//require_once './classes/user.php';
	//$user = new User;
	if(isset($_GET['logout'])){
		$user->userLogout();
	}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>FeedLive Website Template | Home :: W3layouts</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
        <meta name="keywords" content="FeedLive iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <link href='//fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    	<!-- <h1><a href="?logout=logout">logout</a></h1> -->
        <!---start-wrap---->
        <div class="wrap">
            <!---start-sidebar---->
            <div class="left-sidebar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" title="logo" /></a>
                    <h1>Feedlive Blogger site</h1>
                    
                    <div class="user_login_icon">
                        <?php
                        	if(isset($_SESSION['image'])){
                        		if($_SESSION['image'] != Null ){
                        			$path = $_SESSION['image'];
                        			$image = "<img src='classes/$path' class='user_login_img'  id='logout' style='margin-top: 0;'>";
                        			echo $image;	
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>