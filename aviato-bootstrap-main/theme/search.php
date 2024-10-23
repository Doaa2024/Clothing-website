<?php
session_start();
require_once("../class/DAL.class.php");
$dal = new DAL();
require_once("../class/index.class.php");
$index = new Index();
$query = isset($_POST['search']) ? trim($_POST['search']) : '';

// Use prepared statements to prevent SQL injection
$sql = "SELECT * FROM `product` WHERE `product_name` LIKE ? ";
$searchTerm = "%" . $query . "%";
$params = array($searchTerm);
$allProducts = $dal->data($sql, $params);
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('common/header.php');
require_once('common/navbar.php'); ?>
<style>
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
</style>

<body style="margin: 0; padding: 0;">
    <?php if ($query === '') { ?>
        <section class="empty-cart page-wrapper" style="margin-bottom:50px">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block text-center">
                            <i class="tf-ion-ios-search"></i>
                            <h2>Your search is empty!</h2>
                            <p class="text-center">Please enter a valid search term!</p>
                            <a href="shop-sidebar.php" class="custom-btn">Return to shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } else if (empty($allProducts)) { ?>
        <section class="no-products page-wrapper" style="margin-bottom:55px">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block text-center">
                            <i class="tf-ion-ios-search" style="font-size: 48px;"></i>

                            <h2>No Products Found!</h2>
                            <p class="text-center">No products matched your search term.</p>
                            <a href="shop-sidebar.php" class="custom-btn">Return to shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <section style="display: flex; flex-direction: column; margin-bottom:30px;">
            <div style="flex: 1; display: flex; justify-content: center; align-items: center;">
                <div class="col-md-10" style="margin: auto;">
                    <div class="row" id="product-list">
                        <?php foreach ($allProducts as $product) { ?>
                            <div class="col-md-4">
                                <div class="product-item" id="product-item">
                                    <div class="product-thumb">
                                        <?php if ($product['quantity'] == 0) : ?>
                                            <span class="bage">Out of Stock</span>
                                        <?php endif ?>
                                        <?php $allimages = $index->getimages($product['product_id']) ?>
                                        <img style="height: 350px; width: 350px;" class="img-responsive" src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allimages[0]['image_name'] ?>" />
                                        <div class="preview-meta">
                                            <ul>
                                                <li>
                                                    <span style="border-radius: 50%; margin-right: 3px;" data-toggle="modal" data-target="#product-modal" data-id="<?php echo $product['product_id'] ?>" data-name="<?php echo $product['product_name'] ?>" data-price="<?php echo $product['price'] ?>" data-description="<?php echo $product['small_description'] ?>" data-image="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allimages[0]['image_name'] ?>">
                                                        <i class="tf-ion-ios-search-strong"></i>
                                                    </span>
                                                </li>
                                                <?php
                                                $is_in_wishlist = isset($_SESSION['wishlist']) && in_array($product['product_id'], $_SESSION['wishlist']);
                                                ?>
                                                <li>
                                                    <a href="#!" data-id="<?php echo $product['product_id']; ?>" class="add-to-wishlist" style="border-radius: 50%; margin-right:6px;">
                                                        <i class="tf-ion-ios-heart heart-icon" style="color: <?php echo $is_in_wishlist ? 'red' : 'black'; ?>;"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a style="margin-right:3px; border-radius:100px;" href="cart.php"><i class="tf-ion-android-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4><a href="product-details.php?id=<?php echo $product['product_id'] ?>"><?php echo $product['product_name'] ?></a></h4>
                                        <p class="price">$<?php echo $product['price'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

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
    <?php require_once('common/footer.php'); ?>
    <!-- 
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->

    <?php require_once('common/script.php'); ?>
</body>


</html>

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