<?php
class M_laporan extends CI_Model
{
    public function getPrintBarang()
    {
        $awal = $this->input->get('tanggal_awal');
        $akhir = $this->input->get('tanggal_akhir');
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.kategori_id');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getPrintPenjualan()
    {
        $tawal = $this->input->get('tanggal_awal');
        $tahir = $this->input->get('tanggal_akhir');

        // Query untuk mendapatkan data penjualan
        $this->db->select('tbl_penjualan.kd_penjualan AS kd_penjualan, DATE(tbl_penjualan.tanggal) AS tanggal, tbl_barang.nama_barang, tbl_penjualan_detail.qty, tbl_barang.harga');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_penjualan_detail', 'tbl_penjualan.id_penjualan = tbl_penjualan_detail.penjualan_id');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_penjualan_detail.barang_id');
        $this->db->where('DATE(tbl_penjualan.tanggal) >=', $tawal);
        $this->db->where('DATE(tbl_penjualan.tanggal) <=', $tahir);
        $this->db->order_by('tbl_penjualan.id_penjualan'); // Memastikan urutan yang konsisten
        $penjualan = $this->db->get()->result_array();

        // Inisialisasi array hasil
        $result = [];

        // Hitung total
        foreach ($penjualan as $pen) {
            $id_penjualan = $pen['kd_penjualan'];
            if (!isset($result[$id_penjualan])) {
                $result[$id_penjualan] = [
                    'kd_penjualan' => $pen['kd_penjualan'],
                    'tanggal' => $pen['tanggal'],
                    'detail' => [],
                    'total' => 0
                ];
            }

            // Tambahkan detail
            $result[$id_penjualan]['detail'][] = [
                'nama_barang' => $pen['nama_barang'],
                'qty' => $pen['qty'],
                'harga' => $pen['harga']
            ];

            // Hitung total
            $result[$id_penjualan]['total'] += $pen['qty'] * $pen['harga'];
        }

        return $result;
    }

    public function getFilteredPenjualan($tawal, $tahir)
    {
        $this->db->select('tbl_penjualan.kd_penjualan AS kd_penjualan, DATE(tbl_penjualan.tanggal) AS tanggal, tbl_barang.nama_barang, tbl_penjualan_detail.qty, tbl_barang.harga');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_penjualan_detail', 'tbl_penjualan.id_penjualan = tbl_penjualan_detail.penjualan_id');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_penjualan_detail.barang_id');
        $this->db->where('DATE(tbl_penjualan.tanggal) >=', $tawal);
        $this->db->where('DATE(tbl_penjualan.tanggal) <=', $tahir);
        $this->db->order_by('tbl_penjualan.id_penjualan'); // Mengurutkan untuk menjaga konsistensi output
        $penjualan = $this->db->get()->result_array();

        // Inisialisasi array hasil
        $result = [];

        // Hitung total
        foreach ($penjualan as $pen) {
            $id_penjualan = $pen['kd_penjualan'];
            if (!isset($result[$id_penjualan])) {
                $result[$id_penjualan] = [
                    'kd_penjualan' => $pen['kd_penjualan'],
                    'tanggal' => $pen['tanggal'],
                    'detail' => [],
                    'total' => 0
                ];
            }

            // Tambahkan detail
            $result[$id_penjualan]['detail'][] = [
                'nama_barang' => $pen['nama_barang'],
                'qty' => $pen['qty'],
                'harga' => $pen['harga']
            ];

            // Hitung total
            $result[$id_penjualan]['total'] += $pen['qty'] * $pen['harga'];
        }

        return $result;
    }

    public function getPrintPembelian()
    {
        $tawal = $this->input->get('tanggal_awal');
        $tahir = $this->input->get('tanggal_akhir');

        // Query untuk mendapatkan data penjualan
        $this->db->select('*');
        $this->db->from('tbl_pembelian');
        $this->db->join('tbl_suplier', 'tbl_suplier.id_suplier = tbl_pembelian.suplier_id');
        $this->db->where('tanggal >=', $tawal);
        $this->db->where('tanggal <=', $tahir);
        $pembelian = $this->db->get()->result_array();
        return $pembelian;
    }

    public function getFilteredPembelian($tawal, $tahir)
    {
        $this->db->select('*');
        $this->db->from('tbl_pembelian');
        $this->db->join('tbl_suplier', 'tbl_suplier.id_suplier = tbl_pembelian.suplier_id');
        $this->db->where('tanggal >=', $tawal);
        $this->db->where('tanggal <=', $tahir);
        $pembelian = $this->db->get()->result_array();


        return $pembelian;
    }

    public function getPrintTransaksi()
    {
        $tawal = $this->input->get('tanggal_awal');
        $tahir = $this->input->get('tanggal_akhir');

        // Query untuk mendapatkan data penjualan
        $this->db->select('*');
        $this->db->from('tbl_penjualan');
        $this->db->where('tanggal >=', $tawal);
        $this->db->where('tanggal <=', $tahir);
        $penjualan = $this->db->get()->result_array();
        return $penjualan;
    }
    public function getFilteredTransaksi($tawal, $tahir)
    {
        // Query untuk mendapatkan data penjualan dengan filter tanggal
        $this->db->select('*');
        $this->db->from('tbl_penjualan');
        $this->db->where('tanggal >=', $tawal);
        $this->db->where('tanggal <=', $tahir);

        $penjualan = $this->db->get()->result_array();
        return $penjualan;
    }


    public function getPrintReturn()
    {
        $tawal = $this->input->get('tanggal_awal');
        $tahir = $this->input->get('tanggal_akhir');
        $status = $this->input->get('status');

        // Query untuk mendapatkan data return
        $this->db->select('*');
        $this->db->from('tbl_return');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_return.barang_id');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.kategori_id');
        $this->db->where('tbl_return.tanggal >=', $tawal);
        $this->db->where('tbl_return.tanggal <=', $tahir);

        // Cek status
        if ($status && $status !== 'semua' && $status !== '') {
            $this->db->where('tbl_return.status', $status);
        }

        $data = $this->db->get()->result_array();

        // Debug: output query
        // echo $this->db->last_query(); 

        return $data;
    }

    public function getFilteredReturn($tawal, $tahir, $status = 'semua')
    {
        $this->db->select('*');
        $this->db->from('tbl_return');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_return.barang_id');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.kategori_id');
        $this->db->where('tbl_return.tanggal >=', $tawal);
        $this->db->where('tbl_return.tanggal <=', $tahir);

        // Cek status
        if ($status && $status !== 'semua') {
            $this->db->where('tbl_return.status', $status);
        }

        return $this->db->get()->result_array();
    }

    public function getPrintHutang()
    {
        $tawal = $this->input->get('tanggal_awal');
        $tahir = $this->input->get('tanggal_akhir');
        // Query untuk mendapatkan data penjualan
        $this->db->select('*');
        $this->db->from('tbl_hutang');
        $this->db->join('tbl_pembelian', 'tbl_pembelian.id_pembelian = tbl_hutang.pembelian_id');
        $this->db->join('tbl_suplier', 'tbl_suplier.id_suplier = tbl_pembelian.suplier_id');
        $this->db->where('tbl_pembelian .tanggal >=', $tawal);
        $this->db->where('tbl_pembelian .tanggal <=', $tahir);
        $hutang = $this->db->get()->result_array();
        return $hutang;
    }
    public function getFilteredHutang($tawal, $tahir)
    {
        // Query untuk mendapatkan data hutang berdasarkan tanggal
        $this->db->select('*');
        $this->db->from('tbl_hutang');
        $this->db->join('tbl_pembelian', 'tbl_pembelian.id_pembelian = tbl_hutang.pembelian_id');
        $this->db->join('tbl_suplier', 'tbl_suplier.id_suplier = tbl_pembelian.suplier_id');
        $this->db->where('tbl_pembelian.tanggal >=', $tawal);
        $this->db->where('tbl_pembelian.tanggal <=', $tahir);

        $hutang = $this->db->get()->result_array();
        return $hutang;
    }


    public function getPrintPiutang()
    {
        $tawal = $this->input->get('tanggal_awal');
        $tahir = $this->input->get('tanggal_akhir');
        // Query untuk mendapatkan data penjualan
        $this->db->select('*');
        $this->db->from('tbl_piutang');
        $this->db->join('tbl_penjualan', 'tbl_penjualan.id_penjualan = tbl_piutang.penjualan_id');
        $this->db->where('tbl_penjualan .tanggal >=', $tawal);
        $this->db->where('tbl_penjualan .tanggal <=', $tahir);
        $piutang = $this->db->get()->result_array();
        return $piutang;
    }
    public function getFilteredPiutang($tawal, $tahir)
    {
        // Query untuk mendapatkan data piutang berdasarkan tanggal
        $this->db->select('*');
        $this->db->from('tbl_piutang');
        $this->db->join('tbl_penjualan', 'tbl_penjualan.id_penjualan = tbl_piutang.penjualan_id');
        $this->db->where('tbl_penjualan.tanggal >=', $tawal);
        $this->db->where('tbl_penjualan.tanggal <=', $tahir);

        $piutang = $this->db->get()->result_array();
        return $piutang;
    }

    public function getPrintKeuangan()
    {
        $tawal = $this->input->get('tanggal_awal');
        $tahir = $this->input->get('tanggal_akhir');
        $status = $this->input->get('status');

        // Query untuk mendapatkan data keuangan
        $this->db->select('*');
        $this->db->from('tbl_keuangan');
        if ($tawal && $tahir) {
            $this->db->where('tanggal >=', $tawal);
            $this->db->where('tanggal <=', $tahir);
        }
        if ($status && $status != 'semua') {
            $this->db->where('status', $status);
        }
        $keuangan = $this->db->get()->result_array();


        return $keuangan;
    }

    public function getFilteredKeuangan($tawal, $tahir, $status = 'semua')
    {
        // Query untuk mendapatkan data keuangan dengan filter tanggal dan status
        $this->db->select('*');
        $this->db->from('tbl_keuangan');
        $this->db->where('tanggal >=', $tawal);
        $this->db->where('tanggal <=', $tahir);

        // Tambahkan filter status jika tidak sama dengan 'semua'
        if ($status !== 'semua' && $status !== '') {
            $this->db->where('status', $status);
        }

        $keuangan = $this->db->get()->result_array();
        return $keuangan;
    }


    public function getPrintBarangKeluar()
    {
        $tawal = $this->input->get('tanggal_awal');
        $tahir = $this->input->get('tanggal_akhir');
        $this->db->select('tbl_barang.nama_barang AS nama_barang, DATE(tbl_penjualan.tanggal) AS tanggal, SUM(tbl_penjualan_detail.qty) AS jumlah_terjual');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_penjualan_detail', 'tbl_penjualan.id_penjualan = tbl_penjualan_detail.penjualan_id');
        $this->db->join('tbl_barang', 'tbl_penjualan_detail.barang_id = tbl_barang.id_barang');
        $this->db->where('DATE(tbl_penjualan.tanggal) >=', $tawal);
        $this->db->where('DATE(tbl_penjualan.tanggal) <=', $tahir);
        $this->db->group_by('tbl_barang.nama_barang, DATE(tbl_penjualan.tanggal)');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getFilteredBarangKeluar($tawal, $tahir)
    {
        $this->db->select('tbl_barang.nama_barang AS nama_barang, DATE(tbl_penjualan.tanggal) AS tanggal, SUM(tbl_penjualan_detail.qty) AS jumlah_terjual');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_penjualan_detail', 'tbl_penjualan.id_penjualan = tbl_penjualan_detail.penjualan_id');
        $this->db->join('tbl_barang', 'tbl_penjualan_detail.barang_id = tbl_barang.id_barang');
        $this->db->where('DATE(tbl_penjualan.tanggal) >=', $tawal);
        $this->db->where('DATE(tbl_penjualan.tanggal) <=', $tahir);
        $this->db->group_by('tbl_barang.nama_barang, DATE(tbl_penjualan.tanggal)');
        $query = $this->db->get()->result_array();
        return $query;
    }
}
