<?php include('partials/header.php'); ?>
<!--------------------------navbar section----------------------------------------->

<div class="subcategory">

	<div class="swiper subcat-slider">
		
		<div class="swiper-wrapper">

			<a href="https://wa.me/919137761883?text=HI" class="swiper-slide box" target="_blank" id="w">
				<img src="images/chat.png" id="sub" alt="">
				<p>Chat With Us</p>
			</a>

			<a href="getcoupon.php" class="swiper-slide box" id="w">
				<img src="images/cupon.png" id="sub"  alt="">
				<p>Get Coupon</p>
			</a>

			<a href="eyetest.php" class="swiper-slide box" target="_blank" >
				<img src="images/eyetest.png" id="sub" alt="">
				<p>Home Eye Test</p>
			</a>

			<a href="hometry.php" class="swiper-slide box" id="w" target="_blank">
				<img src="images/hometry.png" id="sub" alt="">
				<p>Home Try On</p>
			</a>

			<a href="#" class="swiper-slide box">
				<img src="images/cg.png" id="sub" alt="">
				<p>Computer Glasses</p>
			</a>

			<a href="#" class="swiper-slide box">
				<img src="images/girl.png" id="sub" alt="">
				<p>Girl Glasses</p>
			</a>

			<a href="#" class="swiper-slide box">
				<img src="images/boy.png"  id="sub" alt="">
				<p>Boy Glasses</p>
			</a>

			



		</div>

		 <div class="swiper-button-next"></div>
      	 <div class="swiper-button-prev"></div>

	</div>
	
</div>






<!--------------------------home section----------------------------------------->

<section class="home" id="home">
	<div class="homesub">
		<div class="slide active">
			<div class="content">
				<img src="images/salec.png" alt="">
				<span>Big sale</span>
				<h3>Push for a better vision</h3>
				<a href="#" class="btn">Shop now</a>
				<div class="controls">
					<div class="fas fa-angle-left" onclick="prev()"></div>
					<div class="fas fa-angle-right" onclick="next()"></div>
				</div>
			</div>
			<div class="image">
				<img src="images/sale.png" alt="">
			</div>
		</div>

		<div class="slide">
			<div class="content">
				<img src="images/content-img-22.png" alt="">
				<span>Festival sale</span>
				<h3>Feel Crystal Clear</h3>
				<a href="#" class="btn">Shop now</a>
				<div class="controls">
					<div class="fas fa-angle-left" onclick="prev()"></div>
					<div class="fas fa-angle-right" onclick="next()"></div>
				</div>
			</div>
			<div class="image">
				<img src="images/home-img-2.jpg" alt="">
			</div>
		</div>

		<div class="slide">
			<div class="content">
				<img src="images/content-img-33.png" alt="">
                <span>Big Billion Day</span>
				<h3>Whatever you see, Can Inspire you</h3>
				<a href="#" class="btn">Shop now</a>
				<div class="controls">
					<div class="fas fa-angle-left" onclick="prev()"></div>
					<div class="fas fa-angle-right" onclick="next()"></div>
				</div>
			</div>
			<div class="image">
				<img src="images/home-img-3.jpg" alt="">
			</div>
		</div>
	</div>

	

</section>

<!------
<div class="brand-container">

    <div class="swiper-container brand-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide" id="slide"><img src="images/1.jpg" alt=""></div>
            <div class="swiper-slide" id="slide"><img src="images/2.jpg" alt=""></div>
            <div class="swiper-slide" id="slide"><img src="images/3.jpg" alt=""></div>
            <div class="swiper-slide" id="slide"><img src="images/4.jpg" alt=""></div>
            <div class="swiper-slide" id="slide"><img src="images/5.jpg" alt=""></div>
            <div class="swiper-slide" id="slide"><img src="images/6.jpg" alt=""></div>
        </div>
    </div>
</div>


---->

<!--------------------------home section----------------------------------------->

<!-- login form container  -->

<div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="userLogin.php" method="post">
        <h3>login</h3>
        <input type="email" name="email" class="box" placeholder="enter your email">
        <input type="password" name="password" class="box" placeholder="enter your password">
        <input type="submit" value="login now" class="btn" id="hid4">
        <input type="checkbox" id="remember">
        <label for="remember">remember me</label>
        <p>forget password? <a href="#">click here</a></p>
        <p>don't have and account? <a href="signup.php">register now</a></p>
    </form>

</div>

<!-- login form container  -->


<!--------------------------category section----------------------------------------->



<section class="category">
	<?php
		$sql = "SELECT * FROM category WHERE featured='YES' AND active='YES'";
		$res = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($res);

		if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
					$id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
					?>
	<a href="<?php echo SITEURL ?>listing.php?id=<?php echo $id;?>" class="box">
		<img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="">
		<p><?php echo $title; ?></p>
	</a>
	<?php
		}
	}
		else{
			?>
				<h1>No Categories at the moment</h1>
			<?php
		}

		?>
</section>

<!--------------------------category section----------------------------------------->

<!--------------------------shop section----------------------------------------->

<section class="shop" id="shop">
	
	<div class="heading">
		<h1>Sale Products</h1>
		<p>Some Spects can make people happy</p>
	</div>

	<div class="swiper products-slider">
		
		<div class="swiper-wrapper">
		<?php

			$sql = "SELECT * FROM products WHERE featured='YES' AND active='YES'";
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
					$discount = $row['discount'];
                    ?>
			<div  class="swiper-slide slide">
				<a href="<?php echo SITEURL ?>detail.php?id=<?php echo $id;?>">
				<div class="images">
					<span class="discount">-<?php echo $discount;?>%</span>
					<img src="<?php echo SITEURL; ?>images/products/<?php echo $image_name; ?>" alt="">
					<div class="icons">
						<a href="#" class="fas fa-shopping-cart"></a>
						<a href="#" class="fas fa-heart"></a>
						<a href="https://api.whatsapp.com/send?text=<?php echo urlencode($title)?> <?php echo SITEURL ?>detail.php?id=<?php echo $id ?>" target="_blank" class="fas fa-share"></a>
					</div>
				</div>

				<div  class="content">
					<div class="stars">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star-half-alt"></i>
					</div>
					<p><?php echo $title; ?></p>
					<div class="price">Rs. <?php echo $discounted_price; ?><span>Rs. <?php echo $price;?></span></div>
				</div>
				</a>
			</div>
			<?php
				}
			}
				else{
					?>
						<h1>No Products</h1>
					<?php
				}

				?>
		</div>

		 <div class="swiper-button-next"></div>
      	 <div class="swiper-button-prev"></div>

	</div>

</section>


<!-- about section starts  -->

<section class="about" id="about">

    <div class="content">
        <span>why choose us?</span>
        <h3>Choose best from Rest</h3>
        <p>Professional, Experienced and Trustworthy tradesmen<br>
		work is completed in a professional and timely manner<br>
		Over 10 years Experience we have in eyewear filed.</p>
        <a href="#" class="btn">read more</a>
    </div>
    
</section>

<!-- about section ends -->

<!--------------------------popular section----------------------------------------->


<section class="popular" id="popular">
	
	<div class="heading">
		<h1>Popular Products</h1>
		<p>Eyes are Prettiest, Just Adorn them</p>
	</div>

	<div class="box">
	<?php
		$sql = "SELECT * FROM products WHERE featured='YES' AND active='YES'";
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
				$discount = $row['discount'];
				?>
			<div class="mainbox">
				<a href="detail.php?id=<?php echo $id;?>">
				<div class="images">
					<span class="discount">-<?php echo $discount; ?>%</span>
					<img src="<?php echo SITEURL?>images/products/<?php echo $image_name ?>" alt="">
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
					<p><?php echo $title;?></p>
					<div class="view">
						<div class="price"><?php echo $discounted_price;?><span><?php echo $price ?></span></div>
						<a href="detail.php?id=<?php echo $id;?>"><button class="btn">View Detail</button></a>
					</div>
				</div>
			</a>
			</div>	
			<?php 
			}
		}
		else{
			?>
				<h1>No Products</h1>
			<?php
		}
		?>

			
	</div>


</section>

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

    <div class="heading">
        <h1>our gallery</h1>
        <p>YOu Deserve to be Stylish</p>
    </div>

    <div class="lightbox">
	<?php
		$sql = "SELECT * FROM gallery";
		$res = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($res);

		if($count>0)
		{
			while($row=mysqli_fetch_assoc($res))
			{
				$image_name = $row['image_name'];
				?>
			<a href="<?php echo SITEURL?>images/gallery/<?php echo $image_name ?>"><img src="<?php echo SITEURL?>images/gallery/<?php echo $image_name ?>" alt=""></a>
			<?php
		}
		}
		else{
			?>
				<h1>No Images in gallery at the moment</h1>
			<?php
		}
		?>
    </div>

</section>

<!-- gallery section ends -->

<section class="arrivals" id="arrivals">

    <div class="heading">
        <h1>new arrivals</h1>
        <p>No blur everything clear </p>
    </div>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">
        <?php
		$sql = "SELECT * FROM products WHERE new_arrival='YES' AND active='YES'";
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
            	<a href="<?php echo SITEURL;?>detail.php?id=<?php echo $id;?>">
                <div class="image">
                    <img src="<?php echo SITEURL;?>images/products/<?php echo $image_name;?>" alt="">
                </div>
                <div class="content">
                    <p><?php echo $title; ?></p>
                    <div class="price">Rs. <?php echo $discounted_price ?> <span>Rs. <?php echo $price; ?></span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </a>
            </div>

        <?php 
			}
		}
		else{
			?>
				<h1>No Products</h1>
			<?php
		}
		?>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>
    
</section>

<!-- arrivals section ends -->

<!-- shop location section starts  -->

<section class="team" id="team">

    <div class="heading">
        <h1>Our shops</h1>
        <p>Only smile when optical is right</p>
    </div>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="https://lh5.googleusercontent.com/p/AF1QipM5Y-3VpzkmZiQnWH9b0t5NhuRRYmdBajI4SvcJ=w1024-h1024-k-no" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="https://www.google.co.in/maps/place/Specs+Bazaar/@19.1196214,72.88335,17z/data=!3m1!4b1!4m5!3m4!1s0x3be7c9560e3b794d:0xeaeea358ad63b114!8m2!3d19.1196214!4d72.8855387" class="fa-solid fa-location-dot"></a>
                </div>
            </div>
            <div class="content">
                <h3>Marol</h3>
                <a href="tel:77382 02031" id="icon1"> <i class="fas fa-phone"></i> +91 77382 02031  </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/shop2.jpg" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-instagram"></a>
                   <a href="#" class="fa-solid fa-location-dot"></a>
                </div>
            </div>
            <div class="content">
                <h3>Marol</h3>
                <a href="#" id="icon1"> <i class="fas fa-phone"></i> 91 8888 888888 </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/shop3.png" alt="">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fa-solid fa-location-dot"></a>
                </div>
            </div>
            <div class="content">
                <h3>Byculla</h3>
                <a href="#" id="icon1"> <i class="fas fa-phone"></i> 91 8888 888888 </a>
            </div>
        </div>

    </div>

</section>

<!-- shop location section ends -->

<!-- service section ends -->

<section class="services">

		<div class="heading">
	        <h1>our Service</h1>
	        <p>A way to see everyone with perfect </p>
	    </div>

		<div class="service">

		    <div class="box">
		        <img src="images/service-1.png" alt="">
		        <h3>free shipping</h3>
		        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, fugit?</p>
		    </div>

		    <div class="box">
		        <img src="images/service-2.png" alt="">
		        <h3>secure payment</h3>
		        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, fugit?</p>
		    </div>

		    <div class="box">
		        <img src="images/service-3.png" alt="">
		        <h3>24/7 support</h3>
		        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, fugit?</p>
		    </div>

		</div>
</section>

<!-- service section ends -->

<!--------------------contact section-------------------------------------------------------------->

	<section class="contact" id="contact">
				<div class="heading">
	        <h1>Contact Us </h1>
	        <p>Feel free to contact us</p>
	    </div>

		<div class="row">
			
			<div class="image">
				<img src="https://www.pinclipart.com/picdir/big/337-3379122_technical-support-and-website-maintenance-contact-us-vector.png">
			</div>

        <form action="contactUs.php" method="post">
            <div class="inputBox">
                <input type="text" placeholder="name" name="username" required>
                <input type="email" placeholder="email" name="email" value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user'];}?>" required>
            </div>
            <div class="inputBox">
                <input type="number" name="contact" placeholder="number" required>
                <input type="text" name="subject" placeholder="subject" required>
            </div>
            <textarea placeholder="message" name="message" id="" cols="30" rows="10" required></textarea>
            <input type="submit" class="btn" value="send message">
        </form>

    </div>

	</section>

<!--------------------contact section-------------------------------------------------------------->


<!--------------------blog section-------------------------------------------------------------->

<section class="blogs" id="blogs">

    <div class="heading">
        <h1>our daily blogs</h1>
        <p>Latest Update</p>
    </div>

    <div class="swiper blogs-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog1.jpg" alt="">
                    <div class="icons">
                        <a href="#" id="icon"> <i class="fas fa-user"></i> by admin </a>
                        <a href="#" id="icon"> <i class="fas fa-clock"></i> 21st may, 2021 </a>
                    </div>
                </div>
                <div class="content">
                    <h3>blog title goes</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, debitis?</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog2.jpg" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by admin </a>
                        <a href="#"> <i class="fas fa-clock"></i> 21st may, 2021 </a>
                    </div>
                </div>
                <div class="content">
                    <h3>blog title goes</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, debitis?</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog3.jpg" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by admin </a>
                        <a href="#"> <i class="fas fa-clock"></i> 21st may, 2021 </a>
                    </div>
                </div>
                <div class="content">
                    <h3>blog title goes</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, debitis?</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog1.jpg" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by admin </a>
                        <a href="#"> <i class="fas fa-clock"></i> 21st may, 2021 </a>
                    </div>
                </div>
                <div class="content">
                    <h3>blog title goes</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, debitis?</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog2.jpg" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by admin </a>
                        <a href="#"> <i class="fas fa-clock"></i> 21st may, 2021 </a>
                    </div>
                </div>
                <div class="content">
                    <h3>blog title goes</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, debitis?</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="images/blog3.jpg" alt="">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by admin </a>
                        <a href="#"> <i class="fas fa-clock"></i> 21st may, 2021 </a>
                    </div>
                </div>
                <div class="content">
                    <h3>blog title goes</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, debitis?</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>



<!--------------------blogs section-------------------------------------------------------------->


<?php include 'partials/footer.php'; ?>
<script type="text/javascript">
$(function(){
    $('#share').click(function(){ 
        if(!$('#iframe').length) {
                $('#iframeHolder').html('<iframe id="iframe" src="//player.vimeo.com/video/90429499" width="700" height="450"></iframe>');
        }
    });   
});
</script>