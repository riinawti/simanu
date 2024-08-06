<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengantaran extends CI_Controller
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
            $this->load->view('admin/pengantaran/' . $file, $data);
        } else {
            $this->load->view('admin/pengantaran/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'data' => $this->M_penjualan->getDataPengantaran()
        ];
        $this->_view('index', $data);
    }


    public function edit($id)
    {
        $data = [
            'data' => $this->M_penjualan->getDataByPenjualanID($id)
        ];
        $this->_view('edit', $data);
    }

    public function update()
    {
        $this->M_penjualan->updateData();
        $this->session->set_flashdata('pesan', 'Data berhasil diupdate!!');
        redirect('pengantaran');
    }
}
