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
        $this->db->select('*');
        $this->db->from('tbl_penjualan');
        $this->db->where('tanggal >=', $tawal);
        $this->db->where('tanggal <=', $tahir);
        $penjualan = $this->db->get()->result_array();

        // Untuk setiap penjualan, dapatkan detailnya
        foreach ($penjualan as &$pen) {
            $this->db->select('*');
            $this->db->from('tbl_penjualan_detail');
            $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_penjualan_detail.barang_id');
            $this->db->where('tbl_penjualan_detail.penjualan_id', $pen['id_penjualan']);
            $pen['detail'] = $this->db->get()->result_array();
        }

        return $penjualan;
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
    public function getPrintReturn()
    {
        $tawal = $this->input->get('tanggal_awal');
        $tahir = $this->input->get('tanggal_akhir');
        $status = $this->input->get('status');

        // Query untuk mendapatkan data penjualan
        $this->db->select('*');
        $this->db->from('tbl_return');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_return.barang_id');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.kategori_id');
        $this->db->where('tbl_return.tanggal >=', $tawal);
        $this->db->where('tbl_return.tanggal <=', $tahir);
        if ($status != "semua") {
            $this->db->where('tbl_return.status', $status);
        }
        $penjualan = $this->db->get()->result_array();
        return $penjualan;
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

    public function getPrintKeuangan()
    {
        $tawal = $this->input->get('tanggal_awal');
        $tahir = $this->input->get('tanggal_akhir');
        $status = $this->input->get('status');
        // Query untuk mendapatkan data penjualan
        $this->db->select('*');
        $this->db->from('tbl_keuangan');
        $this->db->where('tanggal >=', $tawal);
        $this->db->where('tanggal <=', $tahir);
        if ($status != 'semua') {
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
}
