<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Laporan Data Keuangan</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <form action="<?= base_url('laporan/printKeuangan') ?>" method="">
                            <div class="d-flex justify-content-between">
                                <input type="date" class="form-control" name="tanggal_awal" required>
                                <input type="date" class="form-control" name="tanggal_akhir" required>
                                <select name="status" id="" class="form-control">
                                    <option value="semua">--pilih--</option>
                                    <option value="masuk">Masuk</option>
                                    <option value="keluar">Keluar</option>
                                </select>
                                <button type="submit" name="" class="btn" style="background-color: pink; color: white;">Print</button>
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

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>