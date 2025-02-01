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
                        <div class="d-flex align-items-center">
							<a href="dashboard" class="position-relative me-2 ">
                                <i class="fa fa-home fa-1x text-dark"></i>
                            </a>
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
			<div class="serach-area"> 
                
                <!-- TITLE -->
                <p class="title my-4 text-center h5">Your Orders</p>
                <!-- TITLE -->

                <?php foreach($cus->selectCustomerDistinctOrder($getCustomer->id) as $getOrders): ?>
                <div class="order-status">
                    <h5 class="title mb-2">Order No: <a href="view-orders?id=<?= $getOrders->invoiceno; ?>"><?= $getOrders->invoiceno; ?></a></h5>
                    <div class="tag-status">
                        <?= $cus->printOrderStatusBadge($getOrders->invoiceno); ?>
                        <a href="track-order?id=<?= $getOrders->invoiceno; ?>" class="btn-link text-underline">Track Item</a>
                    </div>
                </div>
                
				<div class="item-list style-2 recent-jobs-list">
                    <ul>
                        <?php 
                            foreach($admin->selectWhere('tblcart','invoiceno',$getOrders->invoiceno) as $getItems): 
                                if($getItems->user_id == $getCustomer->id):
                                    $getProduct = $admin->fetchSingle('tblproduct','product_id',$getItems->product_id);
                        ?>
                        <li>
                            <div class="item-content">
                                <div class="item-media media media-60">
                                    <img src="../assets/product_image/<?= $getProduct->product_image; ?>" alt="logo">
                                </div>
                                <div class="item-inner">
                                    <div class="item-title-row">
                                        <h6 class="item-title"><a href="order-list.html"><?= ucwords($getItems->product_name); ?></a></h6>
                                    </div>
                                    <div class="item-footer">
                                        <div class="d-flex align-items-center">
                                            <h6 class="me-3">₦ <?= $getItems->price; ?></h6>
                                        </div>    
                                        <span><?= $getItems->quantity; ?>x</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                                endif; 
                            endforeach;
                        ?>
                    </ul>
                </div>
                <div class="saprater"></div>
                <?php endforeach; ?>
				<!-- Job List -->                    
			</div>    
		</div>
	</div>
    <!-- Page Content End-->
	
</div>
    <?php include('includes/js-links.php'); ?>
</body>

</html>