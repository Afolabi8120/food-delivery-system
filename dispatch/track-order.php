<?php 
  require('../core/init.php');

  if(isset($_SESSION['dispatch']) AND !empty($_SESSION['dispatch'])){
    $user_id = $_SESSION['dispatch'];
    $getDispatch = $admin->fetchSingle('tbldispatch','id',$user_id);
  }else{
      header('location: logout');
  }

  $invoiceno = $_GET['id'];
  $getOrderDetails = $admin->fetchSingle('tblpayment','invoiceno',$invoiceno);

  if(!$getOrderDetails){
  	header('location: orders');
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
    <!-- <div id="preloader">
        <div class="spinner"></div>
    </div> -->
    <!-- Preloader end-->
    
	<!-- Header -->
    <header class="header">
        <div class="main-bar">
            <div class="container">
                <div class="header-content">
                    <div class="left-content">
                        <a href="javascript:void(0);" onclick="history.back()" class="back-btn">
                            <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z" fill="#a19fa8"/>
							</svg>
                        </a>
                    </div>
                    <div class="mid-content">
                    </div>
                    <div class="right-content">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
	
    
    <!-- Page Content -->
	<div class="page-content">
		<div class="container bottom-content">
            <div class="location-area">
				<div class="d-flex align-items-center">
					<a href="javascript:void(0);" class="location-mark">
						<i class="fa fa-receipt"></i>
					</a>
					<div class="ms-3">
						<h6 class="title h4"><?= $invoiceno; ?></h6>
					</div>
				</div>
			</div>
			<div class="order-status">
				<h6 class="title">Order Status</h6>
				<ul class="dz-timeline style-2">
					<?php 
						foreach($admin->selectWhere('tbltrack','invoiceno',$invoiceno) as $getStatus) {
							$cus->printTrackOrder($getStatus->invoiceno,$getStatus->delivery_status);
						}
					?>
				</ul>		
			</div>
			<div class="footer fixed ">
				<div class="container">
					<div class="footer-btn d-flex align-items-center">
						<a href="track?id=<?= $invoiceno ?>" class="btn btn-primary btn-block">CONTACT CUSTOMER</a>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Page Content End-->
	
</div>
	<?php include('includes/js-links.php'); ?>
</body>
</html>
