<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Laporan Data Piutang</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <form action="<?= base_url('laporan/piutang') ?>" method="get">
                            <div class="d-flex justify-content-between">
                                <input type="date" class="form-control" name="tanggal_awal" value="<?= $tanggal_awal ?? '' ?>" placeholder="Tanggal Awal">
                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= $tanggal_akhir ?? '' ?>" placeholder="Tanggal Akhir">
                                <button type="submit" class="btn" style="background-color: grey; color: white; margin-right: 10px;">Filter</button>
                                <a href="<?= base_url('laporan/piutang') ?>" class="btn" style="background-color: lightgrey; color: black; margin-right: 10px;"><i class="fas fa-sync-alt"></i></a>
                                <a href="<?= base_url('laporan/printPiutang?tanggal_awal=' . ($tanggal_awal ?? '') . '&tanggal_akhir=' . ($tanggal_akhir ?? '')) ?>" class="btn" style="background-color: pink; color: white;">Print</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Tanggal Tempo</th>
                                <th>Nama Pembeli</th>
                                <th>Total</th>
                                <th>Total Bayar</th>
                                <th>Sisa</th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                $total = 0;
                                $sisa = 0;
                                foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item['kd_piutang'] ?></td>
                                        <td><?= $item['tanggal'] ?></td>
                                        <td><?= $item['tanggal_tempo'] ?></td>
                                        <td><?= $item['nama_pembeli'] ?></td>
                                        <td>Rp<?= number_format($item['total']) ?></td>
                                        <td>Rp <?= number_format($item['total'] - ($item['sisa'])) ?></td>
                                        <td>Rp<?= number_format($item['sisa']) ?></td>
                                    </tr>
                                    <?php $total +=  $item['total'];
                                    $sisa +=  $item['sisa']; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">Total Piutang</td>
                                    <td>Rp <?= number_format($total) ?></td>
                                    <td>Rp <?= number_format($total - $sisa) ?></td>
                                    <td>Rp <?= number_format($sisa) ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>