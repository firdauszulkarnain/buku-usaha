<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <ul class="navbar-nav mr-3">
        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
        <h6 class="mt-2 text-light"><?= $title; ?></h6>
    </ul>
</nav>
</div>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><i class="fas fa-book-open"></i> Buku Usaha</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
                <a class="nav-link" href="<?= base_url() ?>home">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Produk</li>
            <li>
                <a class="nav-link" href="<?= base_url(); ?>produk/kategori">
                    <i class="fas fa-list"></i>
                    <span>Kategori Produk</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="<?= base_url(); ?>produk/">
                    <i class="fas fa-box-open"></i>
                    <span>Data Produk</span>
                </a>
            </li>
            <li class="menu-header">Keuangan</li>
            <li>
                <a class="nav-link" href="#">
                    <i class="fas fa-arrow-alt-circle-left">
                    </i>
                    <span>Pembelian</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="fas fa-arrow-alt-circle-right"></i>
                    <span>Penjualan</span>
                </a>
            </li>
        </ul>
    </aside>
</div>