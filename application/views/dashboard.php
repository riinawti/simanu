<main id="main" class="main" style="margin-bottom: 200px;">
    <div class="pagetitle mb-4">
        <h1>Dashboard</h1>
        <!-- Pesan Berjalan -->
        <div class="marquee-container">
            <div class="marquee">
                Selamat Datang! Silahkan pilih menu untuk digunakan.
            </div>
        </div>
    </div>
    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i> <?= $this->session->flashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
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
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa-brands fa-dropbox"></i>
                            </div>
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
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-users"></i>
                            </div>
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
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-cart-shopping"></i>
                            </div>
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
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-sack-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6 style="font-size: 20px;">Rp<?= $pendapatan == null ? '0' : number_format($pendapatan) ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Lokasi TB. Rusadi -->
        <div class="row">
            <div class="col-lg-6 col-12 mb-4">
                <div class="card mb-0">
                    <div class="card-close"></div>
                    <div class="card-body d-flex flex-column">
                        <h3>Lokasi TB. Rusadi</h3>
                        <p class="small mb-5 text-gray-500">Toko Bangunan TB. Rusadi Banjarbaru</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31702.731341431024!2d114.82531420946515!3d-3.4465504110898066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de68722e54a9d29%3A0x7b2e8f9c16e38b1b!2sToko%20Bangunan%20TB.%20Rusadi!5e0!3m2!1sid!2sid!4v1696475676430!5m2!1sid!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!-- Tautan ke Lokasi -->
                        <a href="https://maps.app.goo.gl/zAiaaGAKRsXRRDHy7" target="_blank" class="btn btn-primary mt-3">Lihat di Google Maps</a>
                    </div>
                </div>
            </div>
            <!-- Grafik stok -->
            <div class="col-lg-6 col-12 mb-4">
                <div class="card mb-0">
                    <div class="card-body">
                        <h5 class="card-title">Stok Barang</h5>
                        <canvas id="myChart" width="200" height="100" style="border:0;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<style>
    .marquee-container {
        overflow: hidden;
        white-space: nowrap;
        box-sizing: border-box;
        background-color: #f0f8ff;
        /* Latar belakang biru muda */
        padding: 15px;
        /* Padding di sekitar teks */
        border-radius: 5px;
        /* Sudut membulat */
        margin-bottom: 15px;
        /* Jarak bawah */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Bayangan */
    }

    .marquee {
        display: inline-block;
        padding-left: 100%;
        /* Mulai scrolling dari kanan */
        font-size: 22px;
        /* Ukuran font */
        font-weight: bold;
        /* Menebalkan teks */
        color: #333;
        /* Warna teks */
        animation: marquee 10s linear infinite;
    }

    @keyframes marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }
</style>