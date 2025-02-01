<?php 
  require('../core/init.php');

  if(isset($_SESSION['dispatch']) AND !empty($_SESSION['dispatch'])){
    $user_id = $_SESSION['dispatch'];
    $getDispatch = $admin->fetchSingle('tbldispatch','id',$user_id);
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
				<?php if($getDispatch->picture == ""): ?>
          <img src="../assets/img/dispatch_image/user_default.jpg" alt="<?= ucwords($getDispatch->fullname); ?>">
        <?php else: ?>
         	<img src="../assets/img/dispatch_image/<?= $getDispatch->picture; ?>" alt="<?= ucwords($getDispatch->fullname); ?>">
        <?php endif; ?>
			</div>
			<div class="dz-info">
				<span><?= $getdate; ?></span>
				<p class="fw-bold"><?= ucwords($getDispatch->fullname); ?> 👋</p>
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
				<h3 class="name mb-0"><?= ucwords($getDispatch->fullname); ?> 👋</h3>
			</div>	
		</div>
	</div>
    <!-- Banner End -->
    
    <!-- Page Content -->
    <div class="page-content">
        
        <div class="content-inner pt-0">
			<div class="container fb">
                
        <!-- Dashboard Area -->
        <div class="dashboard-area">
         	<div class="row">

						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<div class="card bg-dark">
								<div class="card-header fw-bold text-white">Pending Orders</div>
								<div class="card-body">
									<h2 class="text-white text-center"><?= $admin->checkTwoColumns('tblassign_delivery','dispatch_id',$getDispatch->id,'status','0'); ?></h2>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<div class="card bg-warning">
								<div class="card-header fw-bold text-white">Confirmed Orders</div>
								<div class="card-body">
									<h2 class="text-white text-center"><?= $admin->checkTwoColumns('tblassign_delivery','dispatch_id',$getDispatch->id,'status','2'); ?></h2>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<div class="card bg-success">
								<div class="card-header fw-bold text-white">Delivered Orders</div>
								<div class="card-body">
									<h2 class="text-white text-center"><?= $admin->checkTwoColumns('tblassign_delivery','dispatch_id',$getDispatch->id,'status','1'); ?></h2>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<div class="card bg-danger">
								<div class="card-header fw-bold text-white">Cancelled Orders</div>
								<div class="card-body">
									<h2 class="text-white text-center"><?= $admin->checkTwoColumns('tblassign_delivery','dispatch_id',$getDispatch->id,'status','4'); ?></h2>
								</div>
							</div>
						</div>

					</div>
					
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