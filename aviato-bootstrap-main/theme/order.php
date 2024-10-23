<?php
session_start();
require("../class/order.class.php");
$order = new Order();
if (isset($_SESSION['username']) && $_SESSION['login'] === true) {
	$customer_id = $order->getCustomerID($_SESSION['username']);
	$allOrders = $order->getAllOrders($customer_id[0]['CustomerID']);
} else {
	header('Location: orderempty.php');
	exit;
}

?>
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
						<h1 class="page-name">Order</h1>
						<ol class="breadcrumb white">
							<li><a href="index.php" style="color:white">Home</a></li>
							<li class="active" style="color:white">order</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="user-dashboard page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="list-inline dashboard-menu text-center" style="margin-top:-30px;">
						<li><a href="contactus.php" style="border-radius:40px;">Contact Us</a></li>
						<li><a class="active" href="order.php" style="border-radius:40px;">Orders</a></li>
					</ul>
					<div class="dashboard-wrapper user-dashboard">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Order ID</th>
										<th>Date</th>
										<th>Total Price</th>
										<th>Address</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php

									foreach ($allOrders as $orders) {
									?>
										<tr>
											<td><?php echo $orders['OrderID'] ?></td>
											<td><?php echo $orders['OrderDate'] ?></td>
											<td>$<?php echo $orders['TotalAmount'] ?></td>
											<td><?php echo $orders['Address'] ?></td>
											<td><?php echo $orders['Status'] ?></td>

											<td><a href="orderitems.php?id=<?php echo $orders['OrderID'] ?>" class="btn btn-default" style="background-color:#444; color: white;">View Details</a></td>
										</tr>

									<?php } ?>

									</tr>
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