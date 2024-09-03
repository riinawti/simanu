<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembeli extends CI_Controller
{

   public function index()
   {
      $user = $this->session->userdata('user');
      if ($this->input->get('q')) {
         $barang =  $this->M_barang->searchbarang($this->input->get('q'));
      } else {
         $barang =  $this->M_barang->limitBarang();
      }

      $data = [
         'barang' => $barang,
         'orang' => $this->db->get('tbl_orang_hutang')->result_array(),
         'pembeli' => $user
      ];
      $this->load->view('layouts/header');
      $this->load->view('layouts/sidebar');
      $this->load->view('pembeli/shop', $data);
      $this->load->view('layouts/footer');
   }

   public function updateCart()
   {
      $cart_info = $_POST;
      foreach ($cart_info as $id => $cart) {
         $data = array(
            'rowid' => $cart['rowid'],
            'qty'   => $cart['qty']
         );
         $this->cart->update($data);
      }
      redirect('pembeli');
   }

   public function checkout()
   {
      $idPenjualan = $this->M_penjualan->CheckoutPembeli($this->cart->contents());
      $this->session->set_flashdata('pesan', 'Data berhasil disimpan!!');
      $this->session->unset_userdata('cart_items');
      if ($idPenjualan == 'habis') {
         $this->session->set_flashdata('error', 'Stok tidak cukup!!');
         redirect('pembeli/shop');
      } else {
         redirect('penjualan/invoice/' . $idPenjualan);
      }
   }

   public function riwayat()
   {
      $user = $this->session->userdata('user');
      $data = [
         'belanja' => $this->db->get_where('tbl_penjualan', ['nama_pembeli' => $user["nama"]])->result_array()
      ];
      $this->load->view('layouts/header');
      $this->load->view('layouts/sidebar');
      $this->load->view('pembeli/riwayat', $data);
      $this->load->view('layouts/footer');
   }
   public function detail($id)
   {
      $user = $this->session->userdata('user');

      $data = [
         'penjualan' => $this->_getDataByID($id)
      ];
      $this->load->view('layouts/header');
      $this->load->view('layouts/sidebar');
      $this->load->view('pembeli/detail', $data);
      $this->load->view('layouts/footer');
   }

   private function _getDataByID($id)
   {
      $this->db->select('*');
      $this->db->from('tbl_penjualan_detail');
      $this->db->join('tbl_penjualan', 'tbl_penjualan.id_penjualan = tbl_penjualan_detail.penjualan_id');
      $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_penjualan_detail.barang_id');
      $this->db->where('tbl_penjualan_detail.penjualan_id', $id);
      $query = $this->db->get();
      return $query->result_array();
      // return $this->db->get_where('tbl_penjualan', array('id_penjualan' => $id))->row_array();
   }
}
