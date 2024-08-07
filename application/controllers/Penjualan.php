<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('user');
        if (!$user) {
            redirect('auth');
        }
    }

    private function _view($file, $data = null)
    {
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        if ($data) {
            $this->load->view('admin/penjualan/' . $file, $data);
        } else {
            $this->load->view('admin/penjualan/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'penjualan' => $this->M_penjualan->getData()
        ];
        $this->_view('index', $data);
    }
    public function detail($id)
    {
        $data = [
            'penjualan' => $this->M_penjualan->getDataByID($id)
        ];
        $this->_view('detail', $data);
    }

    public function create()
    {
        if ($this->input->get('q')) {
            $barang =  $this->M_barang->searchbarang($this->input->get('q'));
        } else {
            $barang =  $this->M_barang->getData();
        }

        $data = [
            'barang' => $barang,
            'orang' => $this->db->get('tbl_orang_hutang')->result_array()
        ];
        $this->_view('create', $data);
    }

    public function keranjang()
    {
        $redirect = $this->input->post('redirect_page');
        $data = [
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        ];
        $this->cart->insert($data);
        redirect($redirect, 'refresh');
    }


    public function deleteCart($rowid)
    {
        $this->cart->remove($rowid);
        redirect('penjualan/create');
    }

    // public function updateCart()
    // {
    //     echo 1;
    //     return 0;
    //     $i = 1;
    //     foreach ($this->cart->contents() as $item) {
    //         $data = array(
    //             'rowid' => $item['rowid'],
    //             'qty'   =>  $this->input->post($i . '[qty')
    //         );
    //         $this->cart->update($data);
    //         $i++;
    //     }
    //     redirect('penjualan/create');
    // }
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
        redirect('penjualan/create');
    }

    public function checkout()
    {
        $idPenjualan = $this->M_penjualan->Checkout($this->cart->contents());
        $this->session->set_flashdata('pesan', 'Data penjualan berhasil disimpan!!');
        $this->session->unset_userdata('cart_items');
        if ($idPenjualan == 'habis') {
            $this->session->set_flashdata('error', 'Stok tidak cukup!!');
            redirect('penjualan/create');
        } else {
            redirect('penjualan/invoice/' . $idPenjualan);
        }
    }



    public function delete($id)
    {
        $this->db->delete('tbl_penjualan', array('id_penjualan' => $id));
        $this->session->set_flashdata('pesan', 'Data penjualan berhasil dihapus!!');
        redirect('penjualan/index');
    }

    public function invoice($idPenjualan)
    {
        $data = [
            'invoice' => $this->M_penjualan->getDataByID($idPenjualan)
        ];
        $this->load->view('admin/penjualan/invoice', $data);
    }
}
