<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='format.css' />
<link rel='stylesheet' type='text/css' href='style.css' />
<?php include "header.php"; ?>
<div class="content">
<meta charset="utf-8">
<title>Registration</title>
</head>
<body>
<?php
$connection = mysqli_connect('localhost', 'root');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'users');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
 ?>
<?php
require('db_connection.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['user_name'])){
        // removes backslashes
	$user_name = stripslashes($_REQUEST['user_name']);
        //escapes special characters in a string
	$user_name = mysqli_real_escape_string($con,$user_name); 
	
	$user_email = stripslashes($_REQUEST['user_email']);
	$user_email = mysqli_real_escape_string($con,$user_email);
	$user_pass = stripslashes($_REQUEST['user_pass']);
	$user_pass = mysqli_real_escape_string($con,$user_pass);



     $query = "INSERT into `user` (user_name, user_email, user_pass)
VALUES ('$user_name', '$user_email', '".md5($user_pass)."')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='home.php'>Start shopping</a></div>";
        }
    }else{
?>
<div class="form">
<h2>Create an account</h2>
<form name="registration" action="" method="post">
	<input type="text" name="username" placeholder="Username" required />
	<input type="text" name="email" placeholder="Email" required/>
	<input type="text" name="password" placeholder="Password" required/>
	<input type="submit" class="registerbtn" value="Register" />
</form>
</div>
<a href="home.php">Back to home</a>
	<?php } ?>
</div>
<?php include "footer.php"; ?>
</body>
</html>
