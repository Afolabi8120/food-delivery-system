<?php 
    require('../core/init.php');

    if(isset($_SESSION['customer']) AND !empty($_SESSION['customer'])){
    	$user_id = $_SESSION['customer'];
    	$getCustomer = $admin->fetchSingle('tblcustomers','id',$user_id);
    }else{
    	header('location: logout');
    }

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
    
    <!-- Header -->
    <header class="header">
    	<div class="main-bar">
    		<div class="container">
    			<div class="header-content">
    				<div class="left-content">
    					
    				</div>
    				<div class="mid-content">
    				</div>
    				<div class="right-content">
    					<div class="d-flex align-items-center">
    						
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </header>
    <!-- Header End -->
    
    <!-- Page Content -->
    <div class="page-content">
    	<div class="container"> 
            <!-- MAKE PAYMENT -->
            <div class="box">
                <div class="payment-box">
                    <div class="payment-successful">
                        <i class="fa-solid fa-check mb-2 bg-success"></i>
                        <h5 class="text-white">Payment Successful!</h5> 
                        <p>You've paid: ₦ <?= number_format($_SESSION['total_p'], 00); ?></p>
                    </div>  
                </div>
                <div class="text-center mt-3">
                    <p class="text-dark mb-0">Receipt has been sent to your email address.</p>
                    <a href="javascript:void(0);" class="btn-link">View Receipt <i class="fa-solid fa-angle-right ms-2"></i></a>
                </div>
            </div>
            <!-- MAKE PAYMENT -->
        </div>
        <div class="footer fixed ">
            <div class="container">
                <p class="text-dark text-center">Your Order Number is <span class="font-w600"><?php echo $output = isset($_SESSION['invoiceno']) ? $_SESSION['invoiceno'] : "Not defined" ; ?></span></p>
                <div class="footer-btn d-flex align-items-center">
                    <a href="view-orders?id=<?= $_SESSION['invoiceno']; ?>" class="btn btn-primary ms-2">Order Delivery Status</a>
                    <a href="dashboard" class="btn btn-success ms-2">Go Back Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->

</div>
    <?php include('includes/js-links.php'); ?>
</body>

</html>