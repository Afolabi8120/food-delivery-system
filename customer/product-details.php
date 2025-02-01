<?php 
  require('../core/validate/cart.php');

  if(isset($_SESSION['customer']) AND !empty($_SESSION['customer'])){
    $user_id = $_SESSION['customer'];
    $getCustomer = $admin->fetchSingle('tblcustomers','id',$user_id);
  }else{
      header('location: logout');
  }

  if(isset($_GET['p']) AND !empty($_GET['p'])){
    $product_id = $admin->validateInput($_GET['p']);
    if(!$admin->fetchSingle('tblproduct','product_id',$product_id)){
        echo "<script>history.back()</script>";
    }else{
        $getProductDetails = $admin->fetchSingle('tblproduct','product_id',$product_id);
    }
    
  }else{
    echo "<script>history.back()</script>";
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="theme-color" content="#2196f3">
    
    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
    
    <!-- Title -->
    <title><?= ucwords($getStoreData->name); ?></title>
    
    
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&amp;family=Roboto+Slab:wght@100;300;500;600;800&amp;display=swap" rel="stylesheet">
    <link href="assets/css/notifications/css/lobibox.min.css" rel="stylesheet" />

</head>   
<body class="bg-white">
<div class="page-wraper"> 
    
    <!-- Preloader -->
	<div id="preloader">
		<div class="spinner"></div>
	</div>
    <!-- Preloader end-->
    
	<!-- Header -->
    <header class="header transparent">
        <div class="main-bar">
            <div class="container">
                <div class="header-content">
                    <div class="left-content">
                        <a href="javascript:void(0);" class="back-btn">
                            <svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z" fill="#fff"/>
							</svg>
                        </a>
						<h5 class="mb-0 ms-2 text-nowrap"><?= ucwords($getProductDetails->product_name); ?></h5>
                    </div>
                    <div class="mid-content">
                    </div>
                    <div class="right-content d-flex align-items-center">
                        <a href="javascript:void(0);" class="item-bookmark icon-2 mb-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.785 2.04751C15.9489 2.04694 15.1209 2.21163 14.3486 2.53212C13.5764 2.85261 12.8751 3.32258 12.285 3.91501L12 4.18501L11.73 3.91501C11.1492 3.2681 10.4424 2.74652 9.65306 2.3822C8.86367 2.01787 8.00824 1.81847 7.13912 1.79618C6.27 1.7739 5.40547 1.9292 4.59845 2.25259C3.79143 2.57599 3.05889 3.06066 2.44566 3.67695C1.83243 4.29325 1.35142 5.02819 1.03206 5.83682C0.712696 6.64544 0.561704 7.51073 0.588323 8.37973C0.614942 9.24873 0.818613 10.1032 1.18687 10.8907C1.55513 11.6783 2.08022 12.3824 2.73002 12.96L12 22.2675L21.3075 12.96C22.2015 12.0677 22.8109 10.9304 23.0589 9.6919C23.3068 8.45338 23.1822 7.16915 22.7006 6.00144C22.2191 4.83373 21.4023 3.83492 20.3534 3.13118C19.3045 2.42744 18.0706 2.05034 16.8075 2.04751H16.785Z" fill="white"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
	
    
    <!-- Page Content -->
    <div class="page-content">
        <div class="content-body fb">
            <div class="swiper-btn-center-lr my-0">
                <div class="swiper-container demo-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="dz-banner-heading">
                                <div class="overlay-black-light">
                                    <img src="../assets/product_image/<?= $getProductDetails->product_image; ?>" class="bnr-img" alt="bg-image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-btn">
                        <div class="swiper-pagination style-2 flex-1"></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="company-detail">
                    <div class="detail-content">
                        <div class="flex-1">
                            <h4><?= ucwords($getProductDetails->product_name); ?></h4>
                            <p class="small">
                                <?= html_entity_decode($getProductDetails->description); ?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <ul class="item-inner">
                        <li>
                            <div class="reviews-info">
                                <i class="fa fa-star"></i>
                                <h6 class="reviews">4.5</h6>
                            </div>
                        </li>
                        <li>
                            <h6 class="mb-0 ms-2"><?php $product->showProductBadge($product_id) ?></h6>
                        </li>
                        <li>
                            <a class="d-flex delivery" href="javascript:void(0);">
                                <i class="fa-solid fa-truck"></i>
                                <h6 class="mb-0 ms-2">FREE DELIVERY</h6>
                            </a>
                        </li>
                    </ul>
                </div>
                <form method="POST">
                <div class="item-list-2">
                    <div class="price">
                        <span class="text-style">Price</span>
                        <h3>₦ <?= $getProductDetails->new_price; ?> <span class="small">per <?= $getProductDetails->unit; ?></span> <del>₦ <?= $getProductDetails->old_price; ?></del></h3>
                    </div>
                    <div class="dz-stepper border-1 col-5">
                        <input class="stepper" type="text" value="1" minlength="1" name="demo3">
                        <input type="hidden" value="<?= $getProductDetails->product_id; ?>" minlength="1" name="product_id" readonly>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary text-start w-100 btn-rounded" value="ADD TO CART" name="btnAddToCart">
            </form>
            </div>
		</div>    
    </div>    
    <!-- Page Content End -->
	
</div>    
    <script src="assets/js/jquery.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dz.carousel.js"></script><!-- Swiper -->
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
    <script src="assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <script src="assets/css/notifications/js/lobibox.min.js"></script>
    <script src="assets/css/notifications/js/notification-custom-script.js"></script>
    <script src="assets/css/notifications/js/notifications.min.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        $(".stepper").TouchSpin();
    </script>

    <?php
   if(isset($_SESSION['SuccessMessage']) AND !empty($_SESSION['SuccessMessage'])){
   ?>
   <script>
      Lobibox.notify('success', {
         pauseDelayOnHover: true,
         size: 'mini',
         rounded: true,
         icon: 'fa fa-check-circle',
         delayIndicator: false,
         continueDelayOnInactiveTab: false,
         position: 'top center',
         msg: '<?= $_SESSION['SuccessMessage']; ?>'
      })
   </script>
   <?php
      unset($_SESSION['SuccessMessage']);
   }else if(isset($_SESSION['ErrorMessage']) AND !empty($_SESSION['ErrorMessage'])){
   ?>
   <script>
      Lobibox.notify('error', {
         pauseDelayOnHover: true,
         size: 'mini',
         rounded: true,
         icon: 'fa fa-info-circle',
         delayIndicator: false,
         continueDelayOnInactiveTab: false,
         position: 'top center',
         msg: '<?= $_SESSION['ErrorMessage']; ?>'
      })
   </script>
   <?php
      unset($_SESSION['ErrorMessage']);
   }

?>
</body>

</html>