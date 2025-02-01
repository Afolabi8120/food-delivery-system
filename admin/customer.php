<?php 
  
  $pageTitle = "Customers";
  require('../core/validate/product.php');
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
            <h1>Customers List</h1>
          </div>

          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Customers List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>          
                            <th class="text-center">
                              #
                            </th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Status</th>
                            <th>Created On</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody> 
                          <?php
                            $i = 1;
                            foreach ($admin->selectAll('tblcustomers') as $fetchCustomer):
                          ?>

                          <tr>
                            <td>
                              <?= $i++; ?>
                            </td>
                            <td><span class="font-weight-bold"><?= ucwords($fetchCustomer->fullname); ?></span></td>
                            <td class="font-weight-bold"><?= $fetchCustomer->email; ?></td>
                            <td>
                              <?= $fetchCustomer->phone; ?>
                            </td>
                            <td>
                              <?php $cus->showUserStatusBadge($fetchCustomer->id); ?>
                            </td>
                            <td><?= $fetchCustomer->created_at; ?></td>
                            <td>
                              <a href="edit-customer?id=<?= $fetchCustomer->id; ?>" class="btn btn-dark btn-lg mb-2">Edit</a>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </section>
      </div>

      <?php include('../includes/footer.php'); ?>
