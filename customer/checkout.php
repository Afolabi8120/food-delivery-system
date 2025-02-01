<?php 
require('../core/validate/checkout.php');

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
            <p class="title my-2 text-center h3">Checkout</p>
        
    		<div class="offcanvas-body container fixed">
    			<div class="item-list style-2">
    				<ul>
    					<?php
    					if(isset($_SESSION["cart_item"]) AND !empty($_SESSION["cart_item"])):
    						$item_total = 0;
    					foreach ($_SESSION["cart_item"] as $item){
    						$i = 1;
    						$getProduct = $admin->fetchSingle('tblproduct','product_id',$item['product_id']);
    						$showCategory = $admin->fetchSingle('tblcategory','cat_id',$getProduct->category_id);
    						?>
    						<li>
    							<div class="item-content">
    								<div class="item-media media media-60">
    									<img src="../assets/product_image/<?= $getProduct->product_image; ?>" alt="logo">
    								</div>
    								<div class="item-inner">
    									<div class="item-title-row">
    										<h6 class="item-title"><a href="javascript:;"><?= ucwords($item['product_name']); ?></a></h6>
    										<div class="item-subtitle"><?= ucwords($showCategory->name); ?></div>

    									</div>
    									<div class="item-footer">
    										<div class="d-flex align-items-center">
    											<h6 class="me-3"><?= $item["price"]. ' x '. $item["quantity"] ?></h6>
    										</div>    
    										<div class="d-flex align-items-center">
    											<?php
    											$item_total += ($item["price"]*$item["quantity"]);
    											$_SESSION['total_price'] = $item_total;

    											echo "₦ " . number_format($item["price"]*$item["quantity"], 00);
    											?>
    										</div>
    										<i class="fas fa-trash" title="Remove <?= ucwords($item['product_name']); ?>" onclick="removeFromCart('<?= $item["product_id"]; ?>')" style="float: right;color: red;font-size: 22px;"></i>
    									</div>
    								</div>
    							</div>
    						</li>
    						<?php 
    					}
    				else:
    					unset($_SESSION["cart_item"]);
    					?>
    					<li>
    						<center><i style="font-size: 50px;text-align: center!important;" class="fa fa-cart-shopping text-dark"></i></center>
    						<p class="text-dark text-center">No items in your cart </p>
    						<p class="mb-0 fw-bold text-center">Your cart will appear here when you add an item.</p>
    					</li>
    				<?php endif; ?>
    			</ul>
    		</div>
    		<div class="view-title">
    			<div class="container">
    				<ul>
    					<li>
    						<span>Subtotal</span>
    						<span>₦ <?= number_format($_SESSION['total_price'], 00); ?></span>
    					</li>
    					<hr>
    					<li>
    						<h5>Total</h5>
    						<h5>₦ <?= number_format($_SESSION['total_price'], 00); ?></h5>
    					</li>
    				</ul>
    			</div>
    		</div>
    	</div> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title text-center">Delivery Address</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" autocomplete="off">
                            <div class="mb-3 input-group input-radius">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="mb-3 input-group input-radius">
                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="mb-3 input-group input-radius">
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <input type="tel" class="form-control" name="phone" maxlength="11" placeholder="Phone" required>
                            </div>
                            <div class="input-group mb-3 input-radius">
                                <textarea class="form-control" placeholder="Address" name="address" rows="4" required></textarea>
                            </div>
                            <?php if(isset($_SESSION["cart_item"]) AND !empty($_SESSION["cart_item"])): ?>
                                <input type="submit" class="btn btn-primary btn-rounded btn-block flex-1 ms-2" name="btnCheckout" value="PROCEED TO PAYMENT">
                            <?php endif; ?>
                        </form>
                    </div>
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