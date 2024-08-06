<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Return Barang</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Edit Return Barang</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('return_barang/update') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $data['id_return'] ?>">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <select name="barang_id" id="" class="form-control select2">
                                        <?php foreach ($barang as $b) : ?>
                                            <option value="<?= $b['id_barang'] ?>" <?= $data['barang_id'] == $b['id_barang'] ? 'selected' : '' ?>><?= $b['nama_barang'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tangal</label>
                                <div class="col-sm-10"> <input type="date" class="form-control <?= form_error('tanggal') ? 'is-invalid' : '' ?>" id="inputText" name="tanggal" value="<?= $data['tanggal'] ?>"></div>
                                <small class="text-danger"> <?= form_error('tanggal'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">QTY</label>
                                <div class="col-sm-10"> <input type="number" class="form-control <?= form_error('qty') ? 'is-invalid' : '' ?>" id="inputText" name="qty" value="<?= $data['qty'] ?>"></div>
                                <small class="text-danger"> <?= form_error('qty'); ?></small>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Status Return</label>
                                <div class="col-sm-10">
                                    <select name="status" id="" class="form-control">
                                        <option value="pembelian" <?= $data['status'] == 'pembelian' ? 'selected' : '' ?>>Pembelian</option>
                                        <option value="penjualan" <?= $data['status'] == 'penjualan' ? 'selected' : '' ?>>Penjualan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Metode</label>
                                <div class="col-sm-10">
                                    <select name="metode" id="" class="form-control">
                                        <option value="uang kembali" <?= $data['metode'] == 'uang kembali' ? 'selected' : '' ?>>Uang Kembali</option>
                                        <option value="barang baru" <?= $data['metode'] == 'barang baru' ? 'selected' : '' ?>>Barang Baru</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('keterangan') ? 'is-invalid' : '' ?>" id="inputText" name="keterangan" value="<?= $data['keterangan'] ?>"></div>
                                <small class="text-danger"> <?= form_error('keterangan'); ?></small>
                            </div>
                            <button type="submit" class="btn btn-success mt-2"> <i class="fas fa-save pr-5"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>