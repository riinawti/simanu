<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_Masuk extends CI_Controller
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
        // if($file != null){}
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        if ($data != null) {
            $this->load->view('admin/barang_masuk/' . $file, $data);
        } else {
            $this->load->view('admin/barang_masuk/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'data' => $this->M_barang_masuk->getData()
        ];
        $this->_view('index', $data);
    }
    public function create()
    {
        $data = [
            'kategori' => $this->M_kategori->getData(),
            'suplier' => $this->M_suplier->getData(),
            'barang' => $this->M_barang->getData(),
        ];
        $this->_view('create', $data);
    }

    public function detail($id)
    {

        $data = [
            'data' => $this->M_barang_masuk->getDataByID($id),
        ];
        $this->_view('detail', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'kategori' => $this->M_kategori->getData(),
                'suplier' => $this->M_suplier->getData(),
                'barang' => $this->M_barang->getData(),
            ];
            $this->_view('create', $data);
        } else {
            $this->M_barang_masuk->SetData();
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan!!');
            redirect('barang_masuk');
        }
    }



    public function delete($id)
    {
        $barang = $this->db->get_where('tbl_pembelian_detail', ['pembelian_id' => $id])->result_array();
        foreach ($barang as $b) {
            $this->db->set('qty', 'qty - ' . (int)$b['qty'], FALSE);
            $this->db->where('barang_id', $b['barang_id']);
            $this->db->update('tbl_stok_barang');
        }

        $this->db->delete('tbl_pembelian', array('id_pembelian' => $id));
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!!');
        redirect('barang_masuk/index');
    }
}
