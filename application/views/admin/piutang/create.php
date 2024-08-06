<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Piutang</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Tambah Piutang</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('piutang/store') ?>" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('nik') ? 'is-invalid' : '' ?>" id="inputText" name="nik"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('nik'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" id="inputText" name="nama"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('nama'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Telepon</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('telepon') ? 'is-invalid' : '' ?>" id="inputText" name="telepon"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('telepon'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="inputText" name="alamat"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('alamat'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Foto KTP</label>

                                <div class="col-sm-10"> <input type="file" class="form-control <?= form_error('ktp') ? 'is-invalid' : '' ?>" id="inputText" name="ktp"></div>
                                <small class="text-muted">PNG|JPG|JEPG MAX 2MB</small>
                                <small class="text-danger"> <?= form_error('ktp'); ?></small>
                                <?php if (isset($error)) : ?>
                                    <span class="text-danger"><?= $error ?></span>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-success mt-2"> <i class="fas fa-save pr-5"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>