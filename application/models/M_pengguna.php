<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{
    public function getUserBYusername($username)
    {
        return $this->db->get_where('tbl_pengguna', ['username' => $username]);
    }

    public function getData()
    {
        return $this->db->get('tbl_pengguna')->result_array();
    }
    public function getDataByID($id)
    {
        return $this->db->get_where('tbl_pengguna', array('id_pengguna' => $id))->row_array();
    }

    public function setData()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => password_hash('banjarbaru', PASSWORD_BCRYPT),
            'role' => $this->input->post('role'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
        ];
        $this->db->insert('tbl_pengguna', $data);
    }

    public function updateData()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => password_hash('banjarbaru', PASSWORD_BCRYPT),
            'role' => $this->input->post('role'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
        ];
        $this->db->where('id_pengguna', $this->input->post('id'));
        $this->db->update('tbl_pengguna', $data);
    }

    public function jumlah()
    {
        return $this->db->get('tbl_pengguna')->num_rows();
    }

    public function get_stok_products()
    {
        $this->db->select('nama_barang, stok');
        $this->db->from('tbl_barang'); // Sesuaikan dengan nama tabel yang sesuai
        $this->db->order_by('stok', 'DESC');
        $this->db->limit(10); // Mengambil 10 yang paling terbaru masuk ke databse
        $query = $this->db->get();
        return $query->result_array();
    }
}
