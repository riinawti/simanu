<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hutang extends CI_Controller
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
            $this->load->view('admin/hutang/' . $file, $data);
        } else {
            $this->load->view('admin/hutang/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'data' => $this->M_hutang->getData()
        ];
        $this->_view('index', $data);
    }

    public function edit($id)
    {
        $data = [
            'data' => $this->M_hutang->getDataByID($id)
        ];
        $this->_view('edit', $data);
    }



    public function update()
    {
        $this->form_validation->set_rules('tanggal_tempo', 'tanggal_tempo', 'required|trim');
        $this->form_validation->set_rules('total', 'total', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'data' => $this->M_hutang->getDataByID($id)
            ];
            $this->_view('edit', $data);
        } else {
            $this->M_hutang->updateData();
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate!!');
            redirect('hutang');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tbl_hutang', array('id_hutang' => $id));
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!!');
        redirect('hutang');
    }
}
