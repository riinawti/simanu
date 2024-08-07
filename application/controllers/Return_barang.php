<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Return_barang extends CI_Controller
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
            $this->load->view('admin/return_barang/' . $file, $data);
        } else {
            $this->load->view('admin/return_barang/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'data' => $this->M_return_barang->getData()
        ];
        $this->_view('index', $data);
    }
    public function create()
    {
        $data = [
            'barang' => $this->M_barang->getData()
        ];
        $this->_view('create', $data);
    }

    public function edit($id)
    {
        $data = [
            'data' => $this->M_return_barang->getDataByID($id),
            'barang' => $this->M_barang->getData()
        ];
        $this->_view('edit', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        $this->form_validation->set_rules('qty', 'qty', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'barang' => $this->M_barang->getData()
            ];
            $this->_view('create', $data);
        } else {
            $this->M_return_barang->SetData();
            $this->session->set_flashdata('pesan', 'Data return berhasil disimpan!!');
            redirect('return_barang');
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        $this->form_validation->set_rules('qty', 'qty', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'data' => $this->M_return_barang->getDataByID($id),
                'barang' => $this->M_barang->getData()
            ];
            $this->_view('edit', $data);
        } else {
            $this->M_return_barang->updateData();
            $this->session->set_flashdata('pesan', 'Data return berhasil diedit!!');
            redirect('return_barang');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tbl_return', array('id_return' => $id));
        $this->session->set_flashdata('pesan', 'Data return berhasil dihapus!!');
        redirect('return_barang');
    }

    public function getDataAjax()
    {
        $obat = $this->M_barang->getData();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($obat));
    }
}
