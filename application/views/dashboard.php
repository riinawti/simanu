<main id="main" class="main" style="margin-bottom: 200px;">
    <div class="pagetitle mb-4">
        <h1>Dashboard</h1>
    </div>
    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert"> <i class="bi bi-check-circle me-1"></i> <?= $this->session->flashdata('pesan'); ?> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            </div>
        </div>
    <?php endif; ?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Barang</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fa-brands fa-dropbox"></i></div>
                            <div class="ps-3">
                                <h6><?= $barang ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Suplier</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fas fa-users"></i></div>
                            <div class="ps-3">
                                <h6><?= $suplier ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Penjualan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fas fa-cart-shopping"></i></div>
                            <div class="ps-3">
                                <h6><?= $penjualan ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Pendapatan <?= date('M') ?></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fas fa-sack-dollar"></i></div>
                            <div class="ps-3">
                                <h6 style="font-size: 20px;">Rp<?= $pendapatan == null ? '0' : number_format($pendapatan) ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>