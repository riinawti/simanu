<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SIMANU - Dashboard</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/bootstrap-icons.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="<?= base_url('public/assets/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/quill.bubble.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/remixicon.css') ?>" rel="stylesheet">
    <link href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link href="<?= base_url('public/assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between"> <a href="<?= base_url('/dashboard') ?>" class="logo d-flex align-items-center"> <img src="assets/img/logo.png" alt=""> <span class="d-none d-lg-block">SIMANU</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
        <?php
        $user = $this->session->userdata('user');
        ?>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <img src="<?= base_url('public/assets/img/profile-img.jpg') ?>" alt="Profile" class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user['nama'] ?></span> </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $user['nama'] ?></h6>
                            <span><?= $user['role'] ? 'Admin' : 'Kasir' ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li> <a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/logout') ?>"> <i class="bi bi-box-arrow-right"></i> <span>Logout</span> </a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>