<main id="main" class="main">
    <?php if (!empty($data)) : ?>
        <div class="pagetitle my-3  ">
            <h1>Data Piutang <?= $data[0]['nama'] ?> - <?= $data[0]['nik'] ?></h1>
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
                            <a href="<?= base_url('piutang') ?>" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>Kembali</a>
                        </div>
                        <div class="card-body p-4">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <th>No</th>
                                    <th>Kode Piutang</th>
                                    <th>Kode Penjualan</th>
                                    <th>Nama Pembeli</th>
                                    <th>Tanggal Tempo</th>
                                    <th>Total Piutang</th>
                                    <th>Total Bayar</th>
                                    <th>Sisa</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($data as $item) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $item['kd_piutang'] ?></td>
                                            <td><?= $item['kd_penjualan'] ?></td>
                                            <td><?= $item['nama_pembeli'] ?></td>
                                            <td><?= $item['tanggal_tempo'] ?></td>
                                            <td>Rp <?= number_format($item['total']) ?></td>
                                            <td>Rp <?= number_format($item['total'] - ($item['sisa'])) ?></td>
                                            <td>Rp <?= number_format($item['sisa']) ?></td>
                                            <td>
                                                <a href="<?= base_url('piutang/edit/' . $item['id_piutang']) ?>" class="badge bg-warning"><i class="fas fa-pen"></i> Edit</a>
                                                <a href="<?= base_url('piutang/delete/' . $item['id_piutang']) ?>" class="badge bg-danger" onclick="return confirm('yakin untuk menghapus?')"><i class="fas fa-trash"></i> Hapus</a>
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
    <?php else : ?>
        <div class="pagetitle my-3  ">
            <h1>Data Piutang Masih Kosong</h1>
        </div>
    <?php endif ?>
</main>