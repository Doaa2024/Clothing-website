<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<?php require_once("../class/about.class.php"); ?>
<?php require_once('common/header.php'); ?>
<?php $about = new About();
$allabout = $about->getAllAbout(); ?>

<body id="body">

	<!-- Start Top Header Bar -->
	<?php require_once('common/navbar.php'); ?>
	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h1 class="page-name">About Us</h1>
						<ol class="breadcrumb">
							<li><a href="index.php" style="color:white;">Home</a></li>
							<li class="active" style="color:white;">about us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="about section">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img class="img-responsive" src="
http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allabout[0]['image'] ?>">
				</div>
				<div class="col-md-6" style="margin-top: -60px;">
					<h2 class="mt-40">About Our Shop</h2>
					<p style="font-size: medium; line-height:30px;"><?= $allabout[0]['description'] ?></p>
					<a href="shop.php" class="btn btn-main mt-20">Shop Now</a>

				</div>
			</div>

	</section>



	<?php require_once('common/footer.php'); ?>
	<?php require_once('common/script.php'); ?>


</body>

</html>