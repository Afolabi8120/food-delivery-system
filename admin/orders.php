<?php 

$pageTitle = "Orders";
require('../core/init.php');
include('../includes/head.php'); 

if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
  $user_id = $_SESSION['admin'];
  $getAdmin = $admin->fetchSingle('tbluser','user_id',$user_id);
}else{
  header('location: logout');
}

?>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <!-- Nav Bar Starts Here -->
      <?php include('../includes/navbar.php'); ?>
      <!-- Nav Bar Ends Here -->

      <!-- Side Bar Starts Here -->
      <?php include('../includes/sidebar.php'); ?>
      <!-- Side Bar Ends Here -->

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Orders</h1> 
          </div>

          <div class="row">

            <?php include('../includes/orders-card.php'); ?>

            <div class="col-12 col-sm-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h3>All Order History</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>          
                        <th class="text-center">
                          #
                        </th>
                        <th>Invoice No</th>
                        <th>Total</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <?php
                      $i = 1;
                      foreach ($admin->selectAllAsc('tblpayment','id') as $fetchSalesSummary):
                        ?>

                        <tr>
                          <td>
                            <?= $i++; ?>
                          </td>
                          <td class="font-weight-bold"><?= $fetchSalesSummary->invoiceno; ?></td>
                          <td>
                            ₦ <?= $fetchSalesSummary->total; ?>    
                          </td>
                          <td>
                            <span class="text-primary"><?= ucwords($fetchSalesSummary->paytype); ?></span>
                          </td>
                          <td>
                            <?= $order->printOrderStatusBadge($fetchSalesSummary->invoiceno); ?>
                            <br>
                            <a href="verify-payment?reference=<?= $fetchSalesSummary->invoiceno; ?>">Verify Payment</a>
                          </td>
                          <td>
                            <?= $cus->printOrderStatusBadge($fetchSalesSummary->invoiceno); ?>
                          </td>
                          <td>
                            <?= $fetchSalesSummary->date_paid; ?>
                          </td>
                          <td>
                            <a href="view-orders?id=<?= $fetchSalesSummary->invoiceno; ?>" class="btn btn-dark btn-sm">View Order</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </section>
      </div>

      <?php include('../includes/footer.php'); ?>
