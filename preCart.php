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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<link rel="stylesheet" href="css/style.css">


	<style>
		

				.befor-order{
				   position: absolute;
				  top: 0; left: 0;
				  z-index: 10000;
				  min-height: 100vh;
				  width:100%;
				  background:rgba(0,0,0,.8);
				  display: flex;
				  align-items: center;
				  justify-content: center;
				}


				.befor-order .back_video{
				  position: absolute;
				  top: 0; left: 0;
				  z-index: -1;
				  height: 100%;
				  width: 100%;
				  filter: blur(8px);
				  object-fit: cover;
				}


				.befor-order .befor-container{
				  margin:2rem;
				  padding:1.5rem 2rem;
				  border-radius: 2rem;
				  background:#fff;
				  width:50rem;
				  webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.5);
				  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.5);
				}

				.befor-order .befor-container .profile h3{
				  font-size: 3rem;
				  color:#444;
				  text-align: center;
				  padding:2rem 0;
				  font-family: 'Permanent Marker', cursive;
				  line-height: 1em;
				}

				.befor-order .befor-container .profile h3 span{
				  font-size: 1.8rem;
				  color: #cecece;
				  font-weight: 400;
				}


				.befor-order .befor-container .profile ul li{
				  list-style: none;
				  padding: 2rem 0;
				  border-top: 0.3rem solid rgba(0,0,0,0.09);
				  display: flex;
				  align-items: center;
				}

				.befor-order .befor-container .profile ul li img{
				  max-width: 5rem;
				  margin-right: 1.5rem;
				  opacity: 0.5;
				  transition: 0.5s;
				}

				.befor-order .befor-container .profile ul li:hover img{
				  opacity: 1;
				}

				.befor-order .befor-container .profile ul li a{
				  display: inline-block;
				  text-decoration: none;
				  color: #222;
				  font-weight: 500;
				  transition: 0.5s;
				  font-size: 2rem;
				  line-height: 1em;
				}

				.befor-order .befor-container .profile ul li a span{
				  font-size: 1.5rem;
				  font-weight: 400;
				   color: #555;
				}

				.befor-order .befor-container .profile ul li:hover a{
				  color: #ff5d94;
				}

				.befor-order .befor-container .profile ul li:hover a span{
				  color: #ff5d94;
				}






	</style>








</head>
<body>

<!---------------------------header section------------------------------------------->


<div class="befor-order">

	<video autoplay loop muted plays-inline class="back_video">
		<source src="images/eyetest.mp4" type="video/mp4">
	</video>
	
<div class="befor-container">
        <div class="profile">
			<h3>Thanks For adding the product in Cart<br><span>Would you like to buy anything else?</span></h3>
			<ul>
				<li><img src="https://static.lenskart.com/media/desktop/img/pdp/single_vision.png"><a href="#">Single Vision
					<br><span>For distance or near vision (Thin, anti-glare, blue-cut options)</span></a></li>
				<li><img src="https://static.lenskart.com/media/desktop/img/pdp/zero_power.png"><a href="#">Zero Power
					<br><span>Block 98% of harmful rays (Anti-glare and blue-cut options)</span></a></li>
				<li><img src="https://static.lenskart.com/media/desktop/img/pdp/bifocal.png"><a href="#">Bifocal/Progressive
					<br><span>Bifocal and Progressives (For two powe₹in same lenses)</span></a></li>
				<li><img src="https://static.lenskart.com/media/desktop/img/pdp/frame_only.png"><a href="cart.php" id="befor-Close">This Product Only
					<br><span>Buy Only This Product</span></a></li>
			</ul>
		</div>
</div>

</div>

























<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

<script src="js/script.js"></script>

<script>

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