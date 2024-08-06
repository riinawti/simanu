<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Pengantaran Barang</h1>
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
                    <!-- <div class="card-header">
                        <a href="<?= base_url('suplier/create') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>Tambah Data</a>
                    </div> -->
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>No</th>
                                <th>Kode Pembelian</th>
                                <th>Nama Beli</th>
                                <th>Status Pengantaran</th>
                                <th>Alamat Pengantaran</th>
                                <!-- <th>Telepon</th>
                                <th>Alamat</th>
                               -->
                                <th>Aksi</th>
                            </thead>
                            <!-- <?php var_dump($data) ?> -->
                            <tbody>
                                <?php $i = 1;
                                foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item['kd_penjualan'] ?></td>
                                        <td><?= $item['nama_pembeli'] ?></td>
                                        <td>
                                            <?php if ($item['status_pengantaran'] != null) : ?>
                                                <?php if ($item['status_pengantaran'] == 'proses') : ?>
                                                    <span class="badge bg-warning">Proses</span>
                                                <?php else : ?>
                                                    <span class="badge bg-success">Diantar</span>
                                                <?php endif ?>
                                            <?php else : ?>
                                                Tidak Ada
                                            <?php endif ?>
                                        </td>
                                        <td><?= $item['pengantaran'] ?></td>
                                        <td>
                                            <a href="<?= base_url('pengantaran/edit/' . $item['id_penjualan']) ?>" class="badge bg-warning"><i class="fas fa-pen"></i> Edit</a>
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