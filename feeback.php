<?php
session_start();
if(isset($_SESSION["uid"])){
	header("location:home.php");
}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>THEROS</title>
		<link rel="stylesheet" href="style.css"/>

		</style>
</head>
<body>

<div class="header">
  <h1 >T H E R O S</h1>
  </div>

<ul class="nav">
  <li><a href="home.php">Home</a></li>
  
  <li class="dropdown">
    <a href="javascript:void(0)" "men.php" class="dropbtn">Products</a>
    <div class="dropdown-content">
      <a href="men.php">Men Clothing</a>
      <a href="#">Ladies Clothing</a>
      <a href="#">Accessories</a>
      
  <li><a href="#about">About</a></li>
  
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Account</a>
    <div class="dropdown-content">
      <a href="#">Sign In</a>
      <a href="#">Register</a>
    </div>
 
  </li>
</ul>
</div>

<div class="header">
  <h1 >SENT SUCCESSFULLY</h1>
  </div>

</body>
</html>