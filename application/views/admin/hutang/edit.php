<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Hutang</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Edit Hutang</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('hutang/update') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $data['id_hutang'] ?>">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Tempo</label>
                                <div class="col-sm-10"> <input type="date" class="form-control <?= form_error('tanggal_tempo') ? 'is-invalid' : '' ?>" id="inputText" name="tanggal_tempo" value="<?= $data['tanggal_tempo'] ?>"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('tanggal_tempo'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Total</label>
                                <div class="col-sm-10"> <input type="number" class="form-control <?= form_error('total') ? 'is-invalid' : '' ?>" id="inputText" name="total" value="<?= $data['total'] ?>"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('total'); ?>
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