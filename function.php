<?php
    // First execute a common code to connect to the database and start the session
    require("db_connection.php");
    
    if(empty($_SESSION['admin_name']))
    {
        header("Location: admin_login.php");
        
        die("Redirecting to login.php");
    }
	?>
Access denied. Please login
<html>
<div> 
<a href="admin_login.php">Log in</a>
</div>
</html>
