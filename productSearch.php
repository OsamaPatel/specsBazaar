<?php include 'config/conn.php';?>
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
	<link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/logo/logo.jpeg">
</head>
<body>
<header class="header">

	<a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a>

	<form action="productSearch.php" method="get" class="search-form">
		<input type="search" name="search" placeholder="search here...." id="search-box">
		<button type="submit"><label for="search-box" class="fas fa-search"></label></button>
	</form>

	<div class="icons">
		<div id="menu-btn" class="fas fa-bars"></div>
		<div id="search-btn" class="fas fa-search"></div>
		<div herf="#" class="fas fa-shopping-cart" id="cart-btn"></div>
		<div class="fas fa-user" id="use"></div>
	</div>

	<div class="userr">
		<div class="profile">
			<div id="close-profile" class="fas fa-times"></div>
			<h3>Someone Name<br><span>Welcome to Specs Bazaar</span></h3>
			<ul>
				<li><i class="fa-regular fa-circle-user"></i><a href="#">My Profile</a></li>
				<li><i class="fas fa-edit"></i><a href="#">Edit Profile</a></li>
				<li id="res1"><i class="fas fa-shopping-cart"></i><a href="#">Cart</a></li>
				<li><i class="fas fa-box"></i><a href="#">My Order</a></li>
				<li><i class="fas fa-list"></i><a href="#">Terms</a></li>
				<li><i class="fas fa-right-from-bracket"></i><a href="#">Logout</a></li>
			</ul>
		</div>
	</div>
</header>
<nav class="navbar">

	<div id="close-navbar" class="fas fa-times"></div>

	<a href="#home">home</a>
	<a href="#sale">sale</a>
	<a href="#gallery">gallery</a>
	<a href="#popular">popular</a>
	<a href="#category">category</a>
	<a href="#review">review</a>
</nav>

<section class="popular" id="popular">
	<div class="box">
    <?php
    $search = $_GET['search'];
    $sql = "SELECT * FROM products WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row= mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $discounted_price=$row['discounted_price'];
                    $description=$row['description'];
                    $image_name=$row['image_name'];
    ?>

			<div class="mainbox">
				<a href="<?php echo SITEURL;?>detail.php?id=<?php echo $id;?>">
				<div class="images">
					<span class="discount">-25%</span>
					<img src="<?php echo SITEURL;?>images/products/<?php echo $image_name;?>" alt="">
					<div class="icons">
						<a href="#" class="fas fa-shopping-cart"></a>
						<a href="#" class="fas fa-heart"></a>
						<a href="#" class="fas fa-share"></a>
					</div>
				</div>

				<div class="content">
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star-half-alt"></i>
					</div>
					<p><?php echo $title; ?></p>
					<div class="price">Rs. <?php echo $discounted_price ?> <span>Rs.<?php echo $price; ?></span></div>
				</div>
			</a>
			</div>	

			

	
    <?php
        }
            }else{
                ?>
                    <h1>No Products Found</h1>
                <?php
            }
            ?>
</div>
</section>
	




<?php include 'partials/footer.php';?>

<script>
    lightGallery(document.querySelector('.gallery .lightbox'));

  


  var swiper = new Swiper(".banner-slider", {
  loop: true,
  grabCursor : true,
  spaceBetween: 20,
  autoplay: {
        delay: 2500,
        disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    550: {
      slidesPerView: 1,
    },
    850: {
      slidesPerView: 1,
    },
    1200: {
      slidesPerView: 1,
    },
  },
});

 let usr1 = document.querySelector('#use');
  let detail1 = document.querySelector('.userr');


  usr1.addEventListener('click', () => {
    detail1.style.visibility= "visible";
    detail1.style.opacity= "1";
  });

let clo1 = document.querySelector('#close-profile');

 clo1.addEventListener('click', () => {
      detail1.style.visibility= "hidden";
      detail1.style.opacity= "0";
    });


</script>


