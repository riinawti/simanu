<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    private function _view($file, $data = null)
    {
        // if($file != null){}
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        if ($data != null) {
            $this->load->view('admin/pengguna/' . $file, $data);
        } else {
            $this->load->view('admin/pengguna/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'data' => $this->M_pengguna->getData()
        ];
        $this->_view('index', $data);
    }
    public function create()
    {
        $data = [
            'kategori' => $this->M_kategori->getData()
        ];
        $this->_view('create', $data);
    }

    public function edit($id)
    {
        $data = [
            'data' => $this->M_pengguna->getDataByID($id),
        ];
        $this->_view('edit', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->_view('create');
        } else {
            $this->M_pengguna->SetData();
            $this->session->set_flashdata('pesan', 'Data pengguna berhasil disimpan!!');
            redirect('pengguna');
        }
    }


    public function update()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'data' => $this->M_pengguna->getDataByID($this->input->post('id')),
            ];
            $this->_view('edit', $data);
        } else {
            $this->M_pengguna->updateData();
            $this->session->set_flashdata('pesan', 'Data pengguna berhasil diupdate!!');
            redirect('pengguna');
        }
    }
    public function delete($id)
    {
        $this->db->delete('tbl_barang', array('id_barang' => $id));
        $this->session->set_flashdata('pesan', 'Data pengguna berhasil dihapus!!');
        redirect('barang/index');
    }
}
