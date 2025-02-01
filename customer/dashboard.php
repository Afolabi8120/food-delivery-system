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
    
    <!-- Header -->
	<header class="header transparent">
		<div class="main-bar">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000"><path d="M13 14v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1zm-9 7h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1zM3 4v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1zm12.95-1.6L11.7 6.64c-.39.39-.39 1.02 0 1.41l4.25 4.25c.39.39 1.02.39 1.41 0l4.25-4.25c.39-.39.39-1.02 0-1.41L17.37 2.4c-.39-.39-1.03-.39-1.42 0z"/></svg>
						</a>
					</div>
					<div class="mid-content">
					</div>
					<div class="right-content">
                        <a href="javascript:void(0);" class="theme-btn">
                            <svg class="dark" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g></g><g><g><g><path d="M11.57,2.3c2.38-0.59,4.68-0.27,6.63,0.64c0.35,0.16,0.41,0.64,0.1,0.86C15.7,5.6,14,8.6,14,12s1.7,6.4,4.3,8.2 c0.32,0.22,0.26,0.7-0.09,0.86C16.93,21.66,15.5,22,14,22c-6.05,0-10.85-5.38-9.87-11.6C4.74,6.48,7.72,3.24,11.57,2.3z"/></g></g></g>
							</svg>
							<svg class="light" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24"/><path d="M12,7c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5S14.76,7,12,7L12,7z M2,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0 c-0.55,0-1,0.45-1,1S1.45,13,2,13z M20,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S19.45,13,20,13z M11,2v2 c0,0.55,0.45,1,1,1s1-0.45,1-1V2c0-0.55-0.45-1-1-1S11,1.45,11,2z M11,20v2c0,0.55,0.45,1,1,1s1-0.45,1-1v-2c0-0.55-0.45-1-1-1 C11.45,19,11,19.45,11,20z M5.99,4.58c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06 c0.39,0.39,1.03,0.39,1.41,0s0.39-1.03,0-1.41L5.99,4.58z M18.36,16.95c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41 l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0c0.39-0.39,0.39-1.03,0-1.41L18.36,16.95z M19.42,5.99c0.39-0.39,0.39-1.03,0-1.41 c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L19.42,5.99z M7.05,18.36 c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L7.05,18.36z"/></svg>
                        </a>
					</div>
				</div>
			</div>
		</div>
	</header>
    <!-- Header End -->
    
    <!-- Preloader -->
	<div id="preloader">
		<div class="spinner"></div>
	</div>
    <!-- Preloader end-->
    
	<!-- Sidebar -->
    <div class="sidebar">
		<div class="author-box">
			<div class="dz-media">
				<?php if($getCustomer->picture == ""): ?>
                    <img src="assets/images/customer_image/user_default.jpg" alt="<?= ucwords($getCustomer->fullname); ?>">
                <?php else: ?>
                	<img src="assets/images/customer_image/<?= $getCustomer->picture; ?>" alt="<?= ucwords($getCustomer->fullname); ?>">
                <?php endif; ?>
			</div>
			<div class="dz-info">
				<span><?= $getdate; ?></span>
				<p class="fw-bold"><?= ucwords($getCustomer->fullname); ?> 👋</p>
			</div>
		</div>
		<ul class="nav navbar-nav">	
			<?php include('includes/sidebar.php'); ?>
		</ul>
		<div class="sidebar-bottom">
			<h6 class="name"><?= ucwords($getStoreData->name); ?></h6>
        </div>
    </div>
    <!-- Sidebar End -->
    
    <!-- Banner -->
	<div class="author-notification">
		<div class="container inner-wrapper">
			<div class="dz-info">
				<span class="text-dark"><?= $getdate; ?></span>
				<h3 class="name mb-0"><?= ucwords($getCustomer->fullname); ?> 👋</h3>
			</div>
			<a href="cart" class="position-relative me-2 notify-cart" >
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.1776 17.8443C16.6362 17.8428 15.3854 19.0912 15.3839 20.6326C15.3824 22.1739 16.6308 23.4247 18.1722 23.4262C19.7136 23.4277 20.9643 22.1794 20.9658 20.638C20.9658 20.6371 20.9658 20.6362 20.9658 20.6353C20.9644 19.0955 19.7173 17.8473 18.1776 17.8443Z" fill="#2C406E"/>
                    <path d="M23.1278 4.47973C23.061 4.4668 22.9932 4.46023 22.9251 4.46012H5.93181L5.66267 2.65958C5.49499 1.46381 4.47216 0.574129 3.26466 0.573761H1.07655C0.481978 0.573761 0 1.05574 0 1.65031C0 2.24489 0.481978 2.72686 1.07655 2.72686H3.26734C3.40423 2.72586 3.52008 2.82779 3.53648 2.96373L5.19436 14.3267C5.42166 15.7706 6.66363 16.8358 8.12528 16.8405H19.3241C20.7313 16.8423 21.9454 15.8533 22.2281 14.4747L23.9802 5.74121C24.0931 5.15746 23.7115 4.59269 23.1278 4.47973Z" fill="#2C406E"/>
                    <path d="M11.3404 20.5158C11.2749 19.0196 10.0401 17.8418 8.54244 17.847C7.0023 17.9092 5.80422 19.2082 5.86645 20.7484C5.92617 22.2262 7.1283 23.4008 8.60704 23.4262H8.67432C10.2142 23.3587 11.4079 22.0557 11.3404 20.5158Z" fill="#2C406E"/>
                </svg>
				<span class="badge badge-danger counter">
					<?= $product->getCartCount(); ?>
				</span>
			</a>	
		</div>
	</div>
    <!-- Banner End -->
    
    <!-- Page Content -->
    <div class="page-content">
        
        <div class="content-inner pt-0">
			<div class="container fb">
                <!-- Search -->
                <form>
					<div class="mb-3 input-group input-radius">
						<span class="input-group-text">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M20.5605 18.4395L16.7528 14.6318C17.5395 13.446 18 12.0262 18 10.5C18 6.3645 14.6355 3 10.5 3C6.3645 3 3 6.3645 3 10.5C3 14.6355 6.3645 18 10.5 18C12.0262 18 13.446 17.5395 14.6318 16.7528L18.4395 20.5605C19.0245 21.1462 19.9755 21.1462 20.5605 20.5605C21.1462 19.9748 21.1462 19.0252 20.5605 18.4395ZM5.25 10.5C5.25 7.605 7.605 5.25 10.5 5.25C13.395 5.25 15.75 7.605 15.75 10.5C15.75 13.395 13.395 15.75 10.5 15.75C7.605 15.75 5.25 13.395 5.25 10.5Z" fill="#B9B9B9"/>
							</svg>
						</span>
                        <input type="text" placeholder="Search beverages or foods" class="form-control main-in ps-0 bs-0">
					</div>
                </form>
                
                <!-- Dashboard Area -->
                <div class="dashboard-area">
					<!-- Categorie -->
                    <div class="swiper-btn-center-lr">
                        <div class="swiper-container mt-4 categorie-swiper">
                            <div class="swiper-wrapper">
                            	<?php include('includes/category.php'); ?>
                            </div>
                        </div>
                    </div>
					<!-- Categorie End -->
					
					<!-- Recent -->
					<div class="m-b10">
                        <div class="swiper-btn-center-lr">
                            <div class="swiper-container tag-group mt-4 recomand-swiper">
                                <div class="swiper-wrapper">
                                    <?php include('includes/ads-banner.php'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- Recent -->
                    
					<!-- Item box Start -->
                    <div class="title-bar">
                        <h5 class="title">Available Foods &#128293;</h5>
                    </div>
                    <?php foreach($product->fetchAllProduct() as $getFood): ?>
                    <div class="item-box">
                        <div class="item-media">
                            <img src="../assets/product_image/<?= $getFood->product_image; ?>" height="300px" width="400px" alt="<?= ucwords($getFood->product_name); ?>">
                        </div>
                        <div class="item-content">
                            <a href="product-details?p=<?= $getFood->product_id; ?>"><h6 class="mb-0"><?= ucwords($getFood->product_name); ?></h6></a>
                            <div class="item-footer">
                                <h6>₦ <?= $getFood->new_price; ?></h6> 
                                <a href="javascript:void(0);" class="item-bookmark">
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.7843 2.04749H16.785H16.8064C17.8714 2.05009 18.9118 2.36816 19.7963 2.96157C20.681 3.55518 21.37 4.39768 21.7762 5.38265C22.1823 6.36762 22.2875 7.45087 22.0783 8.49557C21.8692 9.54028 21.3551 10.4996 20.6011 11.2522L20.6004 11.2529L12.0015 19.8519L3.43855 11.2543L3.41711 11.2328L3.39439 11.2126C2.84628 10.7254 2.40336 10.1314 2.09273 9.46713C1.7821 8.80281 1.61031 8.0821 1.58785 7.3491C1.5654 6.61609 1.69276 5.88622 1.96215 5.20414C2.23153 4.52206 2.63727 3.90213 3.15453 3.38228C3.67179 2.86243 4.28969 2.45361 4.97042 2.18082C5.65115 1.90804 6.38038 1.77704 7.11349 1.79584C7.84659 1.81464 8.56815 1.98284 9.23401 2.29015C9.89986 2.59745 10.496 3.03741 10.9859 3.58308L11.0039 3.60309L11.0229 3.6221L11.2929 3.8921L11.9812 4.58036L12.6878 3.91095L12.9728 3.64095L12.9833 3.63096L12.9936 3.62067C13.4906 3.12161 14.0814 2.72571 14.7319 2.45573C15.3825 2.18575 16.08 2.04701 16.7843 2.04749Z" stroke="#BFC9DA" stroke-width="2"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
					<!-- Item box Start -->
                    <a href="product" class="btn btn-outline-primary btn-rounded btn-block">VIEW MORE</a>
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

	<?php include('includes/js-links.php'); ?>

</body>

</html>