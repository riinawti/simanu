<main id="main" class="main">
    <div class="pagetitle my-3  ">
        <h1>Form Penjualan</h1>
    </div>
    <section class="section">
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row mb-3">
            <div class="col-5 mb-4 order-0">
                <?php
                $keranjang = $this->cart->contents();
                $jumlhItem = 0;
                foreach ($keranjang as $key => $value) {
                    $jumlhItem = $jumlhItem + $value['qty'];
                }
                ?>
                <div class="card">
                    <div class="card-header">

                        <h5><b>Keranjang <span class="badge" style="background-color: #ff69b4; color: white;"><?= $jumlhItem ?></span></b></h5>
                    </div>
                    <!-- <div class="card-body table-responsive ">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Obat</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <td>Total</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                            <?php
                            $keranjang = $this->cart->contents();
                            $jlm = 0;
                            $total = 0;
                            ?>
                            <?php $i = 1;
                            foreach ($keranjang as $items) : ?>
                                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                <?php $jlm = $jlm + $items['qty'] ?>
                                <?php $total += $jlm * $items['price']; ?>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">Total Bayar</td>
                                <td>Rp <?= number_format($total) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div> -->
                    <!-- <div class="card-body table-responsive ">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Obat</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <td>Total</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($keranjang as $items) : ?>
                                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                <?php $jlm = $jlm + $items['qty'] ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $items['name'] ?></td>
                                    <td>Rp <?= number_format($items['price']) ?></td>
                                    <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'type' => 'number', 'min' => '1')); ?></td>
                                    <td>Rp <?= number_format($items['subtotal']) ?></td>
                                    <td>
                                        <a href="<?= base_url('penjualan/deleteCart/' . $items['rowid']) ?>" onclick="return confirm('Yakin')"><i class="bx bx-trash me-1"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">Total Bayar</td>
                                <td>Rp <?= $this->cart->format_number($this->cart->total()) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div> -->
                    <div class="card-body table-responsive">
                        <?php echo form_open('penjualan/updateCart'); ?>
                        <table cellpadding="6" cellspacing="1" style="width:100%" class="table table-hover">
                            <tr>
                                <th width="10px">QTY</th>
                                <th>Barang</th>
                                <th style="text-align:right">Harga</th>
                                <th style="text-align:right">Sub-Total</th>
                                <th>Aksi</th>
                            </tr>

                            <?php $i = 1; ?>
                            <?php foreach ($this->cart->contents() as $items) : ?>
                                <tr>
                                    <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5', 'type' => 'number', 'min' => 1)); ?></td>
                                    <td><?php echo $items['name']; ?></td>
                                    <td style="text-align:right">Rp<?= number_format($items['price']) ?></td>
                                    <td style="text-align:right">Rp<?= number_format($items['subtotal']) ?></td>
                                    <td><a href="<?= base_url('penjualan/deleteCart/' . $items['rowid']) ?>"><i class="bx bx-trash me-1"></i></a></td>
                                </tr>
                                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                <?php $i++; ?>
                            <?php endforeach; ?>

                            <tr>
                                <td colspan="2"> </td>
                                <td class="right"><strong>Total</strong></td>
                                <td class="right" colspan="2">Rp<?= number_format($this->cart->total()) ?></td>
                            </tr>
                        </table>
                        <?php if ($jumlhItem > 0) : ?>
                            <div class="my-3">
                                <button type="submit" class="btn btn-secondary">Update Keranjang</button>
                            </div>
                        <?php endif ?>
                        <?php echo form_close(); ?>
                        <hr>
                        <!-- <div class="my-3">
                            <h5>Pembayaran</h5>
                            <?php if ($jumlhItem > 0) : ?>
                                <form action="<?= base_url('penjualan/checkout') ?>" method="post">
                                    <input type="text" class="form-control my-2" name="nama" placeholder="Nama Pembeli" required>
                                    <button type="submit" class="btn btn-success">Bayar</button>
                                </form>
                            <?php endif ?>
                        </div> -->
                    </div>

                </div>
            </div>
            <div class="col-7 mb-4 order-0">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5> <b>Barang</b></h5>
                        <form action="" method="" class="d-flex">
                            <input type="text" class="form-control" placeholder="Nama Barang" name="q" value="<?= $this->input->get('q') ?>">
                            <button type="" name="" class="btn btn-secondary">Cari</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php if (!empty($barang)) : ?>
                                <?php foreach ($barang as $o) : ?>
                                    <div class="col-md-4">
                                        <?php
                                        echo form_open('penjualan/keranjang');
                                        echo form_hidden('id', $o['id_barang']);
                                        echo form_hidden('name', $o['nama_barang']);
                                        echo form_hidden('qty', '1');
                                        echo form_hidden('price', $o['harga']);
                                        echo form_hidden('redirect_page', str_replace('', '', current_url()));
                                        ?>
                                        <div class="card">
                                            <img src="<?= base_url('public/barang/' . $o['foto']) ?>" class="card-img-top" width="50px" height="80px">
                                            <div class="card-body">
                                                <h5 class="card-title">Rp <?= number_format($o['harga']) ?></h5>
                                                <p class="card-text"><?= $o['nama_barang'] ?></p>
                                                <button type="submit" class="btn" style="background-color: #ff69b4; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px;">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?= form_close() ?>
                                    </div>
                                <?php endforeach ?>
                            <?php else : ?>
                                <div class="alert alert-warning">Data barang tidak ada..</div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($jumlhItem > 0) : ?>
            <div class="row">
                <div class="card p-3">
                    <div class="card-header">Pembayaran</div>
                    <div class="card-body">
                        <form action="<?= base_url('penjualan/checkout') ?>" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="">Nama Pembeli</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div>
                                        <label for="">Total</label>
                                        <input type="text" class="form-control" value="<?= $this->cart->total() ?>" readonly id="total" name="total_bayar">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="">Metode</label>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="metode" id="flexRadioDefault1" value="cash" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Cash
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="metode" id="kredit" value="kredit">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Kredit
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="">Diskon</label>
                                        <input type="text" class="form-control" id="diskon" name="diskon">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="orang" style="display: none;">
                                <label for="">Nama Penghutang</label>
                                <select name="oh_id" id="" class="form-control">
                                    <option disabled selected>--pilih--</option>
                                    <?php foreach ($orang as $a) : ?>
                                        <option value="<?= $a['id_oh'] ?>"><?= $a['nama'] ?>-<?= $a['nik'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Tunai</label>
                                    <input type="number" class="form-control" id="tunaiInput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label for="">Kembalian</label>
                                        <input type="text" class="form-control" id="kembalian" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label for="">Alamat Pengantaran</label>
                                        <input type="text" class="form-control" name="pengantaran">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3"><i class="fas fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </section>
</main>