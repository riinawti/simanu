<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_keluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('user');
        if (!$user) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->db->select('tbl_barang.nama_barang AS nama_barang, DATE(tbl_penjualan.tanggal) AS tanggal, SUM(tbl_penjualan_detail.qty) AS jumlah_terjual');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_penjualan_detail', 'tbl_penjualan.id_penjualan = tbl_penjualan_detail.penjualan_id');
        $this->db->join('tbl_barang', 'tbl_penjualan_detail.barang_id = tbl_barang.id_barang');
        $this->db->group_by('tbl_barang.nama_barang, DATE(tbl_penjualan.tanggal)');

        $query = $this->db->get();
        $result = $query->result_array();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/barang_keluar/index', [
            'data' => $result
        ]);
        $this->load->view('layouts/footer');
    }
}
