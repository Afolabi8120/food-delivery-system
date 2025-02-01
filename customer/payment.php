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
            <p class="title my-2 text-center h3">Payment</p>

            <div class="accordion style-2" id="accordionExample">
                <!-- Cash on Delivery -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa-solid fa-money-bill me-2"></i>
                            Cash on Delivery
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center">
                            <p><span class="spinner-border me-3 spinner-border-sm" role="status" aria-hidden="true"></span cla>Coming Soon...</p>
                        </div>
                    </div>
                </div>
                <!-- Wallet Payment -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <i class="fa-solid fa-wallet me-2"></i>
                            Wallet Pay
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body text-center pt-0">
                            <div class="form">
                                <p><span class="spinner-border me-3 spinner-border-sm" role="status" aria-hidden="true"></span cla>Coming Soon...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Payment -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa-solid fa-credit-card me-2"></i>
                            Credit/Debit Card Payment
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="">
                                <a href="" type="button" data-type="payment" onclick="payWithPaystack('4000', 'payamount', '<?= ucwords($getCustomer->email); ?>', '<?= ucwords($getCustomer->fullname); ?>')" class="btn btn-primary btn-block payamount">Pay ₦ <?= number_format($_SESSION['total_price'], 00); ?> Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->

</div>
    <?php include('includes/js-links.php'); ?>
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
        $(document).ready(function() {
          $(document).on('click', '.payamount', function(e) {
            e.preventDefault();

            var amount = <?= $_SESSION['total_price']; ?>;
            var type = $(this).data('type');
            var email = "<?= $getCustomer->email; ?>";
            var name = "<?= ucwords($getCustomer->fullname); ?>";

            function payWithPaystack(amount, type, email, name){

              var handler = PaystackPop.setup({
                key: 'pk_test_cad279c5049ebec698669f5d2d765aee8a95630b',
                email: email,
                name: name,
                amount: (amount) * 100,
                currency: 'NGN',
                ref: '<?= $order->generateTransactionID(); ?>',
                callback: function(response){
                  alert('Your transaction ref is ' + response.reference + '\nPlease you will be redirect to a page. Please wait for some minutes...');
                  window.location = `${type}_verify?reference=` + response.reference;
                },
                onClose: function(){
                    //window.location = "booking?transaction=call";
                    window.location = "payment";
                    alert('Transaction Cancelled');
                }
              });
              handler.openIframe();
            }

            payWithPaystack(amount, type, email, name);

          });
        });
    </script>
</body>

</html>