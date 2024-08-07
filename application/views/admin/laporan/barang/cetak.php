<html>

<head>
    <title> LAPORAN DATA BARANG</title>
    <style type="text/css">
        body {
            font-family: arial;

        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: #fff;
            border-bottom: 5px solid black;
            /* height: 500px; */
            /* padding: 20px; */
        }

        table {
            border-bottom: 5px solid # 000;
            padding: 2px
        }

        .tengah {
            text-align: center;
            /* line-height: 5px; */
        }

        h2 {
            text-align: center;
            padding: 5px;
        }

        .nama {
            text-transform: uppercase;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        .custom-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="rangkasurat">
        <table width="100%">
            <tr>
                <td> <img src="<?= base_url('public/assets/img/login.png') ?>" width="120px"> </td>
                <td class="tengah">
                    <h2 style="margin-left: -100px; margin-bottom: 0;">TB. RUSADI</h2>
                    <b style="margin-left: -100px;">Jalan Pandu Guntung Paikat, Kemuning Kecamatan Banjarbaru Selatan</b>
                </td>
            </tr>
        </table>
    </div>
    <h2>LAPORAN DATA BARANG</h2>
    <table class="custom-table">
        <thead>
            <th>No</th>
            <th>Kode</th>
            <th>Kategori</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Satuan</th>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data as $item) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $item['kode'] ?></td>
                    <td><?= $item['kategori'] ?></td>
                    <td><?= $item['nama_barang'] ?></td>
                    <td>Rp<?= number_format($item['harga']) ?></td>
                    <td><?= $item['stok'] ?></td>
                    <td><?= $item['satuan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div style="font-size: 20px; position: absolute; bottom: 0; right: 0;">
        <p>Mengetahui,Banjarbaru <?= date('d M Y') ?></p><br><br><br><br>
        <p style="text-transform: uppercase;">mursalin</p>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>