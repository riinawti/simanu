<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_return_barang extends CI_Model
{
    public function getData()
    {
        $this->db->select('*');
        $this->db->from('tbl_return');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_return.barang_id');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataByID($id)
    {
        return $this->db->get_where('tbl_return', array('id_return' => $id))->row_array();
    }
    public function searchBarang($query)
    {
        return $this->db->from('tbl_barang')->like('nama_barang', $query)->get()->result_array();
    }
    public function setData($file = null)
    {

        $data = [
            'barang_id' => $this->input->post('barang_id'),
            'qty' => $this->input->post('qty'),
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status'),
            'metode' => $this->input->post('metode')
        ];
        $this->db->insert('tbl_return', $data);
    }

    public function updateData($file = null)
    {
        $data = [
            'barang_id' => $this->input->post('barang_id'),
            'qty' => $this->input->post('qty'),
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status'),
            'metode' => $this->input->post('metode')
        ];
        $this->db->where('id_return', $this->input->post('id'));
        $this->db->update('tbl_return', $data);
    }

    public function jumlah()
    {
        return $this->db->get('tbl_barang')->num_rows();
    }
}
