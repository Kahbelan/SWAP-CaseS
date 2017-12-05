

<?php

$host = "localhost";
$user = "root";
$password ="";
$database = "users";

$id = "";
$user_name = "";
$user_email = "";
$user_pass = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['user_name'];
    $posts[2] = $_POST['user_email'];
    $posts[3] = $_POST['user_pass'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM user WHERE id = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $id = $row['id'];
                $user_name = $row['user_name'];
                $user_email = $row['user_email'];
                $user_pass = $row['user_pass'];
				 
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    
   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "users";
   
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
   //get values form input text and number
   $id = $_POST['id'];
   $user_name=$_POST['user_name'];
   $user_email=$_POST['user_email'];
   $user_pass=$_POST['user_pass'];
 
  
   
    // mysql query to Update data
    $query = "INSERT INTO `user`(`id`,`user_name`, `user_email`, `user_pass`)  VALUES ('$id','$user_name', '$user_email', '$user_pass')";
   
   $result = mysqli_query($connect, $query);
   
   if($result)
   {
       echo 'Data inserted';
   }else{
       echo 'Data Not inserted';
   }
   mysqli_close($connect);
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `user` WHERE `id` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    
   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "users";
   
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
   
   //get values form input text and number
   $id = $_POST['id'];
   $user_name=$_POST['user_name'];
   $user_email=$_POST['user_email'];
   $user_pass=$_POST['user_pass'];
  
   
    // mysql query to Update data
    $query = "UPDATE `user` SET `user_name`='".$user_name."',`user_email`='".$user_email."',`user_pass`= '".$user_pass."' WHERE `id` = $id";
   
   $result = mysqli_query($connect, $query);
   
   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($connect);
}




?>


<html>
	<head>
		
<br>
<br>
<br>
<?php include ('admin_home.php'); ?>

 
		<div align ="center">
        <form action="view_users.php" method="post">
            <input type="text" name="id" placeholder="User's ID" value="<?php echo $id;?>"><br><br>
            <input type="text" name="user_name" placeholder="Username" value="<?php echo $user_name;?>"><br><br>
            <input type="text" name="user_email" placeholder="User's email" value="<?php echo $user_email;?>"><br><br>
            <input type="text" name="user_pass" placeholder="User's password" value="<?php echo $user_pass;?>"><br><br>
		    <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
				
			
              </div>
        </form>
	<form action="all_users.php" method="post">
                <!-- Input to Find All Values -->
				<input type="submit" name="search" value="View all" >
			</form>
    </body>
</html>
