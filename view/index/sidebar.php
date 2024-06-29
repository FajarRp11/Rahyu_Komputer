<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=home">
        <div class="sidebar-brand-text">Rahyu Komputer</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=home">
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider mb-0">
    <li class="nav-item">
        <div class="d-flex flex-column">
            <a class="nav-link" href="index.php?page=barang">
                <i class="fa fa-laptop"></i>
                <span>Data Barang</span>
            </a>
            <hr class="sidebar-divider my-0">
            <a class="nav-link" href="index.php?page=customer">
                <i class="fa fa-users"></i>
                <span>Data Customer</span>
            </a>
            <hr class="sidebar-divider my-0">
            <a class="nav-link" href="index.php?page=kasir">
                <i class="fas fa-user"></i>
                <span>Data Kasir</span>
            </a>
    </li>
    <hr class="sidebar-divider mb-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Invoice</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Invoice</h6>
                <a class="collapse-item" href="index.php?page=invoice-utama">Data Invoice</a>
                <a class="collapse-item" href="index.php?page=buat-invoice">Buat Invoice</a>
            </div>
        </div>
    </li>
</ul>