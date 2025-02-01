<?php 
  require('../core/init.php');

  if(isset($_SESSION['customer']) AND !empty($_SESSION['customer'])){
    $user_id = $_SESSION['customer'];
    $getCustomer = $admin->fetchSingle('tblcustomers','id',$user_id);
  }else{
      header('location: logout');
  }

  $invoiceno = $admin->validateInput($_GET['id']);
  $getOrderDetails = $admin->fetchSingle('tblpayment','invoiceno',$invoiceno)
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php include('includes/css-links.php'); ?>
    <style type="text/css">
        * {
            margin: 0;
        }
        @media print {
            .btn-print {
                display:none !important;
            }
        }
    </style>

</head>   
<body class="bg-white">
<div class="page-wraper">
    
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader end-->
    
	<!-- Header -->
    <header class="header btn-print">
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

                <?php if(!$getOrderDetails): ?> 
                <li>
                    <center><i style="font-size: 50px;text-align: center!important;" class="fa fa-exclamation-triangle text-dark mt-5"></i></center>
                    <p class="text-dark text-center mt-3">Oh shit, no order found for <?= $_GET['id']; ?> </p>
                </li>
                <?php endif; ?>
                
                <?php if($getOrderDetails): ?>
                <div class="table-responsive">
                  <table class="table table-bordered caption-top">
                    <tbody>
                      <tr>
                        <td colspan="5" class="fw-bold text-center">Order Details</td>
                      </tr>
                      <tr>
                        <td>Order No: </td>
                        <td class="fw-bold"><?= $invoiceno; ?></td>
                        <td>Full Name: </td>
                        <td class="fw-bold" colspan="2"><?= ucwords($getOrderDetails->name); ?></td>
                      </tr>
                      <tr>
                        <td>Order Date: </td>
                        <td class="fw-bold"><?= $getOrderDetails->date_paid; ?></td>
                        <td>Email: </td>
                        <td colspan="3" class="fw-bold"><?= $getOrderDetails->email; ?></td>
                      </tr>
                      <tr>
                        <td>Payment Type: </td>
                        <td class="fw-bold"><?= ucwords($getOrderDetails->paytype); ?></td>
                        <td>Phone No: </td>
                        <td colspan="2" class="fw-bold"><?= $getOrderDetails->phone; ?>
                      </tr>
                      <tr>
                        <td>Amount (NGN): </td>
                        <td class="fw-bold"><?= number_format($getOrderDetails->total, 00); ?></td>
                        <td>Delivery Status: </td>
                        <td colspan="2" class="fw-bold">
                          <?= $cus->printOrderStatusBadge($getOrderDetails->invoiceno); ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Address: </td>
                        <td colspan="4" class="fw-bold ">
                          <address class="small"><?= $getOrderDetails->address; ?></address>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="5" class="fw-bold text-center">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="5" class="fw-bold text-center">List of Items Purchased</td>
                      </tr>
                      <tr class="fw-bold">
                        <td>S/N</td>
                        <td colspan="2" class="text-center">Name</td>
                        <td>Qty</td>
                        <td>Price</td>
                      </tr>
                      <?php 
                        $i = 1;

                        foreach($admin->selectWhere('tblcart','invoiceno',$invoiceno) as $fetchOrderData):

                            $getProduct = $admin->fetchSingle('tblproduct','product_id',$fetchOrderData->product_id);
                      ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td colspan="2">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="item-media media media-60">
                                    <img src="../assets/product_image/<?= $getProduct->product_image; ?>" alt="logo">
                                </div>
                                <div class="col-6 mr-3">
                                    <a href="javascript:;" class="fw-bold">
                                        <?= ucwords($fetchOrderData->product_name); ?>  
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td><?= $fetchOrderData->quantity; ?></td>
                        <td><?= number_format($fetchOrderData->price, 00); ?></td>
                      </tr>
                      <?php 
                        endforeach;
                      ?>
                    </tbody>
                    <tfoot class="table-light">
                      <tr>
                        <td class="text-end" colspan="4">Total:</td>
                        <td class="text-left">₦ <?= number_format($getOrderDetails->total, 00); ?></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>

                <button type="submit" name="" class="btn btn-dark btn-print" onclick="window.print();">Print</button>
                <?php endif; ?>
			</div>    
		</div>
	</div>
    <!-- Page Content End-->
	
</div>
    <?php include('includes/js-links.php'); ?>
</body>

</html>