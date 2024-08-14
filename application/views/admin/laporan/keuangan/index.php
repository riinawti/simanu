<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Laporan Data Keuangan</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <form action="<?= base_url('laporan/keuangan') ?>" method="get">
                            <div class="d-flex justify-content-between">
                                <input type="date" class="form-control" name="tanggal_awal" value="<?= $tanggal_awal ?>" required>
                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= $tanggal_akhir ?>" required>
                                <select name="status" class="form-control">
                                    <option value="">--pilih--</option>
                                    <option value="masuk" <?= $status === 'masuk' ? 'selected' : '' ?>>Masuk</option>
                                    <option value="keluar" <?= $status === 'keluar' ? 'selected' : '' ?>>Keluar</option>
                                </select>
                                <button type="submit" class="btn" style="background-color: grey; color: white; margin-right: 10px;">Filter</button>
                                <a href="<?= base_url('laporan/keuangan') ?>" class="btn" style="background-color: lightgrey; color: black; margin-right: 10px;"><i class="fas fa-sync-alt"></i></a>
                                <a href="<?= base_url('laporan/printKeuangan?tanggal_awal=' . ($tanggal_awal ?? '') . '&tanggal_akhir=' . ($tanggal_akhir ?? '') . '&status=' . ($status ?? '')) ?>" class="btn" style="background-color: pink; color: white;">Print</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kas Masuk</th>
                                <th>Kas Keluar</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                $masuk = 0;
                                $keluar = 0;
                                $selisih = 0;
                                foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item['tanggal'] ?></td>
                                        <td>
                                            <?php if ($item['status'] == 'masuk') : ?>
                                                Rp<?= number_format($item['total']) ?>
                                            <?php else : ?>
                                                Rp<?= number_format(0) ?>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <?php if ($item['status'] == 'keluar') : ?>
                                                Rp<?= number_format($item['total']) ?>
                                            <?php else : ?>
                                                Rp<?= number_format(0) ?>
                                            <?php endif ?>
                                        </td>
                                        <td><?= $item['keterangan'] ?></td>
                                    </tr>
                                    <?php
                                    if ($item['status'] == 'keluar') {
                                        $keluar += $item['total'];
                                    } else {
                                        $masuk += $item['total'];
                                    }
                                    ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Total Keuangan</td>
                                    <td>Rp <?= number_format($masuk) ?></td>
                                    <td>Rp <?= number_format($keluar) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Selisih</td>
                                    <td colspan="2" style="text-align: center;">Rp <?= number_format($masuk - $keluar) ?></td>
                                </tr>
                            </tfoot>
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
        window.location.href = '<?= base_url('laporan/keuangan') ?>';
    });
</script>