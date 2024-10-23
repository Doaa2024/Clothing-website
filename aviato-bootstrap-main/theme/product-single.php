<?php
session_start();
require("../class/products.class.php");
$products = new Products();
$id = $_GET['id'];
$allcategory = $products->getProductByCategory($id);
$allproducts = $products->getProductByID($id);
$allcategory = $products->getProductByCategory($id);
$allimages = $products->getimages($id); ?>

<!DOCTYPE html>
<style>
	.product-sl {
		display: flex;
		flex-direction: row;
		align-items: center;
		font-family: 'Arial', sans-serif;
		color: #333;
		padding-top: 35px;
		gap: 20px;
	}

	.product-sl span {
		font-size: large;
		margin-right: 12px;
		padding-right: 5px;
		font-weight: bold;
	}

	.product-quantity-slider {
		display: flex;
		flex-direction: row;
		align-items: center;
		gap: 10px;
	}

	.quantity-button {
		background-color: #333;
		border: none;
		border-radius: 100%;
		width: 30px;
		/* Adjusted size */
		height: 30px;
		/* Adjusted size */
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 20px;
		/* Adjusted font size */
		color: white;
		/* Less black */
		cursor: pointer;
		transition: background-color 0.3s;
	}


	.quantity-button:hover {
		background-color: rgba(0, 0, 0, 0.5);
		/* Slightly darker on hover */
		box-shadow: 0 4px 8px rgba(128, 128, 128, 0.5);
		/* Light gray shadow */
	}

	/* Slightly darker on hover */


	.quantity-display {
		width: 16px;
		text-align: center;
		font-size: 18px;
		line-height: 40px;
		border: none;
		background-color: transparent;
		/* Transparent background */
	}


	.tab-content {
		overflow: hidden;
		/* Ensures content doesn't overflow */
	}

	.tab-pane {
		display: block;
		/* Ensures the tab content is displayed */
	}

	.related-items {
		text-align: center;
		font-size: 30px;
		margin-bottom: 40px;
		color: black;
		font-weight: 500;
		position: relative;
	}

	.related-items::before {
		content: "";
		position: absolute;
		width: 60%;
		height: 4px;
		background-color: black;
		bottom: -10px;
		/* Adjust this value to control the distance of the underline from the text */
		left: 50%;
		transform: translateX(-50%);
	}

	.product-item {
		margin-bottom: 30px;
	}

	.product-item .product-thumb {
		position: relative;
	}

	.product-item .product-thumb img {
		width: 100%;
		height: auto;
	}

	.product-item .product-thumb .bage {
		position: absolute;
		top: 6px;
		right: 6px;
		background-color: #333;
		/* Red background for out of stock */
		color: #fff;
		/* White text */
		font-size: 10px;
		/* Font size */
		padding: 4px 4px;
		/* Padding */
		font-weight: 300;
		/* Lighter font weight */
		display: inline-block;
		border-radius: 25px;
		/* Rounded corners */
		text-transform: uppercase;
		/* Uppercase text */
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		/* Shadow effect */
		animation: pulse 2s infinite;
		/* Pulsing animation */
	}

	@keyframes pulse {
		0% {
			transform: scale(1);
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}

		50% {
			transform: scale(1.1);
			box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
		}

		100% {
			transform: scale(1);
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		}
	}

	.product-item .product-thumb:before {
		transition: 0.3s all;
		opacity: 0;
		background: rgba(0, 0, 0, 0.6);
		content: "";
		position: absolute;
		top: 0;
		right: 0;
		left: 0;
		bottom: 0;
	}

	.product-item .product-thumb .preview-meta {
		position: absolute;
		text-align: center;
		bottom: 0;
		left: 0;
		width: 100%;
		justify-content: center;
		opacity: 0;
		transition: 0.2s;
		transform: translateY(10px);
	}

	.product-item .product-thumb .preview-meta li {
		display: inline-block;
	}

	.product-item .product-thumb .preview-meta li a,
	.product-item .product-thumb .preview-meta li span {
		background: #fff;
		padding: 10px 0px;
		cursor: pointer;
		display: inline-block;
		font-size: 20px;
		transition: 0.2s all;
		width: 50px;
	}

	.product-item .product-thumb .preview-meta li a:hover,
	.product-item .product-thumb .preview-meta li span:hover {
		background: #000;
		color: #fff;
	}

	.product-item:hover .product-thumb:before {
		opacity: 1;
	}

	.product-item:hover .preview-meta {
		opacity: 1;
		transform: translateY(-20px);
	}

	.product-item .product-content {
		text-align: center;
	}

	.product-item .product-content h4 {
		font-size: 16px;
		font-weight: 400;
		margin-top: 15px;
		margin-bottom: 6px;
	}

	.product-item .product-content h4 a {
		color: #000;
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
		border-radius: 10px;
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

	.button {
		--width: 150px;
		/* Increase button width */
		--height: 50px;
		/* Increase button height */
		--tooltip-height: 35px;
		--tooltip-width: 110px;
		/* Increase tooltip width */
		--gap-between-tooltip-to-button: 18px;
		--button-color: #222;
		--tooltip-color: #fff;
		width: var(--width);
		height: var(--height);
		background: var(--button-color);
		position: relative;
		text-align: center;
		border-radius: 0.5em;
		font-family: "Arial";
		transition: background 0.7s;
		display: flex;
		align-items: center;
		justify-content: center;
		color: #fff;
		margin-top: 2%;
		/* Ensure text color is white */
	}

	.button::before {
		position: absolute;
		content: attr(data-tooltip);
		width: var(--tooltip-width);
		height: var(--tooltip-height);
		background-color: #555;
		font-size: 1.2rem;
		/* Increase tooltip font size */
		color: #fff;
		border-radius: 0.25em;
		line-height: var(--tooltip-height);
		bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) + 10px);
		left: calc(50% - var(--tooltip-width) / 2);
		text-align: center;
		/* Ensure text is centered in the tooltip */
	}

	.button::after {
		position: absolute;
		content: "";
		width: 0;
		height: 0;
		border: 10px solid transparent;
		border-top-color: #555;
		left: calc(50% - 10px);
		bottom: calc(100% + var(--gap-between-tooltip-to-button) - 10px);
	}

	.button::after,
	.button::before {
		opacity: 0;
		visibility: hidden;
		transition: all 0.5s;
	}

	.text {
		display: flex;
		align-items: center;
		justify-content: center;
		height: 100%;
		/* Ensure text container height is 100% */
	}

	.button-wrapper,
	.text,
	.icon {
		overflow: hidden;
		position: absolute;
		width: 100%;
		height: 100%;
		left: 0;
		color: #fff;
	}

	.text {
		top: 0;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.text,
	.icon {
		transition: top 0.5s;
	}

	.icon {
		color: #fff;
		top: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-left: 30%;
		height: 100%;
		/* Ensure icon container height is 100% */
	}

	.icon svg {
		width: 24px;
		height: 24px;
		display: block;
		/* Ensure SVG icon is a block element */
		margin: auto;
		/* Center the SVG icon */
	}

	.button:hover {
		background: #222;
	}

	.button:hover .text {
		top: -100%;
	}

	.button:hover .icon {
		top: 0;
	}

	.button:hover:before,
	.button:hover:after {
		opacity: 1;
		visibility: visible;
	}

	.button:hover:after {
		bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) - 20px);
	}

	.button:hover:before {
		bottom: calc(var(--height) + var(--gap-between-tooltip-to-button));
	}
</style>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<?php require_once('common/header.php'); ?>

<body id="body">
	<!-- Start Top Header Bar -->
	<?php require_once('common/navbar.php'); ?>
	<section class="single-product">
		<div class="container">
			<div class="row">

			</div>
			<div class="row mt-20">
				<div class="col-md-5">
					<div class="single-product-slider">
						<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
							<div class='carousel-outer'>
								<!-- me art lab slider -->
								<div class='carousel-inner '>
									<?php foreach ($allimages as $index => $image) { ?>
										<div class='item <?php echo $index === 0 ? 'active' : ''; ?>'>
											<img style="height:500px; width:500px;" src='http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?php echo $image['image_name']; ?>' alt='' data-zoom-image="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?php echo $image['image_name']; ?>" />
										</div>
									<?php } ?>

								</div>

								<!-- sag sol -->
								<a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
									<i class="tf-ion-ios-arrow-left"></i>
								</a>
								<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
									<i class="tf-ion-ios-arrow-right"></i>
								</a>
							</div>

							<!-- thumb -->
							<ol class='carousel-indicators mCustomScrollbar meartlab'>
								<?php foreach ($allimages as $index => $image) { ?>
									<li data-target='#carousel-custom' data-slide-to='<?php echo $index; ?>' class='<?php echo $index === 0 ? 'active' : ''; ?>'>
										<img style="height:75px; width:75px;" src='http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?php echo $image['image_name']; ?>' alt='' />
									</li>
								<?php } ?>
							</ol>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-details">
						<h2><?php echo $allproducts[0]['product_name'] ?></h2>
						<p class="product-price" style="font-size:18px;">$<?php echo $allproducts[0]['price'] ?></p>

						<p class="product-description mt-20" style="font-size:18px;">
							<?php echo $allproducts[0]['small_description'] ?>
						</p>
						<div class="product-size">
							<span style="font-size:20px; font-weight:500;">Size:</span>
							<select class="form-control" id="product-size" style="font-size:15px; width:90px; border-radius:40px; border:2px solid #555; margin-left:25px;">
								<option>S</option>
								<option>M</option>
								<option>L</option>
								<option>XL</option>
							</select>
						</div>
						<div class="product-sl">
							<span style="font-size:20px;">Quantity:</span>
							<div class="product-quantity-slider">
								<button id="decrement" class="quantity-button">-</button>
								<div id="product-quantity" class="quantity-display" name="product-quantity">1</div>
								<button id="increment" class="quantity-button">+</button>
							</div>
						</div>

						<div class="product-category">
							<span></span>
							<ul>

							</ul>
						</div>

						<?php if ($allproducts[0]['quantity'] == 0) : ?>

							<div class="button" id="outStock" onclick="changeTextStock()" data-tooltip="PRICE $<?php echo $allproducts[0]['price'] ?>" style="color:#fff;">
								<div class="button-wrapper">
									<div class="text">Add To Cart</div>
									<span class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
											<path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
										</svg>
									</span>
								</div>
							</div>
						<?php else : ?>
							<div class="button" data-id="<?php echo $allproducts[0]['product_id'] ?>" data-price="<?php echo $allproducts[0]['price'] ?>" data-available-quantity="<?php echo $allproducts[0]['quantity'] ?>" id="add-to-cart" data-tooltip="PRICE $<?php echo $allproducts[0]['price'] ?>">
								<div class="button-wrapper">
									<div class="text">Add To Cart</div>
									<span class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
											<path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
										</svg>
									</span>
								</div>
							</div>


						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="tabCommon mt-20">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true" style="	border-radius: 0.5em;">Details</a></li>
							<li><a data-toggle="tab" href="#reviews" aria-expanded="false" style="	border-radius: 0.5em;">Reviews</a></li>
						</ul>
						<div class="tab-content">
							<div id="details" class="tab-pane fade in active">
								<h4 style="font-size:20px; font-weight:800;">Product Description</h4>
								<p style="font-size:16px;"><?php echo $allproducts[0]['large_description'] ?></p>
							</div>
							<div id="reviews" class="tab-pane fade">
								<div class="post-comments">
									<ul class="media-list comments-list m-bot-50 clearlist">
										<!-- Comment Items here -->
										<!-- Sample comment item, you can add more as needed -->
										<li class="media">
											<a class="pull-left" href="#!">
												<img class="media-object comment-avatar" src="images/blog/avater-1.jpg" alt="" width="50" height="50" />
											</a>
											<div class="media-body">
												<div class="comment-info">
													<h4 class="comment-author">
														<a href="#!">Jonathon Andrew</a>
													</h4>
													<time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
													<a class="comment-button" href="#!"><i class="tf-ion-chatbubbles"></i>Reply</a>
												</div>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut ante eleifend eleifend.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod laborum minima, reprehenderit laboriosam officiis praesentium? Impedit minus provident assumenda quae.
												</p>
											</div>
										</li>
										<!-- End of Comment Item -->
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

	</section>
	<section class="products related-products section" style="margin-top:0%;">
		<div class="container">
			<div class="row">
				<p class="related-items">Related Items</p>

				<?php foreach ($allcategory as $product_id) {
					$allproducts = $products->getProductByID($product_id['product_id']);
					$allimages = $products->getimages($product_id['product_id']);
				?>
					<div class="col-md-3">
						<div class="product-item">

							<div class="product-thumb">
								<?php if ($allproducts[0]['quantity']  == 0) : ?>
									<span class="bage">Out of Stock</span>
								<?php endif ?>
								<!-- Assuming $allimages['image'] gives you the image URL -->
								<img class="img-responsive" style="height:350px;" src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allimages[0]['image_name'] ?>" alt="product-img" />
								<div class="preview-meta">
									<ul>
										<li>
											<span style="border-radius:50%; margin-right: 6px;" class="open-modal" data-toggle="modal" data-target="#product-modal" data-id="<?php echo $allproducts[0]['product_id'] ?>" data-name="<?php echo $allproducts[0]['product_name'] ?>" data-price="<?php echo $allproducts[0]['price'] ?>" data-description="<?php echo $allproducts[0]['small_description'] ?>" data-image="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allimages[0]['image_name'] ?>">
												<i class="tf-ion-ios-search"></i>
											</span>
										</li>
										<?php
										$is_in_wishlist = isset($_SESSION['wishlist']) && in_array($product_id['product_id'], $_SESSION['wishlist']);
										?>
										<li>
											<a href="#!" data-id="<?php echo $product_id['product_id']; ?>" class="add-to-wishlist" style="border-radius:50%; ">
												<i class="tf-ion-ios-heart heart-icon" style="color: <?php echo $is_in_wishlist ? 'red' : ''; ?>;"></i>
											</a>
										</li>
										<li>
											<a style="border-radius:50%; margin-left: 6px;" href="cart.php"><i class="tf-ion-android-cart"></i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="product-content">
								<!-- Assuming $allproducts['name'] gives you the product name -->
								<h4><a href="product-single.html"><?php echo $allproducts[0]['product_name']; ?></a></h4>
								<!-- Assuming $allproducts['price'] gives you the product price -->
								<p class="price">$<?php echo $allproducts[0]['price']; ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

		</div>
	</section>


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
	<!-- Include jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Include SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<?php require_once('common/footer.php'); ?>
	<?php require_once('common/script.php'); ?>
	<script>
		$(document).ready(function() {
			$('#increment').click(function() {
				let currentValue = parseInt($('#product-quantity').text());
				$('#product-quantity').text(currentValue + 1);
			});

			$('#decrement').click(function() {
				let currentValue = parseInt($('#product-quantity').text());
				if (currentValue > 1) {
					$('#product-quantity').text(currentValue - 1);
				}
			});
		});



		$(document).ready(function() {
			// Function to handle opening modal and updating modal content
			$('.open-modal').on('click', function() {
				var productId = $(this).data('id');
				var productName = $(this).data('name');
				var productPrice = $(this).data('price');
				var productDescription = $(this).data('description');
				var productImage = $(this).data('image');

				$('#modal-title').text(productName);
				$('#modal-price').text('$' + productPrice);
				$('#modal-description').text(productDescription);
				$('#modal-image').attr('src', productImage);


				// Update "View Product Details" link href dynamically
				$('#modal-view-details').attr('href', 'product-single.php?id=' + productId); // Update with your actual product details link


			});
		});
		// Add to Cart button click event
		$(document).ready(function() {
			$(document).on('click', '#add-to-cart', function(e) {
				e.preventDefault(); // Prevent the default link behavior

				let productId = $(this).data('id');
				let productSize = $('#product-size').val();
				var productQuantity = parseInt($('#product-quantity').text());
				let productPrice = $(this).data('price');
				var availableQuantity = parseInt($(this).data('available-quantity'));

				// Log variables for debugging
				console.log('Product ID:', productId);
				console.log('Product Size:', productSize);
				console.log('Product Quantity:', productQuantity);
				console.log('Available Quantity:', availableQuantity);
				console.log('Product Price:', productPrice);

				// Check if the requested quantity exceeds the available quantity
				if (productQuantity > availableQuantity) {
					// Show an alert with SweetAlert2
					Swal.fire({
						title: 'Insufficient Quantity',
						text: 'Only ' + availableQuantity + ' items available.',
						icon: 'warning',
						confirmButtonText: 'OK'
					}).then(() => {
						console.log('SweetAlert2 displayed successfully');
					}).catch(error => {
						console.error('Error displaying SweetAlert2:', error);
					});
				} else {
					// Proceed with adding to cart via AJAX
					$.ajax({
						url: '../actions/add_to_cart.php',
						type: 'POST',
						data: {
							id: productId,
							size: productSize,
							quantity: productQuantity,
							price: productPrice,
						},
						success: function(response) {
							// Check if the product was newly added
							if (response.product_added) {
								let newCartCount = parseInt($('#cart-count').text()) + 1; // Increment the count by 1
								$('#cart-count').text(newCartCount); // Update the cart count
							}
							$('#add-to-cart .text').text("Added Successfully!");
						},
						error: function(xhr, status, error) {
							// Handle error
							console.error('AJAX Error:', status, error);
						}
					});
				}
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

		function changeText() {
			var button = document.getElementById("login-to-cart");
			button.textContent = "Login to add to cart!";
		}

		function changeTextStock() {
			var button = document.getElementById("outStock");
			button.innerHTML = "Out Of Stock!";
		}
	</script>


</body>

</html>