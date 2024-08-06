<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Pengguna</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Tambah Pengguna</h6>
                    </div>
                    <div class="card-body p-4">
                        <form action="<?= base_url('pengguna/store') ?>" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" id="inputText" name="nama"></div>
                                <small class="text-danger"> <?= form_error('nama'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" id="inputText" name="username"></div>
                                <small class="text-danger"> <?= form_error('username'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" id="" class="form-control">
                                        <option value="0">Admin</option>
                                        <option value="0">Karyawan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Telepon</label>
                                <div class="col-sm-10"> <input type="number" class="form-control <?= form_error('telepon') ? 'is-invalid' : '' ?>" id="inputText" name="telepon"></div>
                                <small class="text-danger"> <?= form_error('telepon'); ?></small>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10"> <input type="text" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="inputText" name="alamat"></div>
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