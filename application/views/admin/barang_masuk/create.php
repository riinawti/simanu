<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Barang Masuk</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Tambah Barang</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('barang_masuk/store') ?>" method="post" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Suplier</label>
                                <div class="col-sm-10">
                                    <select name="suplier_id" id="" class="form-control select2">
                                        <?php foreach ($suplier as $b) : ?>
                                            <option value="<?= $b['id_suplier'] ?>"><?= $b['nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <small class="text-danger"> <?= form_error('kode'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                <div class="col-sm-10"> <input type="date" class="form-control <?= form_error('tanggal') ? 'is-invalid' : '' ?>" id="inputText" name="tanggal"></div>
                                <small class="text-danger"> <?= form_error('tanggal'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                                <div class="col-sm-10">
                                    <select name="metode" id="" class="form-control">
                                        <option value="cash">Cash</option>
                                        <option value="kredit">Kredit</option>
                                    </select>
                                </div>
                                <small class="text-danger"> <?= form_error('tanggal'); ?></small>
                            </div>
                            <hr>
                            <div class="badge bg-secondary" id="tombol-item">Tambah Item</div>
                            <div id="barang-container">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Barang 1</label>
                                    <div class="col-sm-10">
                                        <select name="barang[]" id="" class="form-control select2">
                                            <?php foreach ($barang as $b) : ?>
                                                <option value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Harga 1</label>
                                    <div class="col-sm-10"> <input type="number" class="form-control <?= form_error('harga_beli') ? 'is-invalid' : '' ?>" id="inputText" name="harga_beli[]"></div>
                                    <small class="text-danger"> <?= form_error('harga_beli'); ?></small>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah 1</label>
                                    <div class="col-sm-10"> <input type="number" class="form-control <?= form_error('jumlah') ? 'is-invalid' : '' ?>" id="inputText" name="jumlah[]"></div>
                                    <small class="text-danger"> <?= form_error('jumlah'); ?></small>
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