<?php include 'config/conn.php'; ?>
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
	
	
	<meta property="og:image" itemprop="image" content="http://127.0.0.1/images/logo/logo.png">

	<link rel="icon" href="images/logo/logo.jpeg">
	<link rel="stylesheet" href="css/style.css">


</head>
<body>

<!---------------------------header section------------------------------------------->

<header class="header">

	<a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a>

	<form action="productSearch.php" method="get" class="search-form">
		<input type="search" name="search" placeholder="search here...." id="search-box" required>
		<button type="submit"><label for="search-box" class="fas fa-search"></label></button>
	</form>

	<div class="icons">
		<div id="menu-btn" class="fas fa-bars"></div>
		<div id="search-btn" class="fas fa-search"></div>
		<a href="cart.php" class="fas fa-shopping-cart" id="cart-btn"></a>
		<div herf="#" class="fas fa-user" id="login-btn"></div>
		<div class="fas fa-user" id="use"></div>
	</div>
	
	<div class="userr">
		<div class="profile">
			<div id="close-profile" class="fas fa-times"></div>
			<h3>Someone Name<br><span>Welcome to Specs Bazaar</span></h3>
			<ul>
				<li><i class="fa-regular fa-circle-user"></i><a href="#">My Profile</a></li>
				<li><i class="fas fa-edit"></i><a href="#">Edit Profile</a></li>
				<li id="res1"><i class="fas fa-shopping-cart"></i><a href="cart.php">Cart</a></li>
				<li><i class="fas fa-box"></i><a href="myOrder.php">My Order</a></li>
				<li><i class="fas fa-list"></i><a href="#">Terms</a></li>
				<li><i class="fas fa-right-from-bracket"></i><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>

</header>
<!---------------------------header end------------------------------------------->

<!--------------------------navbar section----------------------------------------->

<nav class="navbar">

	<div id="close-navbar" class="fas fa-times"></div>

	<a href="#home">home</a>
	<a href="#category">category</a>
	<a href="#shop">Sale products</a>
	<a href="#popular">popular</a>
	<a href="#gallery">gallery</a>
	<a href="#arrivals">New arrivals</a>
	<a href="#contact">contact us</a>
</nav>

<div class="book">
	<a href="#"><img src="images/book.png">
</div>