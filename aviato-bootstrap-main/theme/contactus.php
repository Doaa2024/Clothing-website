<!DOCTYPE html>
<html lang="en">
<?php require_once('common/header.php'); ?>
<style>
	.custom-contact-form h1 {
		font-size: 36px;
		/* Large font size */
		color: #333;
		/* Dark color for contrast */
		text-align: center;
		/* Centered text */
		margin-bottom: 40px;
		/* Space below the heading */
		font-weight: 700;
		/* Bold font */
		letter-spacing: 2px;
		/* Spacing between letters for a modern look */
		text-transform: uppercase;
		/* Convert text to uppercase */
		line-height: 1.2;
		/* Line height for better readability */
		position: relative;
		/* Positioning for the decorative underline */
	}

	.custom-contact-form h1::after {
		content: "";
		position: absolute;
		left: 50%;
		bottom: -10px;
		transform: translateX(-50%);
		width: 60px;
		height: 3px;
		background-color: #333;
		/* Same color as the text */
		border-radius: 5px;
		/* Rounded corners */
	}

	.custom-container {
		background-color: white;
		padding: 50px;
		display: flex;
		justify-content: center;
	}

	.custom-contact-form {
		background-color: #ffffff;
		padding: 50px;
		/* Increased padding */
		border-radius: 10px;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
		/* Increased box shadow */
		width: 100%;
		width: 600px;
		/* Increased max width for better centering */
	}

	.custom-contact-form .custom-form-control {
		background-color: rgba(85, 85, 85, 0.1);
		/* #555 with 30% opacity */

		/* Very light dark gray with 10% opacity */

		/* Lighter background color */
		border: 1px solid #ddd;
		border-radius: 50px;
		padding: 25px 30px;
		/* Increased padding */
		font-size: 22px;
		/* Increased font size */
		color: #333;
		margin-bottom: 25px;
		width: 100%;
		/* Full width */
		box-sizing: border-box;
		/* Ensures padding is included in width */
		transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
		text-align: center;
		/* Centered text */
	}

	.custom-contact-form .custom-form-control:focus {
		border-color: #333;
		box-shadow: 0 0 8px rgba(51, 51, 51, 0.1);
	}

	.custom-contact-form .custom-form-control::placeholder {
		color: #999;
		font-style: italic;
	}

	.custom-contact-form .custom-btn-container {
		display: flex;
		justify-content: center;
		/* Center the button */
		margin-top: 30px;
	}

	.custom-contact-form .custom-btn {
		background-color: #333;
		margin-left: 22.5%;
		color: white;
		border-radius: 50px;
		padding: 15px 100px;
		/* Larger padding for a bigger button */
		font-size: 18px;
		/* Increased font size */
		transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
		text-align: center;
	}

	.custom-contact-form .custom-btn:hover {
		background-color: #555;
		box-shadow: 0 0 8px rgba(51, 51, 51, 0.1);
	}

	.custom-success,
	.custom-error {
		display: none;
		padding: 15px;
		margin-bottom: 25px;
		border-radius: 5px;
		font-size: 16px;
		/* Increased font size */
		text-align: center;
	}

	.custom-success {
		color: green;
	}

	.custom-error {
		color: red;
	}
</style>

<body id="body">
	<!-- Start Top Header Bar -->
	<?php require_once('common/navbar.php'); ?>
	<section class="page-header" style="background-color:#555;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content">
						<h1 class="page-name">Contact Us</h1>
						<ol class="breadcrumb white">
							<li><a href="index.php" style="color:white">Home</a></li>
							<li class="active" style="color:white">contact us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<ul class="list-inline dashboard-menu text-center" style="margin-top:60px;">
		<li><a class="active" href="contactus.php" style="border-radius:40px;">Contact Us</a></li>
		<li><a href="order.php" style="border-radius:40px;">Orders</a></li>
	</ul>
	<section class="custom-page-wrapper">
		<div class="custom-container">
			<div class="row justify-content-center">
				<!-- Contact Form -->

				<div class="custom-contact-form col-md-6">
					<form id="custom-contact-form" method="post" action="https://formspree.io/f/mrbzkenq" role="form">
						<h1>Contact Us</h1>
						<div class="custom-form-group">
							<input type="text" placeholder="Enter Your Name" class="custom-form-control" name="name" id="name">
						</div>
						<div class="custom-form-group">
							<input type="email" placeholder="Enter Your Email" class="custom-form-control" name="email" id="email">
						</div>
						<div class="custom-form-group">
							<input type="text" placeholder="What is Your Subject" class="custom-form-control" name="subject" id="subject">
						</div>
						<div class="custom-form-group">
							<textarea rows="6" placeholder="Write a Message" class="custom-form-control" name="message" id="message"></textarea>
						</div>
						<div id="custom-mail-success" class="custom-success">
							Thank you. The Mailman is on His Way :)
						</div>
						<div id="custom-mail-fail" class="custom-error">
							Sorry, don't know what happened. Try later :(
						</div>
						<div id="custom-cf-submit">
							<input type="submit" id="custom-contact-submit" class="custom-btn custom-btn-transparent" value="Submit">
						</div>
					</form>
				</div>
			</div> <!-- end row -->
		</div> <!-- end container -->
	</section>

	<?php require_once('common/footer.php'); ?>

	<?php require_once('common/script.php'); ?>
</body>

</html>