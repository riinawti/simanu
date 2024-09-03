<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SIMANU - Daftar</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/quill.bubble.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/simple-datatables.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4"> <a href="" class="logo d-flex align-items-center w-auto"> <img src="assets/img/logo.png" alt=""> <span class="d-none d-lg-block">SIMANU</span> </a></div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Daftar Akun</h5>
                                        <p class="text-center small">Masukan data dibawah ini untuk membuat akun</p>
                                        <?php if ($this->session->flashdata('gagal')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert"> <i class="bi bi-check-circle me-1"></i> <?= $this->session->flashdata('gagal'); ?> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                                        <?php endif; ?>
                                    </div>
                                    <form class="row g-3" action="<?= base_url('auth/register') ?>" method="post">
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="email" class="form-control" id="yourUsername" required>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Nama</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="nama" class="form-control" id="yourUsername" required>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="username" class="form-control" id="yourUsername" required>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label> <input type="password" name="password" class="form-control" id="yourPassword" required>

                                        </div>

                                        <div class="col-12"> <button class="btn btn-primary w-100" type="submit">Daftar</button></div>
                                    </form>
                                    <a href="<?= base_url('auth') ?>" class="mt-1">Login</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-8 d-flex flex-column align-items-center justify-content-center">
                            <img src="<?= base_url('public/assets/img/login.png') ?>" width="500">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="<?= base_url('public/assets/js/apexcharts.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/chart.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/echarts.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/quill.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/simple-datatables.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/tinymce.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/validate.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/main.js') ?>"></script>
</body>

</html>