<main id="main" class="main">
    <div class="pagetitle my-3">
        <h1>Detail Barang Masuk <?= $data[0]['kd_beli'] ?></h1>
    </div>
    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i> <?= $this->session->flashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('barang_masuk') ?>" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Beli</th>
                                    <th>Jumlah</th>
                                    <th>Sub total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                $total = 0;
                                foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item['nama_barang'] ?></td>
                                        <td>Rp<?= number_format($item['harga_beli'], 0, ',', '.') ?></td>
                                        <td><?= $item['qty'] ?></td>
                                        <td>Rp<?= number_format($item['qty'] * $item['harga_beli'], 0, ',', '.') ?></td>
                                    </tr>
                                    <?php $total += $item['qty'] * $item['harga_beli'] ?>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Total Pembelian</td>
                                    <td>Rp<?= number_format($total) ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>