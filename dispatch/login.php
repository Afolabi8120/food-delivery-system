<?php
    
    require('../core/validate/dispatch-login.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include('includes/css-links.php'); ?>

</head>   
<body class="bg-white">
<div class="page-wraper">

    <!-- Preloader -->
	<div id="preloader">
		<div class="spinner"></div>
	</div>
    <!-- Preloader end-->

    <!-- Page Content -->
    <div class="page-content">
        
        <!-- Banner -->
        <div class="banner-wrapper">
            <div class="circle-1"></div>
            <div class="container inner-wrapper">
                <h1 class="dz-title"><?= ucwords($getStoreData->name); ?></h1>
                <p class="mb-0">Dispatch Rider's Only</p>
            </div>
        </div>
        <!-- Banner End -->
        <div class="account-box">
            <div class="container">
                <div class="account-area">
                    <h3 class="title">Welcome back</h3>
                    <p>Login with the details provided during registration</p>
					<form method="POST">
						<div class="input-group input-mini mb-3">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
							<input type="email" class="form-control" name="email" placeholder="Email" required>
						</div>
						<div class="mb-3 input-group input-mini">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
							<input type="password" class="form-control dz-password" name="password" placeholder="Password" required>
							<span class="input-group-text show-pass"> 
								<i class="fa fa-eye-slash"></i>
								<i class="fa fa-eye"></i>
							</span>
						</div>
						<div class="input-group">
							<input type="submit" class="btn mt-2 btn-primary w-100 btn-rounded" name="btnLogin" value="LOGIN">
						</div>
						<div class="d-flex justify-content-between align-items-center">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
								<label class="form-check-label" for="flexCheckChecked">
									Keep Sign In
								</label>
							</div>
							<a href="forgot-password" class="btn-link">Forgot password?</a>
						</div>
					</form>  
                    <div class="text-center mb-auto p-tb20">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->
    
    <!-- Footer -->
    <footer class="footer fixed">
        <div class="container">
            
        </div>
    </footer>
    <!-- Footer End -->
    
</div>

    <?php include('includes/js-links.php'); ?>

</body>

</html>