<?php
  require "../classes/user.php";
  $user = new User;
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $user->saveUser($_POST);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../adminbg/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/registration.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/registration.css">
  <title>User registration</title>
</head>
    <body>
        <div class='login'>
            <h1>Register</h1>
            
            <form action="" method="post" enctype="multipart/form-data">
                <input name='username' required="" placeholder='Username' type='text'>
                <input id='pw' name='password' required="" placeholder='Password' type='password'>
                <input name='email' required="" placeholder='E-Mail Address' type='text'>
                <br><br>
                <input name='image' required="" type='file'>
                <input class='animated' type='submit' name="btn" value='Register'>
            </form>
            <a class='forgot' href='../login/login.php'>Already have an account?</a>       
        </div>
    </body>
</html>













