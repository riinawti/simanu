<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Detail Belanja <?= $penjualan[0]['kd_penjualan'] ?></h1>
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
                        <a href="<?= base_url('pembeli/riwayat') ?>" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i>Kembali</a>
                        <a href="<?= base_url('penjualan/invoice/' . $penjualan[0]['id_penjualan']) ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-print"></i>Print Invoide</a>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub total</th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                $total = 0;
                                foreach ($penjualan as $item) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item['nama_barang'] ?></td>
                                        <td>Rp<?= number_format($item['harga'], 0, ',', '.') ?></td>
                                        <td><?= $item['qty'] ?></td>
                                        <td>Rp<?= number_format($item['qty'] * $item['harga'], 0, ',', '.') ?></td>
                                    </tr>
                                    <?php $total += $item['qty'] * $item['harga'] ?>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Total Pembelian</td>
                                    <td>Rp<?= number_format($total, 0, ',', '.') ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>