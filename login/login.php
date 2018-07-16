<?php
  session_start();
	require "../classes/user.php";
	$user = new User;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$user->userLogin($_POST);
	}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../adminbg/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
  <title>User login</title>
</head>
    <body>
        <div class='login'>
          <?php 
            if(isset($_SESSION['wrong_msg'])){ 
           ?>          
            <div class="alert alert-danger text-center">
                <?php
                  echo $_SESSION['wrong_msg'];
                  unset($_SESSION['wrong_msg']);
                ?>  
            </div>
              <?php   }  ?>
            
          <h1>Login</h1>
            <form action="" method="post">
                <input name='username' required="" placeholder='Username' type='text'>
                <input id='pw' name='password' required="" placeholder='Password' type='password'>
                <input class='animated' type='submit' name="btn" value='Login'>
            </form>       
        </div>
    </body>
</html>













