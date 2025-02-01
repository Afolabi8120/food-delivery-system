<?php require('../core/init.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php include('includes/css-links.php'); ?>

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
					<img src="assets/images/logo.svg">
					<div class="get-started">
						<h1 class="dz-title"><?= ucwords($getStoreData->name); ?></h1>
					</div>
				</div>
				<div class="join-area">
					<div class="started">
						<h2>Continue as</h2>
					</div>
					<a href="login" class="welcome-box h-auto">
						<div class="d-flex align-items-center">
							<img src="assets/images/welcome/man.png" alt="">
							<div class="ms-2">
								<h5>CUSTOMER</h5>
								<p>Finding food here easier...</p>
							</div>
						</div>
					</a>
					<a href="dispatch/login" class="welcome-box h-auto">
						<div class="d-flex align-items-center">
							<img src="assets/images/delivery.png" alt="">
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
<script src="assets/js/jquery.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
<script src="assets/js/settings.js"></script>
<script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from foodia.dexignzone.com/xhtml/welcome.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 23:48:17 GMT -->
</html>