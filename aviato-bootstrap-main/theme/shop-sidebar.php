<?php
session_start();
require_once("../class/index.class.php"); ?>
<?php require_once("../class/filter.class.php"); ?>
<?php $index = new Index();
$allindex = $index->getAllIndex();
$filter = new Filter();
$allCategories = $filter->getAllCategories();
$productCount = $index->getCount();
// Assuming $productCount[0]['total_products'] contains the total number of products
$totalProducts = $productCount[0]['total_products'];
$itemsPerPage = 6;
// Calculate the total number of pages
$totalPages = ceil($totalProducts / $itemsPerPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$itemsPerPage = 6;
$offset = ($page - 1) * $itemsPerPage;

$allProducts = $index->getAllProducts($offset, $itemsPerPage);
?>
<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->
<style>
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


	.btn-toggle {
		margin-left: 6%;
		margin-bottom: 2%;
		color: #444;
		border: 2px solid #444;
		border-radius: 40px;
		background-color: #fff;
		cursor: pointer;
		font-size: 18px;
		display: flex;
		align-items: center;
		z-index: 1001;
		border-left: none;
		border-bottom: none;
		border-top: none;
		border-radius: 0px;
		/* Ensure the button is on top */
	}

	.btn-toggle:hover {
		border: 2px solid #444;
		border-radius: 0.5em;
	}

	.btn-icon {
		margin-right: 0px;
	}

	.sidebar {
		position: fixed;
		top: 0;
		left: 0;
		height: 100%;
		width: 250px;
		background-color: #fff;
		color: #222;
		transform: translateX(-100%);
		transition: transform 0.3s ease;
		padding: 20px;
		z-index: 1000;
		box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
	}

	.sidebar-content {
		display: flex;
		flex-direction: column;
	}

	.btn-close {
		background: none;
		border: none;
		color: #222;
		font-size: 24px;
		cursor: pointer;
		position: absolute;
		top: 20px;
		right: 20px;
		z-index: 1001;
	}

	.btn-close:hover {
		color: #fff;
		background-color: #555;
		border-radius: 20px;
		padding-top: 0px;
		padding-bottom: 0px;
		padding-left: 2px;
		padding-right: 2px;
	}

	.dropdown-header {
		font-weight: bold;
		margin-top: 10px;
		margin-bottom: 5px;
		color: #222;
	}

	.dropdown-item {
		color: #222;
		text-decoration: none;
		padding: 10px;
		border-radius: 4px;
		margin-bottom: 5px;
		display: block;
		font-size: 14px;
	}

	.dropdown-item:hover {
		background-color: #555;
		color: #fff;
	}

	.dropdown-divider {
		border-top: 1px solid #ccc;
		margin: 10px 0;
	}

	.sidebar.open {
		transform: translateX(0);
	}

	.page-item.active .page-link {
		background-color: #888;
		color: white;
		border-color: gray;
	}

	.page-item.active .page-link:hover {
		background-color: #ddd;
		color: white;
		border-color: #ddd;
	}

	.dropdown-item.active {
		background-color: #444;
		/* Highlight color */
		color: #fff;
		/* Text color for the active item */
	}

	.dropdown-item {
		color: #555;
		/* Default text color */
		text-decoration: none;
		padding: 10px;
		border-radius: 4px;
		margin-bottom: 5px;
		display: block;
	}

	.dropdown-item:hover {
		background-color: #666;
		color: #fff;
	}

	.dropdown-divider {
		border-top: 1px solid #444;
		margin: 10px 0;
	}

	.dropdown-header {
		font-size: 18px;
		padding: 0;
		margin-left: 10px;
		color: #555;
	}
</style>

<html lang="en">

<?php require_once('common/header.php'); ?>

<body id="body">
	<?php require_once('common/navbar.php'); ?>
	<button class="btn-toggle" id="filterToggle">
		<span class="btn-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
				<path fill="#444" d="M14 12v7.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0l-2.01-2.01a.99.99 0 0 1-.29-.83V12h-.03L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L14.03 12z" />
			</svg>
		</span>
		Filter
	</button>

	<div class="sidebar" id="sidebar">
		<button class="btn-close" id="sidebarClose">&times;</button>
		<?php
		$currentCategoryFilter = isset($_GET['filter_category']) ? $_GET['filter_category'] : 'all';
		$currentSortFilter = isset($_GET['filter_sort']) ? $_GET['filter_sort'] : 'rand';
		?>
		<div class="sidebar-content">
			<div class="dropdown-header" style="font-size:18px; padding:0%; margin-left:10px; color:#555;">Categories</div>
			<a class="dropdown-item <?= ($currentCategoryFilter == 'all') ? 'active' : ''; ?>" href="#" data-filter-category="all">All Products</a>
			<?php foreach ($allCategories as $category) { ?>
				<a class="dropdown-item <?= ($currentCategoryFilter == $category['categories_id']) ? 'active' : ''; ?>" href="#" data-filter-category="<?= $category['categories_id'] ?>"><?= $category['categories_name'] ?></a>
			<?php } ?>
			<div class="dropdown-divider"></div>
			<div class="dropdown-header" style="font-size:18px; padding:0%; margin-left:10px; color:#555;">Sort by</div>
			<a class="dropdown-item <?= ($currentSortFilter == 'rand') ? 'active' : ''; ?>" href="#" data-filter-sort="rand">Random</a>
			<a class="dropdown-item <?= ($currentSortFilter == 'recent') ? 'active' : ''; ?>" href="#" data-filter-sort="recent">Recent Items</a>
			<a class="dropdown-item <?= ($currentSortFilter == 'bests') ? 'active' : ''; ?>" href="#" data-filter-sort="bests">Best Selling</a>
			<a class="dropdown-item <?= ($currentSortFilter == 'highest') ? 'active' : ''; ?>" href="#" data-filter-sort="highest">High to Low</a>
			<a class="dropdown-item <?= ($currentSortFilter == 'lowest') ? 'active' : ''; ?>" href="#" data-filter-sort="lowest">Low to High</a>
		</div>
	</div>


	<section class="products section" style="margin-top:0%; padding-top:0%;">
		<div class="container">
			<div class="row">
				<div style="flex: 1; display:flex; justify-content:center; align-items:center;">
					<div class="col-md-11">
						<div class="row" id="product-list">
							<?php foreach ($allProducts as $product) { ?>
								<div class="col-md-4">
									<div class="product-item" id="product-item">
										<div class="product-thumb">
											<?php if ($product['quantity'] == 0) : ?>
												<span class="bage">Out of Stock</span>
											<?php endif ?>
											<?php $allimages = $index->getimages($product['product_id']) ?>
											<img style="height:350px; width:350px;" class="img-responsive" src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allimages[0]['image_name'] ?>" />
											<div class="preview-meta">
												<ul>
													<li>
														<span style="margin-right:3px; border-radius:100px;" data-toggle="modal" data-target="#product-modal" data-id="<?php echo $product['product_id'] ?>" data-name="<?php echo $product['product_name'] ?>" data-price="<?php echo $product['price'] ?>" data-description="<?php echo $product['small_description'] ?>" data-image="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allimages[0]['image_name'] ?>">
															<i class="tf-ion-ios-search-strong"></i>
														</span>
													</li>
													<?php
													$is_in_wishlist = isset($_SESSION['wishlist']) && in_array($product['product_id'], $_SESSION['wishlist']);
													?>
													<li>
														<a style="margin-right:3px; border-radius:100px;" href="#!" data-id="<?php echo $product['product_id']; ?>" class="add-to-wishlist">
															<i class="tf-ion-ios-heart heart-icon" style="color: <?php echo $is_in_wishlist ? 'red' : ''; ?>;"></i>
														</a>
													</li>


													<li>
														<a style="margin-right:3px; border-radius:100px;" href="cart.php"><i class="tf-ion-android-cart"></i></a>
													</li>
												</ul>
											</div>
										</div>
										<div class="product-content">
											<h4><a href="product-single.html"><?php echo $product['product_name'] ?></a></h4>
											<p class="price">$<?php echo $product['price'] ?></p>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>

						<!-- Modal -->
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
						<nav aria-label="Page navigation example" style="display:flex; justify-content:center; align-items:center;">
							<ul class="pagination">
								<!-- Previous Button -->
								<li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>">
									<a style="color:black; " class="page-link" href="<?= ($page > 1) ? '?page=' . ($page - 1) : '#'; ?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								</li>

								<!-- Page Numbers -->
								<?php for ($i = 1; $i <= $totalPages; $i++) { ?>
									<li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
										<a style="color:black;" class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
									</li>
								<?php } ?>

								<!-- Next Button -->
								<li class="page-item <?= ($page >= $totalPages) ? 'disabled' : ''; ?>">
									<a style="color:black;" class="page-link" href="<?= ($page < $totalPages) ? '?page=' . ($page + 1) : '#'; ?>" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
							</ul>

						</nav>
					</div>
				</div>

			</div>
		</div>
		</d>
	</section>




	<?php require_once('common/footer.php'); ?>
	<!-- 
    Essential Scripts
    =====================================-->

	<!-- Main jQuery -->

	<?php require_once('common/script.php'); ?>

	<script>
		document.getElementById('filterToggle').addEventListener('click', function() {
			document.getElementById('sidebar').classList.toggle('open');
		});

		document.getElementById('sidebarClose').addEventListener('click', function() {
			document.getElementById('sidebar').classList.remove('open');
		});




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
		$(document).ready(function() {
			let currentCategoryFilter = 'all';
			let currentSortFilter = 'rand';
			let isFilterActive = false;

			function loadProducts(categoryFilter, sortFilter, page) {
				console.log("Loading products with category filter:", categoryFilter, "sort filter:", sortFilter, "and page:", page);
				$.ajax({
					url: '../actions/filter_apply.php',
					method: 'POST',
					dataType: 'json',
					data: {
						filter_category: categoryFilter,
						filter_sort: sortFilter,
						page: page
					},
					success: function(response) {
						console.log("Response from server:", response);
						if (response && Array.isArray(response.products) && response.totalPages !== undefined) {
							updateProductList(response.products);
							updatePagination(response.totalPages, response.currentPage);
						} else {
							console.error('Invalid response format:', response);
						}
					},
					error: function(xhr, status, error) {
						console.error('AJAX Error:', error);
					}
				});
			}

			$('a[data-filter-category]').click(function(e) {
				e.preventDefault();
				currentCategoryFilter = $(this).data('filter-category');
				isFilterActive = true;
				loadProducts(currentCategoryFilter, currentSortFilter, 1);
				$('a[data-filter-category]').removeClass('active');
				$(this).addClass('active');
			});

			$('a[data-filter-sort]').click(function(e) {
				e.preventDefault();
				currentSortFilter = $(this).data('filter-sort');
				isFilterActive = true;
				loadProducts(currentCategoryFilter, currentSortFilter, 1);
				$('a[data-filter-sort]').removeClass('active');
				$(this).addClass('active');
			});

			$(document).on('click', '.pagination a', function(e) {
				if (isFilterActive) {
					e.preventDefault();
					if (!$(this).parent().hasClass('disabled')) {
						let page = $(this).data('page');
						loadProducts(currentCategoryFilter, currentSortFilter, page);
					}
				}
			});



			function updateProductList(products) {
				console.log("Updating product list with products:", products); // Log the products
				var productList = $('#product-list');
				productList.empty();

				if (products.length > 0) {
					products.forEach(function(product) {
						var wishlist = <?php echo json_encode(isset($_SESSION['wishlist']) ? $_SESSION['wishlist'] : []); ?>;

						function isInWishlist(productId) {
							return wishlist && wishlist.includes(productId);
						}
						var productItem = '<div class="col-md-4">' +
							'<div class="product-item">' +
							'<div class="product-thumb">';

						// Check for quantity and add the "Out of Stock" badge if necessary
						if (product.quantity == 0) {
							productItem += '<span class="bage">Out of Stock</span>';
						}

						productItem +=
							'<img style="height:350px; width:350px;" class="img-responsive" src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/' + product.product_image + '" />' +
							'<div class="preview-meta"><ul><li>' +
							'<span style="margin-right:6px; border-radius:100px;" data-toggle="modal" data-target="#product-modal" ' +
							'data-id="' + product.product_id + '" ' +
							'data-name="' + product.product_name + '" ' +
							'data-price="' + product.price + '" ' +
							'data-description="' + product.small_description + '" ' +
							'data-image="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/' + product.product_image + '">' +
							'<i class="tf-ion-ios-search-strong"></i>' +
							'</span></li><li>' +
							'<a style="margin-right:6px; border-radius:100px;" href="#!" data-id="' + product.product_id + '" class="add-to-wishlist">' +
							'<i class="tf-ion-ios-heart heart-icon" style="color: ' + (isInWishlist(product.product_id) ? 'red' : '') + '; "></i>' +
							'</a></li><li>' +
							'<a href="cart.php"  style="margin-right:6px; border-radius:100px;"><i class="tf-ion-android-cart"></i></a></li></ul></div></div>' +
							'<div class="product-content"><h4><a href="product-single.html">' + product.product_name + '</a></h4>' +
							'<p class="price">$' + product.price + '</p></div></div></div>';

						productList.append(productItem);
					});
				} else {
					productList.html('<p>No products found.</p>');
				}
			}

			function updatePagination(totalPages, currentPage) {
				console.log("Updating pagination with totalPages:", totalPages, "and currentPage:", currentPage); // Log the pagination info
				var pagination = $('.pagination');
				pagination.empty();

				pagination.append('<li style="color:black;" class="page-item ' + (currentPage <= 1 ? 'disabled' : '') + '">' +
					'<a style="color:black;" class="page-link" href="#" data-page="' + (currentPage - 1) + '" aria-label="Previous">' +
					'<span style="color:black;" aria-hidden="true">&laquo;</span></a></li>');

				for (var i = 1; i <= totalPages; i++) {
					pagination.append('<li style="color:black;" class="page-item ' + (i == currentPage ? 'active' : '') + '">' +
						'<a style="color:black;" class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
				}

				pagination.append('<li style="color:black;" class="page-item ' + (currentPage >= totalPages ? 'disabled' : '') + '">' +
					'<a style="color:black;" class="page-link" href="#" data-page="' + (currentPage + 1) + '" aria-label="Next">' +
					'<span style="color:black;" aria-hidden="true">&raquo;</span></a></li>');
			}

			loadProducts(currentFilter, 1);
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
</body>

</html>