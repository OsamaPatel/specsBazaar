<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lenskart</title>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">


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

<section class="coupongen">

	<video autoplay loop muted plays-inline class="back_video">
		<source src="images/coupon.mp4" type="video/mp4">
	</video>
	



	<div class="get-coupon-container">

	    <form action="">
	        <h3>Generate Coupon Code</h3>

	        <div class="inputBox">
                <input type="text" placeholder="name" id="name">
                <input type="email" placeholder="email" id="email">
            </div>
            <div class="inputBox">
                <input type="text" placeholder="number" id="number">
                <input type="text" placeholder="whatsapp number" id="wnumber">
            </div>
            <div class="choose">
                 <label for="category">Get Coupon Code: </label>
                 <div class="dropdown">
				  		<input type="text" class="textBox" placeholder="Choose a Product" readonly id="choice">
				  		<div class="caret"></div>
				  	<div class="menu">
					    <div onclick="show('Eyeglasses')" class="active">Eyeglasses</div>
					    <div onclick="show('Sunglasses')">Sunglasses</div>
					    <div onclick="show('Computer Glasses')">Computer Glasses</div>
					   	<div onclick="show('Contact Lenses')">Contact Lenses</div>
					    <div onclick="show('Power Sunglasses')">Power Sunglasses</div>
					    <div onclick="show('Readng Glasses')">Readng Glasses</div>
					    <div onclick="show('Glasses')">Glasses</div>
					 </div>
				 </div>
            </div>
	        <input type="submit" onclick="gotowhatsapp()" value="Submit" class="btn">
	    </form>

	</div>












</section>




<!---------------------------home try on form ------------------------------->





<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

<script src="js/script.js"></script>

<script>
	

const dropdowns = document.querySelectorAll(".dropdown");

dropdowns.forEach(dropdown => {
  const select = dropdown.querySelector(".textBox");
  const caret = dropdown.querySelector(".caret");
  const menu = dropdown.querySelector(".menu");

  select.addEventListener('click', () => {
    caret.classList.toggle("caret-rotate");
    menu.classList.toggle("menu-open");
  });
 });

var userdata ="";

function show(anything) {
	document.querySelector(".textBox").value = anything;
	 userdata = anything;
	 console.log(userdata);
};


function gotowhatsapp(){
	var name = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var number = document.getElementById("number").value;
	var wnumber = document.getElementById("wnumber").value;


	var url = "https://wa.me/919137761883?text=" + "Name: " + name + "%0a" + "Email: " + email + "%0a" + "Mobile Number: " + number + "%0a" + "whatsapp Number: " + wnumber + "%0a" + "get coupon: " + userdata;



	window.open(url, "-_blank").focus();

}



</script>




</body>
</html>