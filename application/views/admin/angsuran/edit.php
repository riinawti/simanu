<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Angsuran</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Edit Angsuran</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('angsuran/update') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $data['id_angsuran'] ?>">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                                <div class="col-sm-10"> <input type="date" class="form-control <?= form_error('tanggal_bayar') ? 'is-invalid' : '' ?>" id="inputText" name="tanggal_bayar" value="<?= $data['tanggal_bayar'] ?>"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('tanggal_bayar'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="" class="form-control">
                                        <option value="pembelian" <?= $data['status'] == 'pembelian' ? 'selected' : '' ?>>Pembelian</option>
                                        <option value="penjualan" <?= $data['status'] == 'penjualan' ? 'selected' : '' ?>>Penjualan</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">
                                    <?= form_error('status'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10"> <input type="number" class="form-control <?= form_error('jumlah') ? 'is-invalid' : '' ?>" id="inputText" name="jumlah" value="<?= $data['jumlah'] ?>"></div>
                                <div class="invalid-feedback">
                                    <?= form_error('jumlah'); ?>
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