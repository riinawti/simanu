<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    public function getData()
    {
        return $this->db->get('tbl_kategori')->result_array();
    }
    public function getDataByID($id)
    {
        return $this->db->get_where('tbl_kategori', array('id_kategori' => $id))->row_array();
    }

    public function setData()
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'kategori' => $this->input->post('kategori'),
        ];
        $this->db->insert('tbl_kategori', $data);
    }

    public function updateData()
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'kategori' => $this->input->post('kategori'),
        ];
        $this->db->where('id_kategori', $this->input->post('id'));
        $this->db->update('tbl_kategori', $data);
    }

    public function jumlah()
    {
        return $this->db->get('tbl_kategori')->num_rows();
    }
}
