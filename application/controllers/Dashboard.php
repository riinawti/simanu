<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('dashboard', [
            'barang' => $this->_barang(),
            'suplier' => $this->_suplier(),
            'penjualan' => $this->_penjualan(),
            'pendapatan' => $this->_pendapatan(),
        ]);
        $this->load->view('layouts/footer');
    }

    private function _barang()
    {
        return $this->db->get('tbl_barang')->num_rows();
    }
    private function _suplier()
    {
        return $this->db->get('tbl_suplier')->num_rows();
    }
    private function _penjualan()
    {
        $tanggal = date('Y-m-d');
        $this->db->where('DATE(tanggal)', $tanggal);
        return $this->db->get('tbl_penjualan')->num_rows();
    }

    private function _pendapatan()
    {
        // Mendapatkan bulan dan tahun saat ini
        $current_month = date('m');
        $current_year = date('Y');

        // Query untuk mendapatkan total pengeluaran bulan ini
        $this->db->select_sum('total');
        $this->db->from('tbl_penjualan'); // Ganti 'your_table_name' dengan nama tabel Anda
        $this->db->where('MONTH(tanggal)', $current_month);
        $this->db->where('YEAR(tanggal)', $current_year);

        $query = $this->db->get();
        return $query->row()->total; // Mengembalikan total pengeluaran
    }
}
