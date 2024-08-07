<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suplier extends CI_Controller
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
        if ($data != null) {
            $this->load->view('admin/suplier/' . $file, $data);
        } else {
            $this->load->view('admin/suplier/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'data' => $this->M_suplier->getData()
        ];
        $this->_view('index', $data);
    }
    public function create()
    {
        $this->_view('create');
    }

    public function edit($id)
    {
        $data = [
            'data' => $this->M_suplier->getDataByID($id)
        ];
        $this->_view('edit', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('kode', 'kode', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('sales', 'sales', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->_view('create');
        } else {
            $this->M_suplier->SetData();
            $this->session->set_flashdata('pesan', 'Data suplier berhasil disimpan!!');
            redirect('suplier/index');
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('kode', 'kode', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('sales', 'sales', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'data' => $this->M_suplier->getDataByID($this->input->post('id'))
            ];
            $this->_view('edit', $data);
        } else {
            $this->M_suplier->updateData();
            $this->session->set_flashdata('pesan', 'Data suplier berhasil diupdate!!');
            redirect('suplier/index');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tbl_suplier', array('id_suplier' => $id));
        $this->session->set_flashdata('pesan', 'Data suplier berhasil dihapus!!');
        redirect('suplier/index');
    }
}
