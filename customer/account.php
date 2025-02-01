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
    <div class="page-content bottom-content ">
        <div class="container profile-area">
            <div class="profile">
                <div class="media media-100">
                    <?php if($getCustomer->picture == ""): ?>
                        <img src="assets/images/customer_image/user_default.jpg" alt="<?= ucwords($getCustomer->fullname); ?>">
                    <?php else: ?>
                        <img src="assets/images/customer_image/<?= $getCustomer->picture; ?>" alt="<?= ucwords($getCustomer->fullname); ?>">
                    <?php endif; ?>
                    <svg class="progress-style" height="100" width="100">
                        <circle id="round-1" cx="60" cy="60" r="50" stroke="#E8EFF3" stroke-width="7" fill="none" />
                        <circle id="round-2" cx="60" cy="60" r="50" stroke="#2196f3" stroke-width="7" fill="none" />
                    </svg>
                </div>
                <div class="mb-2">
                    <h4><?= ucwords($getCustomer->fullname); ?></h4>
                    <?php $cus->showUserStatusBadge($getCustomer->id); ?>
                </div>
            </div>    
            <div class="contact-section">
                <div class="d-flex justify-content-between align-item-center mb-2">
                    <h5 class="title">Account</h5>
                </div>
                <div class="mb-0 rounded">
                    <a class="text-dark" href="profile">
                        <div class="card border border-dark py-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <div><i class="fa fa-user"></i></div>
                                    <div class="flex-grow-1 fw-light">Edit Profile</div>
                                    <div><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mb-0 rounded">
                    <a class="text-dark" href="change-picture">
                        <div class="card border border-dark py-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <div><i class="fa fa-image"></i></div>
                                    <div class="flex-grow-1 fw-light">Change Picture</div>
                                    <div><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mb-0 rounded">
                    <a class="text-dark" href="change-password">
                        <div class="card border border-dark py-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <div><i class="fa fa-lock"></i></div>
                                    <div class="flex-grow-1 fw-light">Change Password</div>
                                    <div><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mb-0 rounded">
                    <a class="text-dark" href="wishlist">
                        <div class="card border border-dark py-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <div><i class="fa fa-heart"></i></div>
                                    <div class="flex-grow-1 fw-light">Wishlist</div>
                                    <div><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mb-0 rounded">
                    <a class="text-dark" href="fund-wallet">
                        <div class="card border border-dark py-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <div>₦</div>
                                    <div class="flex-grow-1 fw-light">Fund Wallet</div>
                                    <div><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mb-0 rounded">
                    <a class="text-dark" href="logout">
                        <div class="card border border-dark py-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <div><i class="fa fa-sign-out-alt"></i></div>
                                    <div class="flex-grow-1 fw-light">Logout</div>
                                    <div><i class="fa fa-chevron-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->

    <!-- Menubar -->
    <div class="menubar-area">
        <?php include('includes/bottom-menu.php'); ?>
    </div>
    <!-- Menubar -->

</div>

</body>
    <?php include('includes/js-links.php'); ?>
</html>
