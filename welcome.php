<?php  
session_start(); ?> 
<?php include ('header.php'); ?>
  

<html>  
<head>  
     <link type="text/css" rel="stylesheet" href="style.css">  

    <title>  
        Registration  
    </title>  
</head>  
  
<body>  
<h1>Welcome</h1><br>  
<?php 
 
echo $_SESSION['email'];  
?>  
  
  
<h1><a href="logout.php">Logout here</a> </h1>  
  
  
</body>  
  
</html>
<?php include ('footer.php'); ?>