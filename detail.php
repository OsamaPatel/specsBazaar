<?php 
	include 'config/conn.php';
	if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM products WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $discounted_price = $row2['discounted_price'];
        $image_name = $row2['image_name'];
        $category_id = $row2['category_id'];
        $featured = $row2['featured'];
        $color = $row2['color'];
        $popular = $row2['popular'];
        $active = $row2['active'];

    }
    $sql = "SELECT * FROM category WHERE active='Yes'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if($count>0)
        {
        	while($row=mysqli_fetch_assoc($res))
            {
                $category = $row['title'];
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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta property="og:title" content="<?php echo $title; ?>">
	<meta property="og:image" itemprop="image" content="http://127.0.0.1/images/logo/logo.png">
	<meta property="og:site_name" content="http://127.0.0.1/adminPanel/">
  <link rel="icon" href="images/logo/logo.jpeg">
	<link rel="stylesheet" href="css/style.css">


</head>
<body>

<!---------------------------header section------------------------------------------->

<header class="header">

	<a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a>

	<form action="productSearch.php" class="search-form" method="post">
		<input type="search" name="search" placeholder="search here...." id="search-box">
		<label for="search-box" class="fas fa-search"></label>
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
<div class="bla">
<section class="product">

    <div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "<?php echo SITEURL; ?>images/products/<?php echo $image_name;?>" alt = "">
              </a>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title"><?php echo $title;?></h2>
          <a href = "https://www.google.com/maps/place/Specs+Bazaar/@19.1196214,72.8855387,15z/data=!4m12!1m6!3m5!1s0x0:0xeaeea358ad63b114!2sSpecs+Bazaar!8m2!3d19.1196214!4d72.8855387!3m4!1s0x0:0xeaeea358ad63b114!8m2!3d19.1196214!4d72.8855387" class = "product-link">visit Specs Bazaar</a>
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div>

          <div class = "product-price">
          	<p class = "new-price">New Price: <span>Rs. <?php echo $discounted_price;?></span></p>
            <p class = "last-price">Old Price: <span>Rs. <?php echo $price;?></span></p>
          </div>

          <div class = "product-detail">
            <h2>about this item: </h2>
            <p><?php echo $description;?></p>
			<ul>
              <li><i class="fas fa-check-circle"></i>Color: <span><?php echo $color ?></span></li>
              <li><i class="fas fa-check-circle"></i>Available: <span>in stock</span></li>
              <li><i class="fas fa-check-circle"></i>Category: <span><?php echo $category;?></span></li>
              <li><i class="fas fa-check-circle"></i>Shipping Area: <span>Kurla, Andheri ...</span></li>
              <li><i class="fas fa-check-circle"></i>Shipping Fee: <span>Free</span></li>
            </ul>
          </div>

          <div class = "purchase-info">
          	<div class="val">
              <form action="addToCart.php" method="get">
              <input type="hidden" name="id" value="<?php echo $id;?>">
          		<label>Number of items: </label>
            	<input type = "number" name="quantity" min = "0" value = "1" max="5">
        	</div>
        	<button type = "button" class = "btn">Buy on  <i class="fab fa-whatsapp"></i></button>
          
          <button type="submit" class = "btn" id="Orderrr">
              Add to Cart <i class = "fas fa-shopping-cart"></i>
          </button>
          </form>
          </div>

        
        </div>
      </div>
    </div>

</section>


<div class="recom">



	<div class="swiper recommendation-slider">
		
		<div class="swiper-wrapper">
			
			
			<?php
			$sql = "SELECT * FROM products WHERE recommend='YES'";
			$res = mysqli_query($conn, $sql);
			$count = mysqli_num_rows($res);

			if($count>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
					$id = $row['id'];
					$title = $row['title'];
					$image_name = $row['image_name'];
					$price = $row['price'];
					$discounted_price = $row['discounted_price'];
					?>
					<div class="swiper-slide slide">
            	<div class="mainbox">
	            	<div class="images">
						<span class="discount">-25%</span>
						<img src="<?php echo SITEURL; ?>images/products/<?php echo $image_name; ?>" alt="">
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
						<div class="price">Rs.<?php echo $discounted_price ?><span>Rs.<?php echo $price;?></span></div>
					</div>
				</div>
				</div>
				<?php
				}
					}else{
						?>
							<h1>No Products Recommended at the Moment</h1>
						<?php
					}
				?>
            
        </div>
    </div>
</div>










































<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

    	<div class="box">
            <h3>about us</h3>
            <p>Driven by the mission to provide the best eye care to all, We have pan-India reachability with 50 eye care centres across the country. Our recently opened</p>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a class="link" href="#home"> <i class="fas fa-angle-right"></i> home</a>
            <a class="link" href="#shop"> <i class="fas fa-angle-right"></i> shop</a>
            <a class="link" href="#gallery"> <i class="fas fa-angle-right"></i> gallery</a>
            <a class="link" href="#team"> <i class="fas fa-angle-right"></i> team</a>
            <a class="link" href="#arrivals"> <i class="fas fa-angle-right"></i> arrivals</a>
            <a class="link" href="#blogs"> <i class="fas fa-angle-right"></i> blogs</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#" class="link"> <i class="fas fa-angle-right"></i> my order </a>
            <a href="#" class="link"> <i class="fas fa-angle-right"></i> my favorite </a>
            <a href="#" class="link"> <i class="fas fa-angle-right"></i> my wishlist </a>
            <a href="#" class="link"> <i class="fas fa-angle-right"></i> private policy </a>
            <a href="#" class="link"> <i class="fas fa-angle-right"></i> terms of use </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <p> <i class="fas fa-phone"></i> +123-456-7890 </p>
            <p> <i class="fas fa-phone"></i> +111-222-3333 </p>
            <p> <i class="fas fa-envelope"></i> khan.sfaisal@gmail.com </p>
            <p> <i class="fas fa-map"></i> mumbai, india - 400072 </p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div>
        </div>

    </div>

<!----    <div class="credit"></div>  ---->

</section>

</div>

<!-- footer section ends -->



<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".recommendation-slider", {
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
      slidesPerView: 2,
    },
    850: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 3,
    },
  },
});



	const imgs = document.querySelectorAll('.img-select a');
	const imgBtns = [...imgs];
	let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);
    


const bok = document.querySelector('#Orderrr');
const bokf = document.querySelector('.befor-order-container');
const bokc = document.querySelector('#befor-Close');
const blla = document.querySelector('.bla');


bok.addEventListener('click', () =>{
  	bokf.classList.add('active');
  	blla.classList.add('active');
});

bokc.addEventListener('click', () =>{
   bokf.classList.remove('active');
   blla.classList.remove('active');
});


let usr2 = document.querySelector('#use');
  let detail2 = document.querySelector('.userr');


  usr2.addEventListener('click', () => {
    detail2.style.visibility= "visible";
    detail2.style.opacity= "1";
  });

let clo2 = document.querySelector('#close-profile');

 clo2.addEventListener('click', () => {
      detail2.style.visibility= "hidden";
      detail2.style.opacity= "0";
    });


</script>




</body>
</html>