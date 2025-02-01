<?php 
  
  $pageTitle = "Create Delivery Man";
  require('../core/validate/delivery-man.php');
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
            <h1>Create Delivery Man</h1>
          </div>

          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New Delivery Man</h4>
                  </div>
                  <div class="card-body">
                    <div class="col-12 col-md-12 col-lg-12">
                      <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="form-group col-md-5">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Elon Musk">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="elon.musk@spacex.org">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Phone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="08090949669" maxlength="11">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="***********">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" placeholder="***********">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Picture</label>
                            <input type="file" class="form-control" name="user-img" placeholder="ElonX">
                          </div>
                          <div class="form-group col-md-12">
                            <label>Address</label>
                            <textarea type="text" class="form-control" name="address" rows="5" placeholder="Address..."></textarea>
                          </div>
                          <div class="col-12">
                            <input type="submit" class="btn btn-primary" name="btnAddUser" value="Create Account">
                            <a href="dashboard" class="btn btn-danger">Back</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Users</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>          
                            <th class="text-center">
                              #
                            </th>
                            <th>Image</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Created On</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody> 
                          <?php
                            $i = 1;
                            foreach ($admin->selectAll('tbldispatch') as $fetchDeliveryMan):
                          ?>                                
                          <tr>
                            <td>
                              <?= $i++; ?>
                            </td>
                            <td><img src="../assets/img/dispatch_image/<?= $fetchDeliveryMan->picture; ?>" height="100px" width="100px" class="img rounded" ></td>
                            <td><?= ucwords($fetchDeliveryMan->fullname); ?></td>
                            <td><?= $fetchDeliveryMan->email; ?></td>
                            <td><?= $fetchDeliveryMan->phone; ?></td>
                            <td>
                              <?php $dispatch->showUserBadgeStatus($fetchDeliveryMan->id); ?>
                              <?php if($fetchDeliveryMan->status == "1"): ?>
                                <a href="deactivate-dispatch?id=<?= $fetchDeliveryMan->id; ?>" class="mt-3">Deactivate</a>
                              <?php else: ?>
                                <a href="activate-dispatch?id=<?= $fetchDeliveryMan->id; ?>" class="mt-3">Activate</a>
                              <?php endif; ?>
                            </td>
                            <td>
                              <div class="badge badge-dark">
                                <?= $fetchDeliveryMan->created_at; ?> 
                              </div>
                            </td>
                            <td>
                              <a href="edit-delivery-man?id=<?= $fetchDeliveryMan->id; ?>" class="btn btn-warning mb-2">Edit</a>
                              <form method="POST">
                                <input type="hidden" class="form-control" name="user_id" value="<?= $fetchDeliveryMan->id; ?>" readonly>
                                <input type="submit" class="btn btn-danger" name="btnDeleteUser" onclick="return confirm('Remove this user account?')" value="Delete">
                              </form>
                            </td>
                          </tr>
                          <?php
                            endforeach;
                          ?>
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
