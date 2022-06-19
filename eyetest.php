<?php 
include 'config/conn.php';
if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $whatsapp_contact = $_POST['whatsapp_contact'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $tester = ' ';
        $visited = 'No';
        $sql = "INSERT INTO eye_test SET
            email= '$email',
            username= '$username',
            contact= $contact,
            address= '$address',
            whatsapp_contact= $whatsapp_contact,
            visited = '$visited',
            tester='$tester'
        ";
        $res = mysqli_query($conn, $sql);
    
        if($res==TRUE)
        {
            ?>
            <script>window.location.href='<?php echo SITEURL;?>index.php'
                close();
            </script>;
            <?php
        }  
        
        else
        {
            ?>
            <script>window.location.href='<?php echo SITEURL;?>index.php'</script>;
            <?php
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SpecsBazaar</title>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

    <link rel="icon" href="images/logo/logo.jpeg">
	<link rel="stylesheet" href="css/style.css">


</head>
<body>

<!---------------------------header section------------------------------------------->

<header class="header">

	<a href="#home" class="logo"><img src="images/logo.jpg" alt=""></a>

	<div class="icons">
		<div id="menu-btn" class="fas fa-bars"></div>
		<div herf="#" class="fas fa-shopping-cart" id="cart-btn"></div>
		<div herf="#" class="fas fa-user" id="login-btn"></div>
	</div>

</header>
<!---------------------------header end------------------------------------------->

<!--------------------------navbar section----------------------------------------->

<nav class="navbar">

	<div id="close-navbar" class="fas fa-times"></div>

	<a href="#home">home</a>
	<a href="#sale">sale</a>
	<a href="#gallery">gallery</a>
	<a href="#popular">popular</a>
	<a href="#category">category</a>
	<a href="#review">review</a>
</nav>

<!--------------------------navbar section----------------------------------------->


<!---------------------------home try on form ------------------------------->

<section class="hometrial">

	<video autoplay loop muted plays-inline class="back_video">
		<source src="images/eyetest.mp4" type="video/mp4">
	</video>
	



	<div class="home-try-container">

	    <form action="" method="post">
	        <h3>Eye test at Home</h3>

	        <div class="inputBox">
                <input type="text" placeholder="name" name="username">
                <input type="email" placeholder="email" name="email">
            </div>
            <div class="inputBox">
                <input type="text" placeholder="number" name="contact">
                <input type="text" placeholder="whatsapp number" name="whatsapp_contact">
            </div>
            <textarea placeholder="Address" name="address" id="" cols="30" rows="10"></textarea>
	        <input type="submit" name="submit" value="Submit" class="btn">
	    </form>

	</div>












</section>




<!---------------------------home try on form ------------------------------->





<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

<script src="js/script.js"></script>




</body>
</html>