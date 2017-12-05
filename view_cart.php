<?php
session_start();
include_once("config.php");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="shopstyle.css" rel="stylesheet" type="text/css"></head>
<body>

<link rel="stylesheet" href="style.css"/>
<div class="header">
  <h1>THEROS</h1>
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

<br>
</div>

<h1 align="center">View Cart</h1>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
  <tbody>
 	<?php
	if(isset($_SESSION["cart_products"])) //check session var
    {
		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table 
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			//set variables to use in content below
			$product_name = $cart_itm["product_name"];
			$product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"];
			$product_size = $cart_itm["product_size"];
			$subtotal = ($product_price * $product_qty); //calculate Price x Qty
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
		    echo '<tr class="'.$bg_color.'">';
			echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
			echo '<td>'.$product_name.'</td>';
			echo '<td>'.$currency.$product_price.'</td>';
			echo '<td>'.$currency.$subtotal.'</td>';
			echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal); //add subtotal to total var
        }
		
		$grand_total = $total ; //grand total including shipping cost
				$grand_total    = $grand_total;  //total
		}
		
	
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;"> Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
    <tr><td colspan="5"><a href="men.php" class="button">Add More Items</a><button type="submit">Update</button><a href="Sen.php" class="button">Cash on Delivery</a></tr></td>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

</body>
</html>