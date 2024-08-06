<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Data Barang Keluar</h1>
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
                    <div class="card-body p-4">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data as $item) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $item['tanggal'] ?></td>
                                        <td><?= $item['nama_barang'] ?></td>
                                        <td><?= $item['jumlah_terjual'] ?></td>

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