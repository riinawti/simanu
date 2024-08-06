<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
            $this->load->view('admin/kategori/' . $file, $data);
        } else {
            $this->load->view('admin/kategori/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'data' => $this->M_kategori->getData()
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
            'data' => $this->M_kategori->getDataByID($id)
        ];
        $this->_view('edit', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('kode', 'kode', 'required|trim');
        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->_view('create');
        } else {
            $this->M_kategori->SetData();
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan!!');
            redirect('kategori/index');
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('kode', 'kode', 'required|trim');
        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'data' => $this->M_kategori->getDataByID($this->input->post('id'))
            ];
            $this->_view('edit', $data);
        } else {
            $this->M_kategori->updateData();
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate!!');
            redirect('kategori/index');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tbl_kategori', array('id_kategori' => $id));
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!!');
        redirect('kategori/index');
    }
}
