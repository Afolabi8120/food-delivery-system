<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="dashboard" class="h6"><?= ucwords($getStoreData->name); ?></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard"><?= substr(ucwords($getStoreData->name), 0, 1) ?></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">MENUS</li>
            <li class="dropdown active">
              <a href="dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="category" class="nav-link"><i class="fas fa-bookmark"></i><span>Create Category</span></a>
            </li>
            <li class="dropdown">
              <a href="product" class="nav-link"><i class="fas fa-boxes"></i><span>Create Product</span></a>
            </li>
            <li class="dropdown">
              <a href="stock-adjustment" class="nav-link"><i class="fas fa-box"></i><span>Product Adjustment</span></a>
            </li>
            <li class="dropdown">
              <a href="create-user" class="nav-link"><i class="fas fa-users"></i><span>Create User</span></a>
            </li>
            <li class="dropdown">
              <a href="delivery-man" class="nav-link"><i class="fas fa-truck"></i><span>Create Delivery Man</span></a>
            </li>
            <li class="dropdown">
              <a href="expense" class="nav-link"><i class="fas fa-book"></i><span>Create Expense</span></a>
            </li>
            <li class="dropdown">
              <a href="profile" class="nav-link"><i class="fas fa-user"></i><span>Profile</span></a>
            </li>
            <li class="dropdown">
              <a href="orders" class="nav-link"><i class="fas fa-receipt"></i><span>Orders</span></a>
            </li>
            <li class="dropdown">
              <a href="customer" class="nav-link"><i class="fas fa-users"></i><span>Customers</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-folder-open"></i> <span>Records & Reports</span></a>
              <ul class="dropdown-menu">
                <a href="current-stock" class="nav-link"><i class="fas fa-users"></i><span>Current Stock</span></a>
                <a href="sales-report" class="nav-link"><i class="fas fa-shipping-fast"></i><span>Sales Report</span></a>
              </ul>
            </li>
            <li class="dropdown">
              <a href="system-settings" class="nav-link"><i class="fas fa-cog"></i><span>System Setting</span></a>
            </li>
            <li class="dropdown">
              <a href="logout" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://github.com/Afolabi8120" target="_blank" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-headset"></i> Contact Us
            </a>
          </div>        
        </aside>
      </div>