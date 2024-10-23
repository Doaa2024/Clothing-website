<!DOCTYPE html>
<?php require_once("../class/blog.class.php"); ?>

<?php $blog = new Blog();
$allblog = $blog->getAllBlog(); ?>
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
	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h1 class="page-name">Blog</h1>
						<ol class="breadcrumb">
							<li><a href="index.php" style="color:white;">Home</a></li>
							<li class="active" style="color:white;">blog</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>


	<div class="page-wrapper">
		<div class="container">
			<div class="row">
				<?php foreach ($allblog as $blog) : ?>
					<div class="col-md-6">
						<div class="post">
							<div class="post-thumb">
								<a href="blog-single.html">
									<img class="img-responsive" src="
									http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $blog['image'] ?>" alt="">
								</a>
							</div>
							<h2 class="post-title"><a href="blog-single.html"><?= $blog['title'] ?></a></h2>
							<div class="post-meta">
								<ul>
									<li>
										<i class="tf-ion-ios-calendar"></i> <?= $blog['date_posted'] ?>
									</li>
									<li>
										<i class="tf-ion-android-person"></i> POSTED BY ADMIN
									</li>
									<li>
										<a href="blog-grid.html"><i class="tf-ion-ios-pricetags"></i> <?= $blog['type'] ?></a>
									</li>

								</ul>
							</div>
							<div class="post-content">
								<p><?= $blog['description'] ?> </p>
								<a href="shop.php" class="btn btn-main">Shop Now</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php require_once('common/footer.php'); ?>
	<?php require_once('common/script.php'); ?>


</body>

</html>