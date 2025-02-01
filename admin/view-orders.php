<?php 

  $pageTitle = "View Orders";
  require('../core/validate/order.php');
  include('../includes/head.php'); 

  if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
    $user_id = $_SESSION['admin'];
    $getAdmin = $admin->fetchSingle('tbluser','user_id',$user_id);
  }else{
    header('location: logout');
  }

  $invoiceno = $_GET['id'];
  $getOrderDetails = $admin->fetchSingle('tblpayment','invoiceno',$invoiceno);

  if(!$getOrderDetails){
    header('location: orders');
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
            <h1>Order Details for <?= $invoiceno; ?></h1> 
          </div>

          <div class="row">
            <div class="col-12 col-sm-12 col-lg-8">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td colspan="5" class="fw-bold text-center h4">Order Details</td>
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
                                    <img src="../assets/product_image/<?= $getProduct->product_image; ?>" alt="logo" height="100px" width="100px">
                                </div>
                                <div class="col-6 mr-3 h5">
                                  <?= ucwords($fetchOrderData->product_name); ?> 
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
                        <td class="text-right" colspan="4">Total:</td>
                        <td class="text-left">₦ <?= number_format($getOrderDetails->total, 00); ?></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-12 col-lg-4">
              <div class="card">
                <div class="card-header h5">Change Order Status</div>
                <div class="card-body">
                  <div class="col-12 col-md-12 col-lg-12">
                      <form method="POST">
                        <div class="row">
                          <div class="form-group col-md-12">
                            <input type="hidden" class="form-control" name="invoiceno" value="<?= $invoiceno; ?>" readonly>
                          </div>
                          
                          <div class="form-group col-md-12">
                            <label>Status</label>
                            <select name="status" class="form-control form-control-sm">
                              <option value="0" <?php if($getOrderDetails->delivery_status == '0') { echo "selected"; } ?>>Processing</option>
                              <option value="1" <?php if($getOrderDetails->delivery_status == '1') { echo "selected"; } ?>>Delivered</option>
                              <option value="2" <?php if($getOrderDetails->delivery_status == '2') { echo "selected"; } ?>>Confirmed</option>
                              <option value="3" <?php if($getOrderDetails->delivery_status == '3') { echo "selected"; } ?>>Delivery in Progress</option>
                              <option value="4" <?php if($getOrderDetails->delivery_status == '4') { echo "selected"; } ?>>Cancelled</option>
                            </select>
                          </div>
                          
                          <div class="col-12">
                            <?php if($getOrderDetails->delivery_status == '0' || $getOrderDetails->delivery_status == '2' || $getOrderDetails->delivery_status == '3'): ?>
                              <input type="submit" class="btn btn-primary" name="btnUpdateOrderStatus" value="Update">
                            <?php elseif($getOrderDetails->delivery_status == '1'): ?>
                              <button type="submit" class="btn btn-success" onclick="return confirm('This order has been delivered!')">Delivered</button>
                            <?php elseif($getOrderDetails->delivery_status == '4'): ?>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('This order has been cancelled!')">Cancelled</button>
                            <?php endif; ?>
                              <a href="orders" class="btn btn-info">Back</a>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header h5">Assign Delivery Man</div>
                <div class="card-body">
                  <div class="col-12 col-md-12 col-lg-12">
                      <form method="POST">
                        <div class="row">
                          <div class="form-group col-md-12">
                            <input type="hidden" class="form-control" name="invoiceno" value="<?= $invoiceno; ?>" readonly>
                          </div>
                          
                          <div class="form-group col-md-12">
                            <label>Delivery Man</label>
                            <select name="delivery_man" class="form-control form-control-sm">
                              <?php foreach($admin->selectAll('tbldispatch') as $getDispatch): ?>
                              <option value="<?= $getDispatch->id; ?>"><?= ucwords($getDispatch->fullname); ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group col-md-12">
                            <?php if($admin->check('tblassign_delivery','invoiceno',$invoiceno) === true): ?>
                              <span class="badge bg-success text-white">Order Assigned</span>
                            <?php endif; ?>
                          </div>
                          
                          <div class="col-12">
                            <?php if($admin->check('tblassign_delivery','invoiceno',$invoiceno) === false): ?>
                            <input type="submit" class="btn btn-primary" name="btnAssignDeliveryMan" value="Assign" onclick="return confirm('Assign this order to this delivery man?')">
                            <?php endif; ?>
                            <a href="orders" class="btn btn-info">Back</a>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>

          </div>
        </section>
      </div>

      <?php include('../includes/footer.php'); ?>
