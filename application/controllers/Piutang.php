<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Piutang extends CI_Controller
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
            $this->load->view('admin/piutang/' . $file, $data);
        } else {
            $this->load->view('admin/piutang/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'data' => $this->M_piutang->getOrang()
        ];
        $this->_view('index', $data);
    }
    public function create()
    {
        $this->_view('create');
    }
    public function detail($idPiutang)
    {
        // var_dump($this->M_piutang->getDataByID($idPiutang));
        // die;
        $data = [
            'data' => $this->M_piutang->getDataByID($idPiutang)
        ];
        $this->_view('detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'data' => $this->M_piutang->getPiutangBYID($id)
        ];
        $this->_view('edit', $data);
    }
    public function editOrang($id)
    {
        $data = [
            'data' => $this->M_piutang->getOrangID($id)
        ];
        $this->_view('edit-orang', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules('tanggal_tempo', 'tanggal_tempo', 'required|trim');
        $this->form_validation->set_rules('total', 'total', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'data' => $this->M_piutang->getDataByID($id)
            ];
            $this->_view('edit', $data);
        } else {
            $this->M_piutang->updateData();
            $this->session->set_flashdata('pesan', 'Data piutang berhasil diupdate!!');
            redirect('piutang');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tbl_piutang', array('id_piutang' => $id));
        $this->session->set_flashdata('pesan', 'Data piutang berhasil dihapus!!');
        redirect('piutang');
    }
    public function deleteOrang($id)
    {
        $this->db->delete('tbl_orang_hutang', array('id_oh' => $id));
        $this->session->set_flashdata('pesan', 'Data orang piutang berhasil dihapus!!');
        redirect('piutang');
    }
    public function store()
    {
        $this->form_validation->set_rules('nik', 'nik', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->_view('create');
        } else {
            $config['upload_path']          = FCPATH . '/public/ktp';
            $config['allowed_types']        = 'png|jpg|jepg';
            $config['max_size']             = 2200;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ktp')) {
                // saat gagal, tampilkan pesan error
                $result = [
                    'error' => $this->upload->display_errors()
                ];
                $this->_view('create', $result);
            } else {
                // saat berhasil ambil datanya
                $uploaded_data = $this->upload->data();
                $file_name = $uploaded_data['file_name'];
                $this->M_piutang->SetData($file_name);
                $this->session->set_flashdata('pesan', 'Data orang berhasil disimpan!!');
                redirect('piutang');
            }
        }
    }
    public function updateOrang()
    {
        $this->form_validation->set_rules('nik', 'nik', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'data' => $this->M_piutang->getOrangID($id)
            ];
            $this->_view('edit-orang', $data);
        } else {
            $file_name = '';
            $config['upload_path']          = FCPATH . '/public/ktp';
            $config['allowed_types']        = 'png|jpg|jepg';
            $config['max_size']             = 2200;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ktp')) {
                // saat gagal, tampilkan pesan error
                $result = [
                    'error' => $this->upload->display_errors(),
                    'data' => $this->M_piutang->getOrangID($this->input->post('id'))
                ];
                $this->_view('edit-orang', $result);
            } else {
                // saat berhasil ambil datanya
                $uploaded_data = $this->upload->data();
                $file_name = $uploaded_data['file_name'];
            }
            if ($file_name != '') {
                $this->M_piutang->updateOrang($file_name);
            } else {
                $this->M_piutang->updateOrang();
            }
            $this->session->set_flashdata('pesan', 'Data orang piutang berhasil diedit!!');
            redirect('piutang');
        }
    }
}
