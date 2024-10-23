<!DOCTYPE html>
<html lang="en">
<?php require_once("../class/faq.class.php"); ?>
<?php $faq = new FAQ();
$allfaq = $faq->getAllFAQ(); ?>
<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->



<?php require_once('common/header.php'); ?>
<style>
	.page-wrapper {
		background: white;
		padding-top: 20px;
		padding-bottom: 30px;
	}

	.faq-heading {
		font-size: 2.5rem;
		color: black;
		text-align: center;
		margin-bottom: 40px;
		text-transform: uppercase;
		font-weight: bold;
		letter-spacing: 1.5px;
	}

	.faq-item {
		background: linear-gradient(to right, #fff, white);
		border-radius: 10px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		padding: 20px;
		margin-bottom: 25px;
		transition: transform 0.3s ease, box-shadow 0.3s ease;
		width: 100%;
	}

	.faq-item:hover {
		transform: translateY(-5px);
		box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
	}

	.faq-title {
		font-size: 2rem;
		color: black;
		margin-bottom: 10px;
	}

	.faq-description {
		font-size: 1.5rem;
		color: rgba(0, 0, 0, 0.5);
	}

	@media (max-width: 768px) {
		.faq-item {
			margin-left: 15px;
			margin-right: 15px;
		}
	}
</style>

<body id="body">

	<!-- Start Top Header Bar -->
	<?php require_once('common/navbar.php'); ?>

	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h1 class="page-name">Frequently Asked Questions</h1>
						<ol class="breadcrumb">
							<li><a href="index.php" style="color:white;">Home</a></li>
							<li class="active" style="color:white;">f.a.q</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="page-wrapper">
		<div class="container">
			<div class="row">
				<?php foreach ($allfaq as $faq) : ?>
					<div class="col-md-8 offset-md-2 faq-item">
						<h4 class="faq-title"><?= $faq['title'] ?></h4>
						<p class="faq-description"><?= $faq['description'] ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>



	<?php require_once('common/footer.php'); ?>
	<?php require_once('common/script.php'); ?>



</body>

</html>