<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-start" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="mx-3 h6"><small>BSTIBD Admin<sup>2</sup></small></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="./">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Interface</div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="collapseTwo" class="collapse <?= $pageName == 'allproducts.php' ||  $pageName == 'addNewProduct.php' ? 'show' : null ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item <?= $pageName == 'allproducts.php' ? 'active' : null ?>" href="./allproducts.php">All Products</a>
                <a class="collapse-item <?= $pageName == 'addNewProduct.php' ? 'active' : null ?>" href="./addNewProduct.php">Add New Product</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Orders</span>
        </a>
        <div id="collapseUtilities" class="collapse <?= $pageName == 'pendingOrders.php' ||  $pageName == 'shifedOrders.php' ||  $pageName == 'completedOrders.php' ||  $pageName == 'canceledOrders.php' ? 'show' : null ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Status:</h6>
                <a class="collapse-item <?= $pageName == 'pendingOrders.php' ? 'active' : null ?>" href="./pendingOrders.php">Pending</a>
                <a class="collapse-item <?= $pageName == 'shifedOrders.php' ? 'active' : null ?>" href="./shifedOrders.php">Shifed</a>
                <a class="collapse-item <?= $pageName == 'completedOrders.php' ? 'active' : null ?>" href="./completedOrders.php">Completed</a>
                <a class="collapse-item <?= $pageName == 'canceledOrders.php' ? 'active' : null ?>" href="./canceledOrders.php">Canceled</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->