<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Barang</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Edit Barang</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('barang/update') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?= $data['id_barang'] ?>" name="id">

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('nama_barang') ? 'is-invalid' : '' ?>" id="inputText" name="nama_barang" value="<?= $data['nama_barang'] ?>"></div>
                                <small class="text-danger"> <?= form_error('nama_barang'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Satuan</label>
                                <div class="col-sm-10">
                                    <select name="satuan" id="" class="form-control">
                                        <option value="pcs" <?= $data['satuan'] == 'pcs' ? 'selected' : ''  ?>>Pcs</option>
                                        <option value="sak" <?= $data['satuan'] == 'sak' ? 'selected' : ''  ?>>Sak</option>
                                        <option value="kaleng" <?= $data['satuan'] == 'kaleng' ? 'selected' : ''  ?>>Kaleng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select name="kategori_id" id="" class="form-control">
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k['id_kategori'] ?>" <?= $data['kategori_id'] == $k['id_kategori'] ? 'selected' : ''  ?>><?= $k['kategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Jual</label>
                                <div class="col-sm-10"> <input type="number" class="form-control <?= form_error('harga') ? 'is-invalid' : '' ?>" id="inputText" name="harga" value="<?= $data['harga'] ?>"></div>
                                <small class="text-danger"> <?= form_error('kode'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10"> <input type="number" class="form-control <?= form_error('stok') ? 'is-invalid' : '' ?>" id="inputText" name="stok" value="<?= $data['stok'] ?>"></div>
                                <small class="text-danger"> <?= form_error('stok'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Foto</label>

                                <div class="col-sm-10"> <input type="file" class="form-control <?= form_error('foto') ? 'is-invalid' : '' ?>" id="inputText" name="foto"></div>
                                <small class="text-muted">PNG|JPG|JEPG MAX 2MB</small>
                                <small class="text-danger"> <?= form_error('kode'); ?></small>
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