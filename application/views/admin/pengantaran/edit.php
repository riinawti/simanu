<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Pengantaran Barang</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Edit Pengantaran</h6>
                    </div>
                    <div class="card-body p-4">
                        <!-- <?php var_dump($data) ?> -->
                        <form action="<?= base_url('pengantaran/update') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $data['id_penjualan'] ?>">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Pengantaran</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('pengantaran') ? 'is-invalid' : '' ?>" id="inputText" name="pengantaran" value="<?= $data['pengantaran'] ?>"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('pengantaran'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status_pengantaran" id="" class="form-control">
                                        <option value="proses" <?= $data['status_pengantaran'] == 'proses' ? 'selected' : '' ?>>Proses</option>
                                        <option value="diantar" <?= $data['status_pengantaran'] == 'diantar' ? 'selected' : '' ?>>Diantar</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">
                                    <?= form_error('status_pengantaran'); ?>
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