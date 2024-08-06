<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Penjualan</h1>
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
                        <a href="<?= base_url('penjualan/create') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>Tambah Data</a>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Metode</th>
                                <th>Total</th>
                                <!-- <th>Telepon</th>
                                <th>Alamat</th>
                                -->
                                <th>Aksi</th>
                            </thead>
                            <!-- <?php var_dump($data) ?> -->
                            <tbody>
                                <?php $i = 1;
                                foreach ($penjualan as $item) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item['kd_penjualan'] ?></td>
                                        <td><?= $item['tanggal'] ?></td>
                                        <td><?= $item['metode'] ?></td>
                                        <td>Rp<?= number_format($item['total']) ?></td>
                                        <td>
                                            <a href="<?= base_url('penjualan/detail/' . $item['id_penjualan']) ?>" class="badge bg-info"><i class="fas fa-eye"></i> Detail</a>
                                            <a href="<?= base_url('penjualan/delete/' . $item['id_penjualan']) ?>" class="badge bg-danger" onclick="return confirm('yakin untuk menghapus?')"><i class="fas fa-trash"></i> Hapus</a>
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