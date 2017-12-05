<?php

$host = "localhost";
$user = "root";
$password ="";
$database = "users";

$id = "";
$product_name = "";
$product_desc = "";
$product_img_name = "";
$price = "";

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
    $posts[1] = $_POST['product_name'];
    $posts[2] = $_POST['product_desc'];
    $posts[3] = $_POST['product_img_name'];
	$posts[4] = $_POST['price'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM products WHERE id = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $id = $row['id'];
                $product_name = $row['product_name'];
                $product_desc = $row['product_desc'];
                $product_img_name = $row['product_img_name'];
				 $price = $row['price'];
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
   $product_name=$_POST['product_name'];
   $product_desc=$_POST['product_desc'];
   $product_img_name=$_POST['product_img_name'];
   $price=$_POST['price'];
   
  
   
    // mysql query to Update data
    $query = "INSERT INTO `products`(`id`,`product_name`, `product_desc`, `product_img_name`, `price`)  VALUES ('$id','$product_name', '$product_desc', '$product_img_name', '$price')";
   
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
    $delete_Query = "DELETE FROM `products` WHERE `id` = $data[0]";
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
   $product_name=$_POST['product_name'];
   $product_desc=$_POST['product_desc'];
   $product_img_name=$_POST['product_img_name'];
   $price=$_POST['price'];
   
  
   
    // mysql query to Update data
    $query = "UPDATE `products` SET `product_name`='".$product_name."',`product_desc`='".$product_desc."',`product_img_name`='".$product_img_name."',`price`= $price WHERE `id` = $id";
   
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


<!DOCTYPE Html>
<html>
	<head>
		
<br>
<br>
<br>
<?php include ('admin_home.php');?>
		 <div align="center">
        <form action="crudproducts.php" method="post">
            <input type="text" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br>
            <input type="text" name="product_name" placeholder="Product Name" value="<?php echo $product_name;?>"><br><br>
            <input type="text" name="product_desc" placeholder="Product Description" value="<?php echo $product_desc;?>"><br><br>
            <input type="text" name="product_img_name" placeholder="Image Name" value="<?php echo $product_img_name;?>"><br><br>
			 <input type="text" name="price" placeholder="Price" value="<?php echo $price;?>"><br><br>
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
    </body>
</html>
