<aside id="sidebar" class="sidebar">
    <?php
    $user = $this->session->userdata('user');
    ?>
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Dashboard -->

        <?php if ($user['role'] == 1 || $user['role'] == 2) :  
            ?>
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                    <i class="bi bi-grid"></i> <span>Dashboard</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ($user['role'] == 1) : // Admin 
        ?>
            <!-- Master Data -->
            <li class="nav-heading">Master Data</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"> <i class="fa-solid fa-gears"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="components-nav" class="nav-content collapse <?= $this->uri->segment(1) == 'barang' || $this->uri->segment(1) == 'kategori' || $this->uri->segment(1) == 'suplier' ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li> <a href="<?= base_url('barang') ?>" class="<?= $this->uri->segment(1) == 'barang' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Data Barang</span> </a></li>
                    <li> <a href="<?= base_url('kategori') ?>" class="<?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Data Kategori</span> </a></li>
                    <li> <a href="<?= base_url('suplier') ?>" class="<?= $this->uri->segment(1) == 'suplier' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Data Suplier</span> </a></li>
                </ul>
            </li>

            <!-- Manajemen Barang -->
            <li class="nav-heading">MANAJEMEN</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#manajemen" data-bs-toggle="collapse" href="#"><i class="fa-solid fa-book-open-reader"></i><span>Manajemen Barang</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="manajemen" class="nav-content collapse <?= $this->uri->segment(1) == 'stok' || $this->uri->segment(1) == 'barang_masuk' || $this->uri->segment(1) == 'barang_keluar' || $this->uri->segment(1) == 'pengantaran' || $this->uri->segment(1) == 'return_barang' ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li> <a href="<?= base_url('barang_masuk') ?>" class="<?= $this->uri->segment(1) == 'barang_masuk' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Barang Masuk</span> </a></li>
                    <li> <a href="<?= base_url('barang_keluar') ?>" class="<?= $this->uri->segment(1) == 'barang_keluar' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Barang Keluar</span> </a></li>
                    <li> <a href="<?= base_url('pengantaran') ?>" class="<?= $this->uri->segment(1) == 'pengantaran' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Pengantaran Barang</span> </a></li>
                    <li> <a href="<?= base_url('return_barang') ?>" class="<?= $this->uri->segment(1) == 'return_barang' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Return Barang</span> </a></li>
                </ul>
            </li>

            <!-- Transaksi -->
            <li class="nav-heading">TRANSAKSI</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#transaksi" data-bs-toggle="collapse" href="#"><i class="fa-solid fa-money-check-dollar"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="transaksi" class="nav-content collapse <?= $this->uri->segment(1) == 'penjualan' || $this->uri->segment(1) == 'hutang' || $this->uri->segment(1) == 'piutang' || $this->uri->segment(1) == 'angsuran' ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li> <a href="<?= base_url('penjualan') ?>" class="<?= $this->uri->segment(1) == 'penjualan' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Penjualan</span> </a></li>
                    <li> <a href="<?= base_url('hutang') ?>" class="<?= $this->uri->segment(1) == 'hutang' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Hutang</span> </a></li>
                    <li> <a href="<?= base_url('piutang') ?>" class="<?= $this->uri->segment(1) == 'piutang' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Piutang</span> </a></li>
                    <li> <a href="<?= base_url('angsuran') ?>" class="<?= $this->uri->segment(1) == 'angsuran' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Angsuran</span> </a></li>
                </ul>
            </li>

            <!-- Report -->
            <li class="nav-heading">REPORT</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#laporan" data-bs-toggle="collapse" href="#"><i class="fa-solid fa-book"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="laporan" class="nav-content collapse <?= $this->uri->segment(1) == 'laporan' ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li> <a href="<?= base_url('laporan/Printbarang') ?>" target="_blank"> <i class="bi bi-circle"></i><span>Barang</span> </a></li>
                    <li> <a href="<?= base_url('laporan/barang_keluar') ?>" class="<?= $this->uri->segment(2) == 'barang_keluar' ? 'active' : '' ?>"> <i class=" bi bi-circle"></i><span>Barang Keluar</span> </a></li>
                    <li> <a href="<?= base_url('laporan/penjualan') ?>" class="<?= $this->uri->segment(2) == 'penjualan' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Penjualan</span> </a></li>
                    <li> <a href="<?= base_url('laporan/pembelian') ?>" class="<?= $this->uri->segment(2) == 'pembelian' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Pembelian</span> </a></li>
                    <li> <a href="<?= base_url('laporan/keuangan') ?>" class="<?= $this->uri->segment(2) == 'keuangan' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Keuangan</span> </a></li>
                    <li> <a href="<?= base_url('laporan/transaksi') ?>" class="<?= $this->uri->segment(2) == 'transaksi' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Transaksi</span> </a></li>
                    <li> <a href="<?= base_url('laporan/return') ?>" class="<?= $this->uri->segment(2) == 'return' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Return Barang</span> </a></li>
                    <li> <a href="<?= base_url('laporan/hutang') ?>" class="<?= $this->uri->segment(2) == 'hutang' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Hutang</span> </a></li>
                    <li> <a href="<?= base_url('laporan/piutang') ?>" class="<?= $this->uri->segment(2) == 'piutang' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Piutang</span> </a></li>
                </ul>
            </li>
        <?php elseif ($user['role'] == 2) : // Pemilik 
        ?>
            <!-- Report -->
            <li class="nav-heading">REPORT</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#laporan" data-bs-toggle="collapse" href="#"><i class="fa-solid fa-book"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="laporan" class="nav-content collapse <?= $this->uri->segment(1) == 'laporan' ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li> <a href="<?= base_url('laporan/Printbarang') ?>" target="_blank"> <i class="bi bi-circle"></i><span>Barang</span> </a></li>
                    <li> <a href="<?= base_url('laporan/barang_keluar') ?>" class="<?= $this->uri->segment(2) == 'barang_keluar' ? 'active' : '' ?>"> <i class=" bi bi-circle"></i><span>Barang Keluar</span> </a></li>
                    <li> <a href="<?= base_url('laporan/penjualan') ?>" class="<?= $this->uri->segment(2) == 'penjualan' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Penjualan</span> </a></li>
                    <li> <a href="<?= base_url('laporan/pembelian') ?>" class="<?= $this->uri->segment(2) == 'pembelian' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Pembelian</span> </a></li>
                    <li> <a href="<?= base_url('laporan/keuangan') ?>" class="<?= $this->uri->segment(2) == 'keuangan' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Keuangan</span> </a></li>
                    <li> <a href="<?= base_url('laporan/transaksi') ?>" class="<?= $this->uri->segment(2) == 'transaksi' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Transaksi</span> </a></li>
                    <li> <a href="<?= base_url('laporan/return') ?>" class="<?= $this->uri->segment(2) == 'return' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Return Barang</span> </a></li>
                    <li> <a href="<?= base_url('laporan/hutang') ?>" class="<?= $this->uri->segment(2) == 'hutang' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Hutang</span> </a></li>
                    <li> <a href="<?= base_url('laporan/piutang') ?>" class="<?= $this->uri->segment(2) == 'piutang' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Piutang</span> </a></li>
                </ul>
            </li>
        <?php endif ?>
        <?php if ($user['role'] == 0) : ?>
            <li class="nav-heading">Kasir</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#transaksi" data-bs-toggle="collapse" href="#"><i class="fa-solid fa-money-check-dollar"></i><span>Kasir</span><i class="bi bi-chevron-down ms-auto"></i> </a>
                <ul id="transaksi" class="nav-content collapse <?= $this->uri->segment(1) == 'penjualan' || $this->uri->segment(1) == 'penjualan' || $this->uri->segment(1) == 'piutang' || $this->uri->segment(1) == 'angsuran' ? 'show' : '' ?>" data-bs-parent="#sidebar-nav">
                    <li> <a href="<?= base_url('penjualan') ?>" class="<?= $this->uri->segment(1) == 'penjualan' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Tampil Data</span> </a></li>
                    <li> <a href="<?= base_url('penjualan/create') ?>" class="<?= $this->uri->segment(1) == 'hutang' ? 'active' : '' ?>"> <i class="bi bi-circle"></i><span>Tambah Data Penjualan</span> </a></li>
                </ul>
            </li>
        <?php endif ?>
        <?php if ($user['role'] == 3) : ?>
            <li class="nav-item"> <a class="nav-link " href="<?= base_url('pembeli') ?>" class="<?= $this->uri->segment(1) == 'pembeli' ? 'active' : '' ?>"> <i class="fas fa-shopping-basket"></i><span>Belanja</span> </a></li>
            <li class="nav-item"> <a class="nav-link " href="<?= base_url('pembeli/riwayat') ?>" class="<?= $this->uri->segment(2) == 'riwayat' ? 'active' : '' ?>"> <i class="fas fa-scroll"></i> <span>Riwayat Belanja</span> </a></li>
        <?php endif ?>
    </ul>
</aside>