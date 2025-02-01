<div class="col-lg-3 col-md-6 col-sm-12 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-dark">
      <i class="fas fa-receipt"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-white">Pending Orders</h4>
      </div>
      <div class="card-body text-white">
        <?= $admin->countByColumn('tblpayment','delivery_status','0'); ?>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-12 col-12">
  <div class="card card-statistic-1 bg-warning">
    <div class="card-icon bg-warning">
      <i class="fas fa-receipt"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-white">Confirmed Orders</h4>
      </div>
      <div class="card-body text-white">
        <?= $admin->countByColumn('tblpayment','delivery_status','2'); ?>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-12 col-12">
  <div class="card card-statistic-1 bg-info">
    <div class="card-icon bg-info">
      <i class="fas fa-receipt"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-white">In Progress</h4>
      </div>
      <div class="card-body text-white">
        <?= $admin->countByColumn('tblpayment','delivery_status','3'); ?>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-12 col-12">
  <div class="card card-statistic-1 bg-success">
    <div class="card-icon bg-success">
      <i class="fas fa-receipt"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-white">Delivered Orders</h4>
      </div>
      <div class="card-body text-white">
        <?= $admin->countByColumn('tblpayment','delivery_status','1'); ?>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-12 col-12">
  <div class="card card-statistic-1 bg-danger">
    <div class="card-icon bg-danger">
      <i class="fas fa-receipt"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-white">Cancelled Orders</h4>
      </div>
      <div class="card-body text-white">
        <?= $admin->countByColumn('tblpayment','delivery_status','4'); ?>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-12 col-12">
  <div class="card card-statistic-1 bg-primary">
    <div class="card-icon bg-primary">
      <i class="fas fa-folder"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-white">All Pending Amount</h4>
      </div>
      <div class="card-body text-white">
        <?= number_format($order->sumPaymentTotalByDeliveryStatus('0'), 0); ?>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-12 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-dark">
      <i class="fas fa-folder"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-white">All Delivered Amount</h4>
      </div>
      <div class="card-body text-white">
        <?= number_format($order->sumPaymentTotalByDeliveryStatus('1'), 0); ?>
      </div>
    </div>
  </div>
</div>
