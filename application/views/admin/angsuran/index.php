<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Angsuran</h1>
    </div>
    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert"> <i class="bi bi-check-circle me-1"></i> <?= $this->session->flashdata('pesan'); ?> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            </div>
        </div>
    <?php endif; ?>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('angsuran/create') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>Tambah Data</a>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>No</th>
                                <th>Kode Angsuran</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah</th>
                                <th>Jenis Pembayaran</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item['kd_angsuran'] ?></td>
                                        <td><?= $item['tanggal_bayar'] ?></td>
                                        <td>Rp <?= number_format($item['jumlah']) ?></td>
                                        <td>
                                            <?= $item['status'] ?> - <?= $item['unik'] ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('angsuran/delete/' . $item['id_angsuran']) ?>" class="badge bg-danger" onclick="return confirm('yakin untuk menghapus?')"><i class="fas fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>