<?php 
  
  $pageTitle = "Create Product";
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
            <h1>Create Product</h1>
          </div>

          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New Product</h4>
                  </div>
                  <div class="card-body">
                    <div class="col-12 col-md-12 col-lg-12">
                      <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="form-group col-md-4">
                            <label>Product Code</label>
                            <input type="text" class="form-control" name="product_code" value="<?= $product->generateProductCode(); ?>" readonly>
                          </div>
                          <div class="form-group col-md-5">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="product_name" placeholder="Coca Cola">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Category</label>
                            <select name="category_id" class="form-control form-control-sm">
                              <?php foreach($admin->selectAll('tblcategory') as $getCategory): ?>
                              <option value="<?= ucwords($getCategory->cat_id); ?>"><?= ucwords($getCategory->name); ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group col-md-2">
                            <label>Old Price</label>
                            <input type="text" class="form-control" name="old_price" placeholder="10.5">
                          </div>
                          <div class="form-group col-md-2">
                            <label>New Price</label>
                            <input type="text" class="form-control" name="new_price" placeholder="13.5">
                          </div>
                          <div class="form-group col-md-2">
                            <label>Quantity</label>
                            <input type="text" class="form-control" name="quantity" placeholder="20">
                          </div>
                          <div class="form-group col-md-2">
                            <label>Unit</label>
                            <select name="unit" class="form-control form-control-sm">
                              <option value="kg">Kilogram</option>
                              <option value="pack">Pack</option>
                              <option value="piece">Pieces</option>
                              <option value="size">Size</option>
                              <option value="unit">Unit</option>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label>Product Image</label>
                            <input type="file" class="form-control" name="product_image" >
                          </div>
                          <div class="form-group col-md-3">
                            <label>Reorder Level</label>
                            <input type="text" class="form-control" name="reorder_level" placeholder="10">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Status</label>
                            <select name="status" class="form-control form-control-sm">
                              <option value="1">Available</option>
                              <option value="0">Not Available</option>
                            </select>
                          </div>
                          <div class="form-group col-md-12">
                            <label>Description <span class="small">(optional)</span></label>
                            <textarea class="form-control summernote-simple" name="description"></textarea>
                          </div>
                          <div class="col-12">
                            <input type="submit" class="btn btn-primary" name="btnAddProduct" value="Create Product">
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
                    <h4>All Product</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>          
                            <th class="text-center">
                              #
                            </th>
                            <th>Image</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Old/New Price</th>
                            <th>Unit</th>
                            <th>In Stock</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created On</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody> 
                          <?php
                            $i = 1;
                            foreach ($admin->selectAll('tblproduct') as $fetchProduct):
                          ?>

                          <tr>
                            <td>
                              <?= $i++; ?>
                            </td>
                            <td>
                              <img src="../assets/product_image/<?= $fetchProduct->product_image; ?>" height="80" width="80" class="rounded-circle">    
                            </td>
                            <td><span class="badge badge-dark font-weight-bold"><?= $fetchProduct->product_code; ?></span></td>
                            <td class="font-weight-bold"><?= ucwords($fetchProduct->product_name); ?></td>
                            <td>
                              <span class="small">Old: <?= number_format($fetchProduct->old_price, 00); ?></span>  <br>
                              <span class="small">New: <?= number_format($fetchProduct->new_price, 00); ?>  </span>  
                            </td>
                            <td>
                              <span class="badge badge-secondary"><?= $fetchProduct->unit; ?></span>
                            </td>
                            <td class="font-weight-bold">
                              <?= $fetchProduct->quantity; ?>
                            </td>
                            <td class="font-weight-bold">
                              <?php 

                                $getCategory = $admin->fetchSingle('tblcategory','cat_id',$fetchProduct->category_id);

                                echo ucwords($getCategory->name);

                              ?>
                            </td>
                            <td>
                              <?php $product->showProductBadge($fetchProduct->product_id); ?>
                            </td>
                            <td><div class="badge badge-info"><?= $fetchProduct->created_date; ?></div></td>
                            <td>
                              <a href="edit-product?id=<?= $fetchProduct->product_id; ?>" class="btn btn-warning mb-2">Edit</a>
                              <form method="POST">
                                <input type="hidden" class="form-control" name="user_id" value="<?= $fetchProduct->product_id; ?>" readonly>
                                <input type="submit" class="btn btn-danger" name="btnDeleteProduct" onclick="return confirm('Remove this product?')" value="Delete">
                              </form>
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
