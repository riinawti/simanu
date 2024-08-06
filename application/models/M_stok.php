<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_stok extends CI_Model
{
    public function getData()
    {
        // return $this->db->get('tbl_stok_barang')->result_array();
        $this->db->select('*');
        $this->db->from('tbl_stok_barang');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_stok_barang.barang_id');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataByID($id)
    {
        return $this->db->get_where('tbl_stok_barang', array('id_stok_barang' => $id))->row_array();
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
        $this->db->insert('tbl_stok_barang', $data);
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
        $this->db->where('id_stok_barang', $this->input->post('id'));
        $this->db->update('tbl_stok_barang', $data);
    }

    public function jumlah()
    {
        return $this->db->get('tbl_stok_barang')->num_rows();
    }
}
