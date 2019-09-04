<?php include('includes/header.php'); ?>
<?php require_once('controller/login.controller.php'); ?>
<?php if($session->is_signed_in()) : ?>
<?php redirect('/dashboard/'); ?>
<?php else: ?>
<?php include('includes/navigation.php'); ?>
<!-- Page info section -->
	<section class="page-info-section">
		<div class="container">
			<h2>Login</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Login</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->
<?php include('pages/login.content.php'); ?>
<?php include('includes/footer.php'); ?>
<?php endif; ?>