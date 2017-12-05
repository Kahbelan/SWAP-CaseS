<?php  
        include("db_connection.php");  
        $view_users_query="select * from user";//select query for viewing users.  
        $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $id=$row[0];  
            $user_name=$row[1];  
            $user_email=$row[2];  
            $user_pass=$row[3];  
		}
  
  
?>
<html> 
<?php include ('admin_home.php'); ?>
<body>     

		<div class="table-scrol">  

<div class="table-responsive">
 <div align="center">
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
  
        <tr>  
 
            <th>User Id</th>  
            <th>User Name</th>  
            <th>User E-mail</th>  
            <th>User Pass</th>  
   
        </tr>  
        </thead>
		<td><?php echo $id;  ?></td>  
        <td><?php echo $user_name;  ?></td>  
        <td><?php echo $user_email;  ?></td>  
        <td><?php echo $user_pass;  ?></td>
		</table>

</div>
</div>
</div>
</body>
</html>
  
 
 