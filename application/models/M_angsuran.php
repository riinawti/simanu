<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_angsuran extends CI_Model
{
    public function getData()
    {
        return $this->db->get('tbl_angsuran')->result_array();
        // $this->db->select('*');
        // $this->db->from('tbl_angsuran');
        // $this->db->join('tbl_hutang', 'tbl_hutang.id_hutang = tbl_angsuran.hutang_id');
        // $this->db->join('tbl_piutang', 'tbl_piutang.id_piutang = tbl_angsuran.piutang_id');
        // $query = $this->db->get();
        // return $query->result_array();
    }
    public function getDataByID($id)
    {
        return $this->db->get_where('tbl_angsuran', array('id_angsuran' => $id))->row_array();
    }

    public function setData()
    {
        date_default_timezone_set('Asia/Makassar');
        $data = [
            'kd_angsuran' => 'AG-' . random_string('alnum', 3),
            'tanggal_bayar' => $this->input->post('tanggal_bayar'),
            'jumlah' => $this->input->post('jumlah'),
            'status' => $this->input->post('status'),
        ];
        if ($this->input->post('status') == 'hutang') {
            $data['hutang_id'] = $this->input->post('kode');
            $hutang = $this->db->get_where('tbl_hutang', ['id_hutang' => $this->input->post('kode')])->row_array();
            $data['unik'] = $hutang['kd_hutang'];
            $this->db->where('id_hutang', $hutang['id_hutang']);
            $this->db->update('tbl_hutang', [
                'sisa' => $hutang['sisa'] -  $this->input->post('jumlah')
            ]);
            $this->db->insert('tbl_keuangan', [
                'tanggal' => date("Y-m-d H:i:s"),
                'total' => $this->input->post('jumlah'),
                'status' => 'keluar',
                'keterangan' => 'bayar hutang'
            ]);
        } else {
            $data['piutang_id'] = $this->input->post('kode');
            $piutang = $this->db->get_where('tbl_piutang', ['id_piutang' => $this->input->post('kode')])->row_array();
            $data['unik'] = $piutang['kd_piutang'];
            $this->db->where('id_piutang', $piutang['id_piutang']);
            $this->db->update('tbl_piutang', [
                'sisa' => $piutang['sisa'] -  $this->input->post('jumlah')
            ]);
            $this->db->insert('tbl_keuangan', [
                'tanggal' => date("Y-m-d H:i:s"),
                'total' => $this->input->post('jumlah'),
                'status' => 'masuk',
                'keterangan' => 'bayar piutang'
            ]);
        }
        $this->db->insert('tbl_angsuran', $data);
    }

    public function updateData()
    {

        $data = [
            'tanggal_bayar' => $this->input->post('tanggal_bayar'),
            'jumlah' => $this->input->post('jumlah'),
            'status' => $this->input->post('status'),
        ];
        if ($this->input->post('status') == 'pembelian') {
            $data['hutang_id'] = $this->input->post('jenis_pembayaran');
        } else {
            $data['piutang_id'] = $this->input->post('jenis_pembayaran');
        }
        $this->db->where('id_angsuran', $this->input->post('id'));
        $this->db->update('tbl_angsuran', $data);
    }

  
}
