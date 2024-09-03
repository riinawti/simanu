<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_piutang extends CI_Model
{
    public function getData()
    {
        // return $this->db->get('tbl_hutang')->result_array();
        $this->db->select('*');
        $this->db->from('tbl_piutang');
        $this->db->join('tbl_orang_hutang', 'tbl_orang_hutang.id_oh = tbl_piutang.oh_id');
        $this->db->join('tbl_penjualan', 'tbl_penjualan.id_penjualan = tbl_piutang.penjualan_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getOrang()
    {
        return $this->db->get('tbl_orang_hutang')->result_array();
        // $this->db->select('*');
        // $this->db->from('tbl_piutang');
        // // $this->db->join('tbl_orang_hutang', 'tbl_orang_hutang.id_oh = tbl_piutang.oh_id');
        // $query = $this->db->get();
        // return $query->result_array();
    }
    public function getOrangID($id)
    {
        // return $this->db->get('tbl_hutang')->result_array();
        $this->db->select('*');
        $this->db->from('tbl_orang_hutang');
        // $this->db->join('tbl_orang_hutang', 'tbl_orang_hutang.id_oh = tbl_piutang.oh_id');
        $this->db->where('tbl_orang_hutang.id_oh', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getDataByID($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_orang_hutang');
        $this->db->join('tbl_piutang', 'tbl_piutang.oh_id = tbl_orang_hutang.id_oh');
        $this->db->join('tbl_penjualan', 'tbl_penjualan.id_penjualan = tbl_piutang.penjualan_id');
        $this->db->where('tbl_orang_hutang.id_oh', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPiutangBYID($id)
    {
        return $this->db->get_where('tbl_piutang', ['id_piutang' => $id])->row_array();
    }

    public function setData($ktp)
    {
        $data = [
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
            'ktp' => $ktp,
        ];
        $this->db->insert('tbl_orang_hutang', $data);
    }
    public function updateOrang($ktp = null)
    {
        $data = [
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
        ];
        if ($ktp != null) {
            $data['ktp'] = $ktp;
        }
        $this->db->where('id_oh', $this->input->post('id'));
        $this->db->update('tbl_orang_hutang', $data);
    }

    public function updateData()
    {
        $data = [
            'tanggal_tempo' => $this->input->post('tanggal_tempo'),
            'total' => $this->input->post('total'),
        ];
        $this->db->where('id_piutang', $this->input->post('id'));
        $this->db->update('tbl_piutang', $data);
    }

   
}
