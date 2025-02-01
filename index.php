<?php require('core/init.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
	<meta name="theme-color" content="#2196f3">
    
    <!-- Favicons Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="customer/assets/images/favicon.png" />
    
    <!-- Title -->
	<title><?= ucwords($getStoreData->name); ?></title>
    
    <!-- Stylesheets -->
    <link href="customer/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="customer/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="customer/assets/vendor/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="customer/assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="customer/assets/css/style.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&amp;family=Roboto+Slab:wght@100;300;500;600;800&amp;display=swap" rel="stylesheet">
    <link href="customer/assets/css/notifications/css/lobibox.min.css" rel="stylesheet" />


</head>   
<body>
<div class="page-wraper">
    
    <!-- Preloader -->
	<div id="preloader">
		<div class="spinner"></div>
	</div>
    <!-- Preloader end-->

    <!-- Welcome Start -->
	<div class="content-body">
		<div class="container vh-100">
			<div class="welcome-area">
				<div class="welcome-logo">
					<img src="customer/assets/images/logo.svg">
					<div class="get-started">
						<h1 class="dz-title"><?= ucwords($getStoreData->name); ?></h1>
					</div>
				</div>
				<div class="join-area">
					<div class="started">
						<h2>Continue as</h2>
					</div>
					<a href="customer/login" class="welcome-box h-auto">
						<div class="d-flex align-items-center">
							<img src="customer/assets/images/welcome/man.png" alt="">
							<div class="ms-2">
								<h5>CUSTOMER</h5>
								<p>Finding food here easier...</p>
							</div>
						</div>
					</a>
					<a href="dispatch/login" class="welcome-box h-auto">
						<div class="d-flex align-items-center">
							<img src="customer/assets/images/delivery.png" alt="">
							<div class="ms-2">
								<h5>DISPATCH</h5>
								<p>Great food for faster delivery.</p>
							</div>
						</div>    
					</a>
				</div>
			</div>
		</div>
	</div>
    <!-- Welcome End -->
    
</div>
<!--**********************************
    Scripts
***********************************-->
<script src="customer/assets/js/jquery.js"></script>
<script src="customer/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="customer/assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="customer/assets/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
<script src="customer/assets/js/settings.js"></script>
<script src="customer/assets/js/custom.js"></script>
</body>

<!-- Mirrored from foodia.dexignzone.com/xhtml/welcome.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 23:48:17 GMT -->
</html>