<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Kategori</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Tambah Kategori</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('kategori/store') ?>" method="post">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('kode') ? 'is-invalid' : '' ?>" id="inputText" name="kode"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('kode'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('kategori') ? 'is-invalid' : '' ?>" id="inputText" name="kategori"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('kategori'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-2"> <i class="fas fa-save pr-5"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>