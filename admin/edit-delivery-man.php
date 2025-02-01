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

  if(isset($_GET['id']) AND !empty($_GET['id'])){

    $_GET['id'] = stripcslashes($_GET['id']);
    $user_id = $_GET['id'];

    // check if delivery man id exist
    if($admin->select('tbldispatch','id',$user_id) === false){
      header('location: delivery-man');
    }
    else if($admin->select('tbldispatch','id',$user_id) === true){
      $getDeliveryManData = $admin->fetchSingle('tbldispatch','id',$user_id);
    }
  }elseif(!isset($_GET['id']) AND empty($_GET['id'])){
    header('location: delivery-man');
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
            <h1>Edit Delivery Man</h1>
          </div>

          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Delivery Man</h4>
                  </div>
                  <div class="card-body">
                    <div class="col-12 col-md-12 col-lg-12">
                      <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="form-group col-md-5">
                            <label>Full Name</label>
                            <input type="hidden" class="form-control" name="user_id" value="<?= $getDeliveryManData->id; ?>" readonly>
                            <input type="text" class="form-control" name="fullname"  value="<?= ucwords($getDeliveryManData->fullname); ?>" placeholder="Elon Musk">
                          </div>
                          <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $getDeliveryManData->email; ?>" placeholder="elon.musk@spacex.org">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Phone</label>
                            <input type="tel" class="form-control" name="phone" value="<?= $getDeliveryManData->phone; ?>" placeholder="08090949669" maxlength="11">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Picture</label>
                            <input type="file" class="form-control" name="user-img" placeholder="ElonX">
                          </div>
                          <div class="form-group col-md-12">
                            <label>Address</label>
                            <textarea type="text" class="form-control" name="address" rows="5" placeholder="Address..."><?= $getDeliveryManData->address; ?></textarea>
                          </div>
                          <div class="col-12">
                            <input type="submit" class="btn btn-primary" name="btnEditUser" value="Edit Account">
                            <a href="delivery-man" class="btn btn-danger">Back</a>
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
