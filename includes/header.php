<?php ob_start(); ?>
<?php require_once("init.php"); ?>
<?php $setting = Setting::settings(); ?>
<?php $currency = Setting::currency_info($setting->currency) ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $setting->title; ?></title>
	<meta charset="UTF-8">
	<meta name="description" content="<?php echo $setting->description; ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="assets/css/themify-icons.css"/>
	<link rel="stylesheet" href="assets/css/animate.css"/>
	<link rel="stylesheet" href="assets/css/owl.carousel.css"/>
	<link rel="stylesheet" href="assets/css/style.css"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>    