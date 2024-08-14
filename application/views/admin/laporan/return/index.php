<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Laporan Data Return Barang</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <form action="<?= base_url('laporan/return') ?>" method="get">
                            <div class="d-flex justify-content-between">
                                <input type="date" class="form-control" name="tanggal_awal" value="<?= $tanggal_awal ?>" required>
                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= $tanggal_akhir ?>" required>
                                <select name="status" class="form-control" require>
                                    <option value="">--pilih--</option>
                                    <option value="pembelian" <?= $status === 'pembelian' ? 'selected' : '' ?>>Pembelian</option>
                                    <option value="penjualan" <?= $status === 'penjualan' ? 'selected' : '' ?>>Penjualan</option>
                                </select>
                                <button type="submit" class="btn" style="background-color: grey; color: white; margin-right: 10px;">Filter</button>
                                <a href="<?= base_url('laporan/return') ?>" class="btn" style="background-color: lightgrey; color: black; margin-right: 10px;"><i class="fas fa-sync-alt"></i></a>
                                <a href="<?= base_url('laporan/printReturn?tanggal_awal=' . ($tanggal_awal ?? '') . '&tanggal_akhir=' . ($tanggal_akhir ?? '') . '&status=' . ($status ?? '')) ?>" class="btn" style="background-color: pink; color: white;">Print</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>QTY</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item['tanggal'] ?></td>
                                        <td><?= $item['nama_barang'] ?></td>
                                        <td><?= $item['kategori'] ?></td>
                                        <td><?= $item['qty'] ?></td>
                                        <td><?= $item['status'] ?></td>
                                        <td><?= $item['keterangan'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    document.querySelector('a.btn-reset').addEventListener('click', function() {
        // Mengarahkan ke URL tanpa parameter
        window.location.href = '<?= base_url('laporan/return') ?>';
    });
</script>