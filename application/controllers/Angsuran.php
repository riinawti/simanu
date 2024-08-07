<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran extends CI_Controller
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
            $this->load->view('admin/angsuran/' . $file, $data);
        } else {
            $this->load->view('admin/angsuran/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'data' => $this->M_angsuran->getData()
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
            'data' => $this->M_angsuran->getDataByID($id)
        ];
        $this->_view('edit', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('tanggal_bayar', 'tanggal_bayar', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->_view('create');
        } else {

            $this->M_angsuran->SetData();
            $this->session->set_flashdata('pesan', 'Data angsuran berhasil disimpan!!');
            redirect('angsuran');
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('tanggal_bayar', 'tanggal_bayar', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->_view('edit');
        } else {
            $this->M_angsuran->updateData();
            $this->session->set_flashdata('pesan', 'Data angsuran berhasil diupdate!!');
            redirect('angsuran');
        }
    }

    public function delete($id)
    {
        $angsuran = $this->db->get_where('tbl_angsuran', ['id_angsuran' => $id])->row_array();
        if ($angsuran['status'] == 'hutang') {
            $hutang = $this->db->get_where('tbl_hutang', ['id_hutang' => $angsuran['hutang_id']])->row_array();
            $this->db->where('id_hutang', $hutang['id_hutang']);
            $this->db->update('tbl_hutang', [
                'sisa' => $hutang['sisa'] +  $angsuran['jumlah']
            ]);
        } else {
            $piutang = $this->db->get_where('tbl_piutang', ['id_piutang' => $angsuran['hutang_id']])->row_array();
            $this->db->where('id_piutang', $piutang['id_piutang']);
            $this->db->update('tbl_piutang', [
                'sisa' => $piutang['sisa'] +  $angsuran['jumlah']
            ]);
        }
        $this->db->delete('tbl_angsuran', array('id_angsuran' => $id));
        $this->session->set_flashdata('pesan', 'Data angsuran berhasil dihapus!!');
        redirect('angsuran');
    }

    public function getData()
    {
        $opt = $this->input->post('jenis');
        if ($opt == 'hutang') {
            $data = $this->M_hutang->getData();
        } else {
            $data = $this->M_piutang->getData();
        }
        echo json_encode($data);
    }
}
