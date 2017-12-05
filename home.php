<?php
session_start(); if(isset($_SESSION["uid"])){
	header("location:home.php");
}
?>
    <?php include ('header.php'); ?>



<html>
	<head>
		<meta charset="UTF-8">
		<title>THEROS</title>
		<link rel="stylesheet" href="style.css"/>

		</style>
</head>
<body>


<div class="w3-content w3-section" style="max-width: 900px">
<img class="mySlides" src="male.jpg" style="width: 143% ; height: 88%;">
  <img class="mySlides" src="men.jpg" style="width: 143%; height: 88%;">
<img class="mySlides" src="lol.jpg" style="width: 143% ; height: 88%;">

</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>

<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px">MEN</h1>
    <a href="men.php"><button>Shop Now</button></a>
  </div>
</div>

<div class="lady-image">
  <div class="lady-text">
    <h1 style="font-size:50px">WOMEN</h1>
    <a href="ladies.php"><button>Shop Now</button></a>
  </div>
</div>


<br>
  <div class="container">
    <center><h2 style="font-size:15px">Subscribe to our Newsletter</h2></center>
  </div>

  <div class="container" style="background-color:white;">
    <center><input type="text" placeholder="Email address" name="mail" required></center>
  

  <div class="container">
    <center><input type="submit" value="Subscribe"><center>
  </div>
</form>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<center><a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
<a href="#" class="fa fa-tumblr"></a></center>

<div id="footer-row1">
                    <div id="footer-bg">
                        <div id="footer" class="container_24">
                            <div class="copyright">
                              © THEROS PTE LTD 2017
                          </div>
                        </div>
                    </div>
                </div>



</body>
</html>