<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once("../class/index.class.php"); ?>
<?php require_once('common/header.php'); ?>
<?php $index = new Index();
$allindex = $index->getAllIndex();
$allProducts = $index->getAllProduct();
?>
<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->
<style>
	#body {
		background-color: #fff;
	}

	/* === removing default button style ===*/
	.button {
		margin: 0;
		height: auto;
		background: transparent;
		padding: 0;
		border: none;
		cursor: pointer;

	}

	/* button styling */
	.button {
		--border-right: 6px;
		--text-stroke-color: rgba(255, 255, 255, 0.6);
		--animation-color: white;
		--fs-size: 2em;
		letter-spacing: 3px;
		text-decoration: none;
		font-size: var(--fs-size);
		font-family: "Arial";
		position: relative;
		text-transform: uppercase;
		color: transparent;
		-webkit-text-stroke: 1px var(--text-stroke-color);
	}

	/* this is the text, when you hover on button */
	.hover-text {
		position: absolute;
		box-sizing: border-box;
		content: attr(data-text);
		color: var(--animation-color);
		width: 0%;
		inset: 0;
		border-right: var(--border-right) solid var(--animation-color);
		overflow: hidden;
		transition: 0.5s;
		-webkit-text-stroke: 1px var(--animation-color);
	}

	/* hover */
	.button:hover .hover-text {
		width: 100%;
		filter: drop-shadow(0 0 23px var(--animation-color))
	}

	/* === removing default button style ===*/


	/* this is the text, when you hover on button */
	.hover-text {
		position: absolute;
		box-sizing: border-box;
		content: attr(data-text);
		color: var(--animation-color);
		width: 0%;
		inset: 0;
		border-right: var(--border-right) solid var(--animation-color);
		overflow: hidden;
		transition: 1.5s;
		-webkit-text-stroke: 1px var(--animation-color);
		animation: r2 2s ease-in-out infinite;
	}

	/* hover */
	.buttonpma:hover .hover-text {
		width: 100%;
		filter: drop-shadow(0 0 70px var(--animation-color))
	}

	@keyframes r1 {
		50% {
			transform: rotate(-1deg) rotateZ(-10deg);
		}
	}

	@keyframes r2 {
		50% {
			transform: rotateX(-65deg);
		}
	}

	body {

		color: #000;
	}

	.products {
		padding: 50px 0;
	}

	.product-item {
		border: 1px solid #ddd;
		margin-bottom: 20px;
		background-color: #fff;
		padding-bottom: 15px;
		border-radius: 15px;
	}


	.product-content {
		text-align: center;
	}

	.product-content h4 {
		margin-top: 15px;
	}

	.product-content .price {
		color: #333;
	}

	.carousel-item {
		display: flex;
		justify-content: space-around;
	}

	.ptext {
		font-size: 100px;
		color: rgb(29, 29, 29);
		font-weight: 500;
		text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
		position: relative;
		opacity: 0;
		transform: translateX(-10%);
		transition: transform 1.5s ease-out, opacity 2s ease-out;
	}

	.animat:hover {
		.ptext {
			opacity: 1;
			transform: translateX(36%);
		}
	}

	@keyframes slidein {
		from {
			transform: translateX(10%);
			opacity: 0;
		}

		to {
			transform: translateX(50%);
			opacity: 1;
		}
	}


	.wrapper {
		display: flex;
		flex-direction: row;
		justify-content: center;
		align-items: center;
		gap: 40px;
		padding: 30px;
		padding-bottom: 50px;
		background-color: #ffffff;

	}

	.side {
		display: flex;
		flex-direction: column;
		gap: 20px;
		flex: 2;
		width: 100%;
	}

	section.card1 {
		position: relative;
		width: 80%;
		height: 200px;
		background-color: transparent;
		border-radius: 10px;
		display: flex;
		align-items: center;
		justify-content: center;
		overflow: hidden;
		perspective: 1000px;
		transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);

	}

	.card1 img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		/* Ensures the image covers the entire card while maintaining aspect ratio */
	}

	.card1 svg {
		fill: #333;
		transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
		border-radius: 3px;
	}

	.card1:hover {
		transform: scale(1.05);
		box-shadow: 0 8px 16px #000000;
		background-color: transparent;
		color: #ffffff;
	}

	.card__content {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		color: white;
		padding: 20px;
		box-sizing: border-box;
		background-color: rgba(150, 150, 150, 0.5);
		transform: rotateX(-90deg);
		transform-origin: bottom;
		transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
	}

	.card1:hover .card__content {
		transform: rotateX(0deg);
	}

	.card__title {
		margin: 0;
		padding-left: 5px;
		font-size: 24px;
		color: var(--black);
		font-weight: 700;
	}

	.card1:hover svg {
		scale: 0;
	}

	.card__description {
		margin: 10px 0 0;
		font-size: 14px;
		color: rgb(32, 32, 32);
		line-height: 1.4;
		color: #fff;
	}

	.book {
		position: relative;
		border-radius: 10px;
		width: 100%;
		height: 100%;
		background-color: whitesmoke;
		-webkit-box-shadow: 1px 1px 2px #000;
		box-shadow: 1px 1px 12px #000;
		-webkit-transform: preserve-3d;
		-ms-transform: preserve-3d;
		transform: preserve-3d;
		-webkit-perspective: 2000px;
		perspective: 2000px;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		color: #000;
	}

	.cover {
		top: 0;
		position: absolute;
		background-color: lightgray;
		width: 100%;
		height: 100%;
		border-radius: 10px;
		cursor: pointer;
		-webkit-transition: all 0.5s;
		transition: all 0.5s;
		-webkit-transform-origin: 0;
		-ms-transform-origin: 0;
		transform-origin: 0;
		-webkit-box-shadow: 1px 1px 1px #000;
		box-shadow: 1px 1px 1px #000;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
	}

	.book:hover .cover {
		-webkit-transition: all 0.5s;

		transition: all 0.5s;
		-webkit-transform: rotatey(-80deg);
		-ms-transform: rotatey(-80deg);
		transform: rotatey(-80deg);
	}

	p {
		font-size: 20px;
		font-weight: bolder;
	}

	body {
		font-family: Arial, sans-serif;
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	.section2 {
		display: flex;
		align-items: center;
		justify-content: center;
		background-color: #fff;
		padding-left: 10px;
		padding-right: 10px;
		overflow: hidden;
		position: relative;
		height: 100%;
		padding-top: 6%;
		padding-bottom: 6%;
		background-color: #fdfaed;
	}

	.section2 .image-container {
		flex: 1;
		width: 100%;
		height: 100%;
		background-color: #555;
		margin-left: 5%;

	}



	.section2 .text-container {
		flex: 1;
		padding: 40px;
		background-color: transparent;
		text-align: center;
		animation: fadeIn 2s ease-in-out;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
	}

	.section2 .text-container h1 {
		font-size: 2.7em;
		margin-bottom: 20px;
		color: #333;
	}

	.section2 .text-container p {
		font-size: 1em;
		color: #555;
		line-height: 1.5;
	}

	/* Initial state of text-container with opacity 0 */
	.section2 .text-container {
		opacity: 1;
		transition: opacity 2s ease-in-out;
	}

	/* Initial state of image-container */


	/* Animation on hover */
	.section2:hover .text-container {
		animation: slideInRight 2s ease-in-out forwards;
	}

	.section2:hover .image-container {
		transform: translateX(0);
		animation: slideInLeft 1.5s ease-in-out forwards;
	}

	/* Keyframes for the animations */
	@keyframes slideInLeft {
		from {
			transform: translateX(-100%);
			opacity: 0;
		}

		to {
			transform: translateX(0);
			opacity: 1;
		}
	}

	@keyframes slideInRight {
		from {
			transform: translateX(100%);
			opacity: 0;

		}

		to {
			transform: translateX(0);
			opacity: 1;
		}
	}

	@media (max-width: 768px) {
		.section2 {
			flex-direction: column;
		}

		.section2 .image-container,
		.section2 .text-container {
			flex: none;
			width: 100%;
			height: 50vh;
		}
	}

	.btn34 {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 12rem;
		overflow: hidden;
		height: 5rem;
		background-size: 300% 300%;
		backdrop-filter: blur(1rem);
		border-radius: 5rem;
		transition: 0.5s;
		animation: gradient_301 5s ease infinite;
		border: double 4px transparent;
		background-image: linear-gradient(#474747, #5c5a5a), linear-gradient(137.48deg, #575757 10%, #020101 45%, #ffffff 67%, #474747 87%);
		background-origin: border-box;
		background-clip: content-box, border-box;
		margin-top: 1%;
	}

	#container-stars {
		position: absolute;
		z-index: -1;
		width: 100%;
		height: 100%;
		overflow: hidden;
		transition: 0.5s;
		backdrop-filter: blur(1rem);
		border-radius: 5rem;
	}

	strong {
		z-index: 2;
		font-family: 'Avalors Personal Use';
		font-size: 12px;
		letter-spacing: 5px;
		color: #FFFFFF;
		text-shadow: 0 0 4px white;
	}

	#glow {
		position: absolute;
		display: flex;
		width: 12rem;
	}

	.circle {
		width: 100%;
		height: 30px;
		filter: blur(2rem);
		animation: pulse_3011 4s infinite;
		z-index: -1;
	}

	.circle:nth-of-type(1) {
		background: rgba(80, 79, 80, 0.636);
	}

	.circle:nth-of-type(2) {
		background: rgba(111, 110, 112, 0.704);
	}

	.btn:hover #container-stars {
		z-index: 1;
		background-color: #212121;
	}

	.btn:hover {
		transform: scale(1.1)
	}

	.btn:active {
		border: double 4px #c4c2c2;
		background-origin: border-box;
		background-clip: content-box, border-box;
		animation: none;
	}

	.btn:active .circle {
		background: white;
	}

	#stars {
		position: relative;
		background: transparent;
		width: 200rem;
		height: 200rem;
	}

	#stars::after {
		content: "";
		position: absolute;
		top: -10rem;
		left: -100rem;
		width: 100%;
		height: 100%;
		animation: animStarRotate 90s linear infinite;
	}

	#stars::after {
		background-image: radial-gradient(#f0e6e6 1px, transparent 1%);
		background-size: 50px 50px;
	}

	#stars::before {
		content: "";
		position: absolute;
		top: 0;
		left: -50%;
		width: 170%;
		height: 500%;
		animation: animStar 60s linear infinite;
	}

	#stars::before {
		background-image: radial-gradient(#ffffff 1px, transparent 1%);
		background-size: 50px 50px;
		opacity: 0.5;
	}

	@keyframes animStar {
		from {
			transform: translateY(0);
		}

		to {
			transform: translateY(-135rem);
		}
	}

	@keyframes animStarRotate {
		from {
			transform: rotate(360deg);
		}

		to {
			transform: rotate(0);
		}
	}

	@keyframes gradient_301 {
		0% {
			background-position: 0% 50%;
		}

		50% {
			background-position: 100% 50%;
		}

		100% {
			background-position: 0% 50%;
		}
	}

	@keyframes pulse_3011 {
		0% {
			transform: scale(0.75);
			box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
		}

		70% {
			transform: scale(1);
			box-shadow: 0 0 0 10px rgba(167, 166, 166, 0);
		}

		100% {
			transform: scale(0.75);
			box-shadow: 0 0 0 0 rgba(156, 156, 156, 0);
		}

	}

	.cta {
		border: none;
		background: none;
		cursor: pointer;

	}

	.cta span {
		padding-bottom: 7px;
		letter-spacing: 4px;
		font-size: 20px;
		font-weight: 600;
		padding-right: 15px;
		text-transform: uppercase;

	}

	.cta svg {
		transform: translateX(-8px);
		transition: all 0.3s ease;
	}

	.cta:hover svg {
		transform: translateX(0);
	}

	.cta:active svg {
		transform: scale(0.9);
	}

	.hover-underline-animation {
		position: relative;
		color: whitesmoke;
		padding-bottom: 20px;
	}

	.hover-underline-animation:after {
		content: "";
		position: absolute;
		width: 100%;
		transform: scaleX(0);
		height: 2px;
		bottom: 0;
		left: 0;
		background-color: whitesmoke;
		transform-origin: bottom right;
		transition: transform 0.25s ease-out;
	}

	.cta:hover .hover-underline-animation:after {
		transform: scaleX(1);
		transform-origin: bottom left;
	}

	.creative-heading {
		font-family: 'Arial', sans-serif;
		font-size: 2.5rem;
		color: #333;
		text-align: center;
		margin: 20px 0;
		position: relative;
	}

	.creative-heading::after {
		content: '';
		display: block;
		width: 100%;
		height: 8px;
		border-radius: 40%;
		background: linear-gradient(to right, #d9c7a1, #e8d5b7, #f5f5dc, #f8f5e6);


		margin-top: 10px;
	}

	.carousel-container {
		position: relative;
		width: 100%;
		overflow: hidden;
		margin: 20px 0;
	}

	.carousel-slide {
		display: flex;
		transition: transform 0.5s ease-in-out;
	}

	.carousel-item {
		min-width: 33.33%;
		box-sizing: border-box;
	}

	.carousel-buttons {
		position: absolute;
		top: 50%;
		width: 100%;
		display: flex;
		justify-content: space-between;
		transform: translateY(-50%);
	}


	.carousel-button {
		background: linear-gradient(to right, #e8d5b7, #f8f5e6);
		border: none;
		color: white;
		padding: 10px;
		cursor: pointer;
		border-radius: 40%;
		font-size: 18px;
	}

	.carousel-button:hover {
		background-color: rgba(0, 0, 0, 0.8);
	}

	.slick-dots {
		background-color: #fff;
		margin-bottom: 0%;
	}
</style>

<body id="body">

	<!-- Start Top Header Bar -->
	<?php require_once('common/navbar.php'); ?>
	<div class="hero-slider">
		<div class="slider-item th-fullpage hero-area" style="background-image: url(http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[1]['image'] ?>);">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 text-center">
						<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1" style="font-size: larger; letter-spacing:2px;"><?= $allindex[0]['title'] ?></p>
						<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5" style="letter-spacing:1px;"><?= $allindex[0]['description'] ?></h1>
						<button class="button" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" onclick=" window.location.href='shop-sidebar.php'" data-text="Awesome">
							<span class="actual-text">&nbsp;Shop Now&nbsp;</span>
							<span aria-hidden="true" class="hover-text">&nbsp;Shop Now &nbsp;</span>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="slider-item th-fullpage hero-area" style="background-image: url(http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[0]['image'] ?>);">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 text-left">
						<p data-duration-in=".3" data-animation-in="fadeInUp" style="font-size: large;" data-delay-in=".1"><?= $allindex[1]['title'] ?></p>
						<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5" style="letter-spacing:1px;"><?= $allindex[1]['description'] ?></h1>
						<button class="button" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" onclick=" window.location.href='shop-sidebar.php'" data-text="Awesome">
							<span class="actual-text">&nbsp;Shop Now&nbsp;</span>
							<span aria-hidden="true" class="hover-text">&nbsp;Shop Now &nbsp;</span>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="slider-item th-fullpage hero-area" style="background-image: url(http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[2]['image'] ?>);">
			<div class=" container">
				<div class="row">
					<div class="col-lg-8 text-right">
						<p data-duration-in=".3" data-animation-in="fadeInUp" style="font-size: large;" data-delay-in=".1"><?= $allindex[2]['title'] ?></p>
						<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5" style="letter-spacing:1px;"><?= $allindex[2]['description'] ?></h1>
						<button class="button" data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" onclick=" window.location.href='shop-sidebar.php'" data-text="Awesome">
							<span class="actual-text">&nbsp;Shop Now&nbsp;</span>
							<span aria-hidden="true" class="hover-text">&nbsp;Shop Now &nbsp;</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="animat" style="background-color: #fffdf8; margin-top:0%; padding-top:3%">
		<p class="ptext" style="font-size: 40px; margin-top: 0%; ">Explore Our Store!</p>
		<div class="wrapper">

			<section id="card1" class="card1" style="height:420px; margin-left:8%; width: 40%;">
				<img src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[3]['image'] ?>" alt="About">
				<div class="card__content">
					<p class="card__title"><?= $allindex[3]['title'] ?></p>
					<p class="card__description">
						<?= $allindex[3]['description'] ?>
					</p>
				</div>
			</section>
			<div class="side">
				<section id="card2" class="card1">
					<img src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[4]['image'] ?>" alt="About">
					<div class="card__content">
						<p class="card__title"><?= $allindex[4]['title'] ?></p>
						<p class="card__description">
							<?= $allindex[4]['description'] ?>
						</p>
					</div>
				</section>
				<section id="card3" class="card1">
					<img src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[5]['image'] ?>" alt="About">
					<div class="card__content">
						<p class="card__title"><?= $allindex[5]['title'] ?></p>
						<p class="card__description">
							<?= $allindex[5]['description'] ?>
						</p>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div class="separator"></div>

	<div class="section2">
		<div class="image-container" style="height:70vh;">
			<div class="book">
				<div style="background-image:url('page.jpg'); width: 100%; height: 100%;">
					<p style="margin-left: 30%; margin-top: 20%; color: whitesmoke; font-weight: 600; font-size: 28px;">
						What are you still doing?!<br> Go and Start Shopping
					</p>
					<button class="cta" style="margin-left: 40%; margin-top:2%;" onclick="window.location.href='shop-sidebar.php'">
						<span class="hover-underline-animation"> Shop now </span>
						<svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" fill="white" viewBox="0 0 46 16">
							<path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>
						</svg>
					</button>
				</div>
				<div class="cover" style="background-image:url('page.jpg');"></div>
			</div>
		</div>

		<div class="text-container">
			<h1>Welcome to Fashion Hub</h1>
			<p>
				Discover the latest trends in fashion with our wide selection of clothing, accessories, and more.
				Shop now and stay ahead of the style curve. Discover the latest trends in fashion with our wide selection
				of clothing, accessories, and more. Shop now and stay ahead of the style curve.
			</p>

			<button class="btn34" type="button" onclick="window.location.href='shop-sidebar.php'">
				<strong>Shop Now</strong>
				<div id="container-stars">
					<div id="stars"></div>
				</div>

				<div id="glow">
					<div class="circle"></div>
					<div class="circle"></div>
				</div>
			</button>
		</div>
	</div>
	<?php require_once('404.php'); ?>
	<?php require_once('exp.php'); ?>
	<section class="products section bg-gray" style="padding-top:0%; background-color:#fffdf8">
		<div class="container">
			<div class="row">
				<div class="title text-center">
					<div class="container">
						<h2 class="creative-heading">You would find all your needs!</h2>
					</div>
				</div>
			</div>
			<div class="carousel-container">
				<div class="carousel-slide">
					<?php foreach ($allProducts as $product) { ?>
						<div class="carousel-item">
							<div class="product-item">
								<div class="product-thumb">
									<?php if ($product['quantity'] == 0) : ?>
										<span class="bage">Out of Stock</span>
									<?php endif ?>
									<?php $allimages = $index->getimages($product['product_id']) ?>
									<img style="height:400px; " class="img-responsive" src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allimages[0]['image_name'] ?>" />
									<div class="preview-meta  preview-icons">
										<ul>
											<li>
												<span style="border-radius: 100%; margin-right:3px;" data-toggle="modal" data-target="#product-modal" data-id="<?php echo $product['product_id'] ?>" data-name="<?php echo $product['product_name'] ?>" data-price="<?php echo $product['price'] ?>" data-description="<?php echo $product['small_description'] ?>" data-image="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allimages[0]['image_name'] ?>">
													<i class="tf-ion-ios-search-strong" style="border-radius: 40%;"></i>
												</span>
											</li>
											<?php $is_in_wishlist = isset($_SESSION['wishlist']) && in_array($product['product_id'], $_SESSION['wishlist']);
											?>
											<li>
												<a href="#!" data-id="<?php echo $product['product_id']; ?>" class="add-to-wishlist" style="border-radius: 100%; margin-right:3px">
													<i class="tf-ion-ios-heart heart-icon" style="color: <?php echo $is_in_wishlist ? 'red' : ''; ?>;"></i>
												</a>
											</li>
											<li>
												<a href="cart.php" style="border-radius: 100%;"><i class="tf-ion-android-cart"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="product-content">
									<h4 style="font-size:larger;"><a><?php echo $product['product_name'] ?></a></h4>
									<p class="price" style="font-size:large;">$<?php echo $product['price'] ?></p>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="carousel-buttons">
					<button class="carousel-button" id="prevBtn">&#10094;</button>
					<button class="carousel-button" id="nextBtn">&#10095;</button>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal product-modal fade" id="product-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="fixing">
							<div class="modal-image">
								<img style="height:350px; width:350px;" class="img-responsive" id="modal-image" src="" alt="product-img" />
							</div>
						</div>
						<div>
							<div class="product-short-details">
								<h2 class="product-title" id="modal-title"></h2>
								<p class="product-short-description" id="modal-description"></p>
								<p class="product-price" id="modal-price" style="font-size:large"></p>
								<a href="" id="modal-view-details" class="btn btn-transparent">View Product Details</a>
							</div>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								&times;
							</button>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.modal -->
	</section>

	<script>
		const carouselSlide = document.querySelector('.carousel-slide');
		const carouselItems = document.querySelectorAll('.carousel-item');
		const prevBtn = document.getElementById('prevBtn');
		const nextBtn = document.getElementById('nextBtn');
		const numberOfVisibleSlides = 6; // Number of slides visible at once
		let clonedSlides = [];

		// Clone slides to handle the transition smoothly
		function cloneSlides() {
			// Remove previously cloned slides
			clonedSlides.forEach(slide => slide.remove());
			clonedSlides = [];

			// Clone first set of slides
			for (let i = 0; i < numberOfVisibleSlides; i++) {
				const slide = carouselItems[i % carouselItems.length].cloneNode(true);
				clonedSlides.push(slide);
				carouselSlide.appendChild(slide);
			}

			// Clone last set of slides
			for (let i = carouselItems.length - numberOfVisibleSlides; i < carouselItems.length; i++) {
				const slide = carouselItems[i].cloneNode(true);
				clonedSlides.push(slide);
				carouselSlide.insertBefore(slide, carouselItems[0]);
			}
		}

		cloneSlides(); // Initialize cloning of slides

		const updatedCarouselItems = document.querySelectorAll('.carousel-item');
		let counter = numberOfVisibleSlides; // Start counter to show the first slide after the preloaded ones
		const size = updatedCarouselItems[0].clientWidth;

		function moveSlide() {
			carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
		}

		function nextSlide() {
			if (counter >= updatedCarouselItems.length - numberOfVisibleSlides) {
				// Instant jump to the first slide
				carouselSlide.style.transition = 'none'; // Disable transition for instant jump
				counter = numberOfVisibleSlides;
				moveSlide();
				// Re-enable transition with a delay to ensure smooth sliding
				setTimeout(() => {
					carouselSlide.style.transition = 'transform 0.5s ease-in-out';
					setTimeout(() => moveSlide(), 50); // Small delay to ensure transition is applied
				}, 50); // Short delay to ensure transition is reset
			} else {
				counter++;
				moveSlide();
			}
		}

		function prevSlide() {
			if (counter <= numberOfVisibleSlides - 1) {
				// Instant jump to the last slide
				carouselSlide.style.transition = 'none'; // Disable transition for instant jump
				counter = updatedCarouselItems.length - numberOfVisibleSlides * 2;
				moveSlide();
				// Re-enable transition with a delay to ensure smooth sliding
				setTimeout(() => {
					carouselSlide.style.transition = 'transform 0.5s ease-in-out';
					setTimeout(() => moveSlide(), 50); // Small delay to ensure transition is applied
				}, 50); // Short delay to ensure transition is reset
			} else {
				counter--;
				moveSlide();
			}
		}

		nextBtn.addEventListener('click', nextSlide);
		prevBtn.addEventListener('click', prevSlide);

		// Auto slide every 3 seconds
		setInterval(nextSlide, 3000);

		// Modal functionality
		document.querySelectorAll('.product-thumb [data-toggle="modal"]').forEach(el => {
			el.addEventListener('click', function() {
				document.getElementById('modal-image').src = this.getAttribute('data-image');
				document.getElementById('modal-title').textContent = this.getAttribute('data-name');
				document.getElementById('modal-description').textContent = this.getAttribute('data-description');
				document.getElementById('modal-price').textContent = '$' + this.getAttribute('data-price');
			});
		});
	</script>



	<!--
Start Call To Action
==================================== -->


	<script>
		$(document).ready(function() {
			$('#product-modal').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget); // Button that triggered the modal
				var id = button.data('id'); // Extract info from data-* attributes
				var name = button.data('name');
				var price = button.data('price');
				var description = button.data('description');
				var image = button.data('image');

				// Update the modal's content.
				var modal = $(this);
				modal.find('#modal-title').text(name);
				modal.find('#modal-price').text('$' + price);
				modal.find('#modal-description').text(description);
				modal.find('#modal-image').attr('src', image);
				modal.find('#modal-view-details').attr('href', 'product-single.php?id=' + id);
			});
		});

		document.addEventListener('DOMContentLoaded', function() {
			document.body.addEventListener('click', function(event) {
				if (event.target.closest('.add-to-wishlist')) {
					event.preventDefault();
					let heartIcon = event.target.closest('.add-to-wishlist').querySelector('.heart-icon');
					let productId = heartIcon.parentElement.dataset.id;

					$.ajax({
						url: '../actions/wishlist_action.php',
						type: 'POST',
						data: {
							id: productId
						},
						success: function(response) {
							if (response === 'added') {
								heartIcon.style.color = 'red';
							} else if (response === 'removed') {
								heartIcon.style.color = '';
							}
						},
						error: function(xhr, status, error) {
							console.error('Error:', error);
						}
					});
				}
			});
		});
	</script>



	<?php require_once('common/footer.php'); ?>
	<?php require_once('common/script.php'); ?>


</body>

</html>