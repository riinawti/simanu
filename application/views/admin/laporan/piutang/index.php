<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Laporan Data Piutang</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <form action="<?= base_url('laporan/printPiutang') ?>" method="">
                            <div class="d-flex justify-content-between">
                                <input type="date" class="form-control" name="tanggal_awal" required>
                                <input type="date" class="form-control" name="tanggal_akhir" required>

                                <button type="submit" name="" class="btn btn-success"> Cetak</button>
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
                                <th>Sisa</th>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>