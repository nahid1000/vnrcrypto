<?php include('includes/header.php'); ?>
<?php include('includes/navigation.php') ?>
<!-- Page info section -->
	<section class="page-info-section">
		<div class="container">
			<h2>Contact Us</h2>
			<div class="site-beradcamb">
				<a href="/">Home</a>
				<span><i class="fa fa-angle-right"></i> Contact us</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->
<?php require_once('controller/contact.controller.php'); ?>

<?php include('pages/contact.content.php'); ?>
<?php include('includes/footer.php'); ?>