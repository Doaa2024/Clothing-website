<?php
session_start();
require("../class/order.class.php");
$order = new Order();
$id = $_GET['id'];
$allOrders = $order->getAllOrderItems($id); ?>


<!DOCTYPE html>
<html lang="en">
<?php require_once('common/header.php'); ?>

<body id="body">
    <!-- Start Top Header Bar -->
    <?php require_once('common/navbar.php'); ?>
    <section class="page-header" style="background-color:#555;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Order's Details</h1>
                        <ol class="breadcrumb white">
                            <li><a href="index.php" style="color:white">Home</a></li>
                            <li><a href="order.php" style="color:white">My Orders</a></li>
                            <li class="active" style="color:white">Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="user-dashboard page-wrapper" style="padding-bottom:10%; padding-top:0%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Prodoct ID</th>
                                        <th>Size</th>
                                        <th>Quantity</th>
                                        <th>Price</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($allOrders as $orders) {
                                    ?>
                                        <tr>
                                            <td><?php echo $orders['OrderID'] ?></td>
                                            <td><?php echo $orders['ProductID'] ?></td>
                                            <td><?php echo $orders['Size'] ?></td>
                                            <td><?php echo $orders['Quantity'] ?></td>
                                            <td><?php echo $orders['Price'] ?></td>
                                        </tr>

                                    <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('common/footer.php'); ?>
    <?php require_once('common/script.php'); ?>
</body>

</html>