<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Barang</h1>
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
                        <a href="<?= base_url('barang/create') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>Tambah Data</a>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Harga Beli Terakhir</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item['kode_brg'] ?></td>
                                        <td><?= $item['kategori'] ?></td>
                                        <td><?= $item['nama_barang'] ?></td>
                                        <td>Rp<?= number_format($item['harga_beli']) ?></td>
                                        <td>Rp<?= number_format($item['harga']) ?></td>
                                        <td><?= $item['stok'] ?></td>
                                        <td>
                                            <img src="<?= base_url('public/barang/' . $item['foto']) ?>" alt="" width="50">
                                        </td>
                                        <td>
                                            <a href="<?= base_url('barang/edit/' . $item['id_barang']) ?>" class="badge bg-warning"><i class="fas fa-pen"></i> Edit</a>
                                            <a href="<?= base_url('barang/delete/' . $item['id_barang']) ?>" class="badge bg-danger" onclick="return confirm('yakin untuk menghapus?')"><i class="fas fa-trash"></i> Hapus</a>
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