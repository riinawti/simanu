<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penjualan extends CI_Model
{
    public function getData()
    {
        // $this->db->select('tanggal_penjualan, sum(total_bayar) as total_pendapatan');
        // $this->db->from('tbl_penjualan');
        // $this->db->group_by('tanggal_penjualan');
        // $query = $this->db->get();
        // return $query->result_array();
        return $this->db->get('tbl_penjualan')->result_array();
    }
    public function getDataByID($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_penjualan_detail');
        $this->db->join('tbl_penjualan', 'tbl_penjualan.id_penjualan = tbl_penjualan_detail.penjualan_id');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_penjualan_detail.barang_id');
        $this->db->where('tbl_penjualan_detail.penjualan_id', $id);
        $query = $this->db->get();
        return $query->result_array();
        // return $this->db->get_where('tbl_penjualan', array('id_penjualan' => $id))->row_array();
    }

    public function getDataByPenjualanID($id)
    {
        return $this->db->get_where('tbl_penjualan', ['id_penjualan' => $id])->row_array();
    }

    public function Checkout($result)
    {
        //cek stok obat
        $cek = false;
        foreach ($result as $r) {
            $stok_barang = $this->db->get_where('tbl_barang', ['id_barang' => $r['id']])->row_array();
            $cekStok = $stok_barang['stok'] - $r['qty'];
            if ($cekStok < 0) {
                $cek = true;
                break;
            }
        }
        // var_dump($cek);
        if ($cek == true) {
            return 'habis';
        } else {
            return   $this->_berhasilJual($result);
        }
    }

    private function _berhasilJual($result)
    {
        date_default_timezone_set('Asia/Makassar');
        $totalBayar = 0;
        foreach ($result as $r) {
            $totalBayar += $r['subtotal'];
        }

        $dataPenjualan = [
            'kd_penjualan' => 'PJ' . random_string('alnum', 3) . '-' . date('dmy'),
            'nama_pembeli' => $this->input->post('nama'),
            'tanggal' => date('Y-m-d H:i:s'),
            'metode' => $this->input->post('metode'),
            'pengantaran' => $this->input->post('pengantaran'),
            'status_pengantaran' => 'proses',
            'total' => $totalBayar,
            'diskon' => $this->input->post('diskon'),
            'total_bayar' => $this->input->post('total_bayar')
        ];
        $this->db->insert('tbl_penjualan', $dataPenjualan);
        $idPenjualan = $this->db->insert_id();

        foreach ($result as $r) {
            $this->db->insert('tbl_penjualan_detail', [
                'penjualan_id' => $idPenjualan,
                'barang_id' => $r['id'],
                'qty' => $r['qty'],
            ]);
            $this->cart->remove($r['rowid']);
            $stok_barang = $this->db->get_where('tbl_barang', ['id_barang' => $r['id']])->row_array();
            $this->db->where('id_barang', $r['id']);
            $this->db->update('tbl_barang', [
                'stok' => $stok_barang['stok'] - $r['qty']
            ]);
            // Ambil stok terbaru setelah update
            // $this->db->select('qty');
            // $this->db->where('barang_id', $r['id']);
            // $query = $this->db->get('tbl_stok_barang');
            // $stok_terbaru = $query->row_array()['qty'];
            // if ($stok_terbaru == 0) {
            //     $this->db->where('id_barang', $r['id']);
            //     $this->db->update('tbl_barang', [
            //         'status' => 'habis'
            //     ]);
            // }
        }
        if ($this->input->post('metode') == 'kredit') {
            $this->db->insert('tbl_piutang', [
                'kd_piutang' => 'PU-' . random_string('alnum', 3),
                'penjualan_id' => $idPenjualan,
                'total' => $totalBayar,
                'sisa' =>  $totalBayar,
                'oh_id' => $this->input->post('oh_id')
            ]);
        }
        date_default_timezone_set('Asia/Makassar');
        $this->db->insert('tbl_keuangan', [
            'tanggal' => date("Y-m-d H:i:s"),
            'total' => $totalBayar,
            'status' => 'masuk',
            'keterangan' => 'penjualan'
        ]);
        return $idPenjualan;
    }

    public function updateData()
    {
        $data = [
            'pengantaran' => $this->input->post('pengantaran'),
            'status_pengantaran' => $this->input->post('status_pengantaran'),
        ];
        $this->db->where('id_penjualan', $this->input->post('id'));
        $this->db->update('tbl_penjualan', $data);
    }

    public function jumlah()
    {
        return $this->db->get('tbl_penjualan')->num_rows();
    }

    public function getDataPengantaran()
    {
        return $this->db->get_where('tbl_penjualan', ['pengantaran !=' => ''])->result_array();
    }
}
