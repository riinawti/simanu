<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_suplier extends CI_Model
{
    public function getData()
    {
        return $this->db->get('tbl_suplier')->result_array();
    }
    public function getDataByID($id)
    {
        return $this->db->get_where('tbl_suplier', array('id_suplier' => $id))->row_array();
    }

    public function setData()
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'sales' => $this->input->post('sales'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
        ];
        $this->db->insert('tbl_suplier', $data); 
    }

    public function updateData()
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'sales' => $this->input->post('sales'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
        ];
        $this->db->where('id_suplier', $this->input->post('id')); 
        $this->db->update('tbl_suplier', $data);
    }

    public function jumlah()
    {
        return $this->db->get('tbl_suplier')->num_rows();
    }
}
