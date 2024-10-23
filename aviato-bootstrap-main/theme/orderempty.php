<!DOCTYPE html>
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

    <section class="empty-cart page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <i class="tf-ion-ios-cart-outline"></i>
                        <h2 class="text-center">Your have no order yet!.</h2>
                        <p>Login to make orders..</p>
                        <a href="shop-sidebar.php" class="btn btn-main mt-20">Return to shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once('common/footer.php'); ?>
    <?php require_once('common/script.php'); ?>

    <style>
        .empty-cart {
            padding-top: 100px;
            padding-bottom: 120px;
            /* Adjust the value as per your design */
        }
    </style>

</body>

</html>