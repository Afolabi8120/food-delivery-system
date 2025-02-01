<?php 
  require('../core/init.php');

  if(isset($_SESSION['customer']) AND !empty($_SESSION['customer'])){
    $user_id = $_SESSION['customer'];
    $getCustomer = $admin->fetchSingle('tblcustomers','id',$user_id);
  }else{
      header('location: logout');
  }

  $invoiceno = $_GET['id'];
  $getOrderDetails = $admin->fetchSingle('tblpayment','invoiceno',$invoiceno);
  $getDispatchID = $admin->fetchSingle('tblassign_delivery','invoiceno',$invoiceno);
  $getDispatchDetails = $admin->fetchSingle('tbldispatch','id',$getDispatchID->dispatch_id);

  $customer_address = $getOrderDetails->address;
  $customer_address = str_replace(" ", "+", $customer_address);

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
                        <a href="javascript:void(0);" class="back-btn">
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
		<div class="map">
			<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63301.32632690799!2d3.852165825853429!3d7.428364200950153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1039f3b3a11feb5d%3A0x2bf88a5b22b3d3c!2sTHE%20POLYTECHNIC%20IBADAN!5e0!3m2!1sen!2sng!4v1712710835729!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $customer_address; ?>&output=embed"></iframe>
		</div>
		<div class="container">
            <div class="detail-box">
                <div class="handler"></div>
                <div class="d-flex align-items-center">
                    <div class="media media-60">
                        <img src="../assets/img/dispatch_image/<?= $getDispatchDetails->picture; ?>" alt="">    
                    </div>
                    <div class="ms-3">
                        <h5><a class="text-white fw-bold" href="javascript:;"><?= ucwords($getDispatchDetails->fullname); ?></a>
                        </h5>
                    </div>
                </div>
                <div class="social">
                    <a href="tel:<?= $getDispatchDetails->phone; ?>">
                        <i class="fa fa-phone"></i>
                    </a>
                    <a href="javascript:void(0);">
                        <i class="fa fa-message"></i>
                    </a>
                </div>
            </div>
		</div>
	</div>
    <!-- Page Content End-->
	
</div>
    <?php include('includes/js-links.php'); ?>
</body>
    
</html>