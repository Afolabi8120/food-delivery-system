<?php
    
    require('../core/validate/customer-login.php');

?>
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

    <!-- Page Content -->
    <div class="page-content">
        
        <!-- Banner -->
        <div class="banner-wrapper shape-1">
            <div class="container inner-wrapper">
                <h2 class="dz-title">Forgot Password</h2>
                <p class="mb-0">Please enter your phone number</p>
            </div>
        </div>
        <!-- Banner -->
        <div class="account-box">
            <div class="container">
                <div class="account-area">
					<form>
					   <div class="mb-3 input-group input-mini">
							<span class="input-group-text"><i class="fa-solid fa-mobile-screen-button"></i></span>
							<input type="email" class="form-control" placeholder="Enter Your Mobile Number">
						</div>
						<div class="input-group">
							<a href="otp-confirm.html" class="btn mt-2 btn-primary w-100 btn-rounded">SEND OTP</a>
						</div>
					</form>    
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->
    
    <!-- Footer -->
    <footer class="footer fixed">
        <div class="container">
            <a href="register" class="btn btn-primary light btn-rounded text-primary d-block">CREATE ACCOUNT</a>
            </div>
    </footer>
    <!-- Footer End -->
    
</div>

    <?php include('includes/js-links.php'); ?>

</html>