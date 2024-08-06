<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Pengguna</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Edit Pengguna</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('pengguna/update') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $data['id_pengguna'] ?>">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" id="inputText" name="nama" value="<?= $data['nama'] ?>"></div>
                                <small class="text-danger"> <?= form_error('nama'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" id="inputText" name="username" value="<?= $data['username'] ?>"></div>
                                <small class="text-danger"> <?= form_error('username'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" id="" class="form-control">
                                        <option value="0" <?= $data['role'] ? 'selected' : '' ?>>Admin</option>
                                        <option value="0" <?= !$data['role'] ? 'selected' : '' ?>>Karyawan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Telepon</label>
                                <div class="col-sm-10"> <input type="number" class="form-control <?= form_error('telepon') ? 'is-invalid' : '' ?>" id="inputText" name="telepon" value="<?= $data['telepon'] ?>"></div>
                                <small class="text-danger"> <?= form_error('telepon'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="inputText" name="alamat" value="<?= $data['alamat'] ?>"></div>
                                <small class="text-danger"> <?= form_error('alamat'); ?></small>
                            </div>

                            <button type="submit" class="btn btn-success mt-2"> <i class="fas fa-save pr-5"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>