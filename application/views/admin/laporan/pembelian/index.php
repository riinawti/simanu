<main id="main" class="main">
   <div class="pagetitle my-3">
      <h1>Laporan Data Pembelian</h1>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header d-flex">
                  <form action="<?= base_url('laporan/pembelian') ?>" method="get">
                     <div class="d-flex justify-content-between">
                        <input type="date" class="form-control" name="tanggal_awal" value="<?= $tanggal_awal ?>" required>
                        <input type="date" class="form-control" name="tanggal_akhir" value="<?= $tanggal_akhir ?>" required>
                        <button type="submit" class="btn" style="background-color: grey; color: white; margin-right: 10px;">Filter</button>
                        <a href="<?= base_url('laporan/pembelian') ?>" class="btn" style="background-color: lightgrey; color: black; margin-right: 10px;"><i class="fas fa-sync-alt"></i></a>
                        <a href="<?= base_url('laporan/printPembelian?tanggal_awal=' . ($tanggal_awal ?? '') . '&tanggal_akhir=' . ($tanggal_akhir ?? '')) ?>" class="btn" style="background-color: pink; color: white;">Print</a>
                     </div>
                  </form>
               </div>
               <div class="card-body p-4">
                  <table class="table table-hover" id="myTable">
                     <thead>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Tanggal</th>
                        <th>Suplier</th>
                        <th>Pembayaran</th>
                     </thead>
                     <tbody>
                        <?php $i = 1;
                        foreach ($data as $item) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $item['kd_beli'] ?></td>
                              <td><?= $item['tanggal'] ?></td>
                              <td><?= $item['nama'] ?></td>
                              <td><?= $item['metode'] ?></td>
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
      window.location.href = '<?= base_url('laporan/pembelian') ?>';
   });
</script>