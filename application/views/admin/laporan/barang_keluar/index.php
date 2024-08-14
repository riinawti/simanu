<main id="main" class="main">
    <div class="pagetitle my-3">
        <h1>Laporan Data Barang Keluar</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <form action="<?= base_url('laporan/barang_keluar') ?>" method="get">
                            <div class="d-flex justify-content-between">
                                <input type="date" class="form-control" name="tanggal_awal" value="<?= $tanggal_awal ?? '' ?>" placeholder="Tanggal Awal">
                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= $tanggal_akhir ?? '' ?>" placeholder="Tanggal Akhir">
                                <button type="submit" class="btn" style="background-color: grey; color: white; margin-right: 10px;">Filter</button>
                                <a href="<?= base_url('laporan/barang_keluar') ?>" class="btn" style="background-color: lightgrey; color: black; margin-right: 10px;"><i class="fas fa-sync-alt"></i></a>
                                <a href="<?= base_url('laporan/printBarangKeluar?tanggal_awal=' . ($tanggal_awal ?? '') . '&tanggal_akhir=' . ($tanggal_akhir ?? '')) ?>" class="btn" style="background-color: pink; color: white;">Print</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data)): ?>
                                    <?php foreach ($data as $key => $item): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $item['tanggal'] ?></td>
                                            <td><?= $item['nama_barang'] ?></td>
                                            <td><?= $item['jumlah_terjual'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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
        window.location.href = '<?= base_url('laporan/barang_keluar') ?>';
    });
</script>