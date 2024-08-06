<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{
    public function getData()
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.kategori_id');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDataByID($id)
    {
        return $this->db->get_where('tbl_barang', array('id_barang' => $id))->row_array();
    }
    public function searchBarang($query)
    {
        return $this->db->from('tbl_barang')->like('nama_barang', $query)->get()->result_array();
    }
    public function get_last_kode()
    {
        $this->db->select('kode_brg');
        $this->db->order_by('id_barang', 'DESC');
        $query = $this->db->get('tbl_barang', 1);
        return $query->row();
    }
    public function setData($file = null)
    {
        $last_kode = $this->get_last_kode();

        if ($last_kode) {
            $last_number = substr($last_kode->kode_brg, -3);
            $new_number = str_pad($last_number + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $new_number = '001';
        }

        $new_kode = 'BRG' . $new_number;

        $data = [
            'kode_brg' => $new_kode,
            'nama_barang' => $this->input->post('nama_barang'),
            'satuan' => $this->input->post('satuan'),
            'kategori_id' => $this->input->post('kategori_id'),
            'harga' => $this->input->post('harga'),
            'stok' => 0,
        ];
        if ($file != null) {
            $data['foto'] = $file;
        }
        $this->db->insert('tbl_barang', $data);
    }

    public function updateData($file = null)
    {
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'satuan' => $this->input->post('satuan'),
            'kategori_id' => $this->input->post('kategori_id'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
        ];
        if ($file != null) {
            $data['foto'] = $file;
        }
        $this->db->where('id_barang', $this->input->post('id'));
        $this->db->update('tbl_barang', $data);
    }

    public function jumlah()
    {
        return $this->db->get('tbl_barang')->num_rows();
    }
}
