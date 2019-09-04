<?php include('includes/header.php'); ?>
<?php include('includes/navigation.php'); ?>
<?php require_once('controller/register.controller.php'); ?>
<?php if($session->is_signed_in()) : ?>
<?php redirect('/dashboard/'); ?>
<?php else: ?>
<!-- Page info section -->
	<section class="page-info-section">
		<div class="container">
			<h2>Register</h2>
			<div class="site-beradcamb">
				<a href="/">Home</a>
				<span><i class="fa fa-angle-right"></i> Register</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->
<?php include('pages/register.content.php'); ?>
<?php include('includes/footer.php'); ?>
<?php endif; ?>