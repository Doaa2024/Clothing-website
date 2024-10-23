<?php
session_start();
require("../class/products.class.php");
$products = new Products();
?>
<!DOCTYPE html>

<html lang="en">
<?php require_once('common/header.php'); ?>

<style>
    body {
        background-color: #fff;
        color: #333;
    }

    .wishlist-card {
        border-radius: 15px;
        overflow: hidden;
        /* Ensures the border-radius effect is visible */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: #fff;
        border: none;
        position: relative;
    }

    .wishlist-card:hover {
        transform: scale(1.05);
    }

    .wishlist-container {
        padding: 20px;
    }

    .wishlist-card {
        height: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        background-color: #fff;
        border: none;
    }

    .wishlist-card img {
        width: 100%;

        object-fit: fill;
        object-position: center;
        transition: transform 0.2s;
    }

    .wishlist-card:hover img {
        transform: scale(1.05);
    }

    .wishlist-card .card-body {
        padding: 15px;
    }

    .wishlist-card .card-title {
        margin-bottom: 10px;
        font-size: 20px;
        font-weight: 400;
    }

    .view-details-link {
        display: inline-block;
        text-decoration: underline;
    }

    .view-details-link:hover {
        color: #555;
        transform: scale(1.05);
    }

    .card-text {
        margin-bottom: 20px;
        font-size: 17px;
        font-weight: 300;
    }

    .row>.col-md-4 {
        margin-bottom: 30px;
    }

    .action-container {
        display: flex;
        align-items: center;
        /* Align items vertically centered */
        gap: 10px;
        /* Space between the link and icon */
    }

    .view-details-link {

        color: #333;
        /* Black */
        font-size: 14px;
        font-weight: 500;
        text-decoration: underline;

        transition: background-color 0.3s, color 0.3s, transform 0.3s;
    }

    .view-details-link:hover {

        /* Black */
        color: #555;
        /* White */
        transform: scale(1.05);
    }

    .delete-icon {
        color: #ff0000;
        /* Red */
        font-size: 18px;
        transition: transform 0.3s, color 0.3s;
    }

    .delete-icon:hover {
        transform: scale(1.2);
        color: #cc0000;
        /* Darker red */
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<body id="body">
    <?php require_once('common/navbar.php'); ?>

    <?php if (isset($_SESSION['username']) && $_SESSION['login'] === true) : ?>
        <?php if (isset($_SESSION['wishlist']) && count($_SESSION['wishlist']) > 0) : ?>
            <div class="container wishlist-container" style="margin-bottom:5%;">
                <div class="row">

                    <?php foreach ($_SESSION['wishlist'] as $wish_item) : ?>
                        <?php
                        $product = $products->getProductByID($wish_item);
                        $allimages = $products->getimages($wish_item);
                        ?>
                        <!-- Wishlist Item 3 -->
                        <div class="col-md-4">
                            <div class="card wishlist-card">
                                <img style="height:350px; width:100%;" src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allimages[0]['image_name'] ?>" class="card-img-top" alt="Product Image">
                                <div class="card-body">

                                    <h5 class="card-title"><?php echo $product[0]['product_name']; ?></h5>
                                    <p class="card-text"><?php echo $product[0]['price'] ?>$</p>
                                    <div class="action-container">
                                        <a href="product-single.php?id=<?php echo $product[0]['product_id'] ?>" class="view-details-link">View More Details</a>
                                        <a href="../actions/remove_wishlist.php?id=<?php echo $product[0]['product_id'] ?>" class="delete-icon" style="margin-left: 53%;">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else : ?>

                    <section class="empty-cart page-wrapper" style="padding-top:100px; padding-bottom:150px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="block text-center">
                                        <i class="tf-ion-ios-heart"></i>
                                        <h2 class="text-center">Your Wishlist is currently empty!</h2>
                                        <p>Start scrolling & fill your wishlist with amazing deals and products...</p>
                                        <a href="shop-sidebar.php" class="custom-btn">Return to shop</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>

                </div>
            </div>

        <?php else : ?>
            <section class="empty-cart page-wrapper" style="padding-top:100px; padding-bottom:150px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="block text-center">
                                <i class="tf-ion-ios-heart"></i>
                                <h2 class="text-center">Your wishlist is currently empty, Login to Fill it!</h2>
                                <p>Create account if you don't have, then login to add to your wishlist...</p>
                                <a href="http://localhost/adminPanelSherke/adminPanelSherke/logout.php" class="custom-btn">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php require_once('common/footer.php'); ?>
        <?php require_once('common/script.php'); ?>


</body>


</html>