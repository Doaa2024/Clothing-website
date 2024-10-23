<!DOCTYPE html>
<html lang="en">
<?php require_once("class/order.class.php"); ?>
<?php require_once('components/header.php'); ?>
<?php $order = new Order();
$id = $_GET['id'];
$allOrders = $order->getAllOrderItems($id); ?>

<body class="sb-nav-fixed">
    <?php require_once('components/nav.php'); ?>
    <?php require_once('components/sidebar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-3">Order Items</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</li></a>
                    <li class="breadcrumb-item"><a href="orders.php">Orders</li></a>
                    <li class="breadcrumb-item active">Order details</li>
                </ol>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Order Items
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>OrderID</th>
                                    <th>ProductID</th>
                                    <th>
                                        Size
                                    </th>

                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($allOrders as $orders) {
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
        </main>
        <?php require_once('components/footer.php'); ?>
    </div>
    </div>
    <?php require_once('components/script.php'); ?>
</body>