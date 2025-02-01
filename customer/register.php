<?php
    
    require('../core/validate/register.php');

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
                <p class="mb-0">Restaurant App</p>
            </div>
        </div>
        <!-- Banner End -->
        
        <div class="account-box">
            <div class="container">
                <div class="account-area">
                    <h3 class="title">Create your account</h3>
                    <p>Please fill your details correctly</p>
					<form method="POST" class="input-style">
						<div class="input-group input-mini mb-3">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
							<input type="text" class="form-control" name="fullname" placeholder="Name">
						</div>
						<div class="mb-3 input-group input-mini">
							<span class="input-group-text"><i class="fa fa-at"></i></span>
							<input type="email" class="form-control" name="email" placeholder="Email">
						</div>
						<div class="mb-3 input-group input-mini">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
							<input type="password" class="form-control dz-password" name="password" placeholder="Password">
							<span class="input-group-text show-pass"> 
								<i class="fa fa-eye-slash"></i>
								<i class="fa fa-eye"></i>
							</span>
						</div>
                        <div class="mb-3 input-group input-mini">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control dz-password" name="cpassword" placeholder="Confirm Password">
                            <span class="input-group-text show-pass"> 
                                <i class="fa fa-eye-slash"></i>
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
						<div class="input-group">
							<input type="submit" name="btnRegister" class="btn mt-2 btn-primary w-100 btn-rounded" value="CREATE ACCOUNT">
						</div>
						<div class="d-flex justify-content-between align-items-center">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
								<label class="form-check-label" for="flexCheckChecked">
									By tapping “Sign Up” you accept our <a href="javascript:void(0);" class="text-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom2" aria-controls="offcanvasBottom">Terms</a> and <a href="javascript:void(0);" class="text-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom2" aria-controls="offcanvasBottom">Condition</a>
								</label>
							</div>
						</div>
					</form>  
                    <div class="text-center mb-auto p-tb20">
                        <p class="saprate text-center">Already have account?</p>
                        <a href="login" class="btn btn-transparent btn-rounded d-block">LOG IN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->
    
    <!-- Footer -->
    <!-- <footer class="footer fixed">
        <div class="container">
            <a href="login" class="btn btn-transparent btn-rounded d-block">LOG IN</a>
        </div>
    </footer> -->
    <!-- Footer End -->

	<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom2">
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
			<i class="fa-solid fa-xmark"></i>
		</button>
        <div class="offcanvas-body">
			<h4 class="title border-bottom pb-2 mb-2">Terms & Condition</h4>
			<p class="mb-0">Lorem ipsum dolor sit amet const Lorem ipsum dolor sit amet const Lorem ipsum dolor sit amet const Lorem ipsum dolor sit amet const.</p>
        </div>
    </div>
	<!-- CART -->
</div>

    <?php include('includes/js-links.php'); ?>

</body>

</html>