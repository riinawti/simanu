<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
            $this->load->view('admin/barang/' . $file, $data);
        } else {
            $this->load->view('admin/barang/' . $file);
        }
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        $data = [
            'data' => $this->M_barang->getData()
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
            'data' => $this->M_barang->getDataByID($id),
            'kategori' => $this->M_kategori->getData()
        ];
        $this->_view('edit', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_barang', 'nama barang', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'kategori' => $this->M_kategori->getData()
            ];
            $this->_view('create', $data);
        } else {
            $config['upload_path']          = FCPATH . '/public/barang';
            $config['allowed_types']        = 'png|jpg|jepg';
            $config['max_size']             = 2200;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                // saat gagal, tampilkan pesan error
                $result = [
                    'error' => $this->upload->display_errors()
                ];
                $this->_view('create', $result);
            } else {
                // saat berhasil ambil datanya
                $uploaded_data = $this->upload->data();
                $file_name = $uploaded_data['file_name'];
                $this->M_barang->SetData($file_name);
                $this->session->set_flashdata('pesan', 'Data barang berhasil disimpan!!');
                redirect('barang');
            }
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_barang', 'nama barang', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');
        $this->form_validation->set_rules('stok', 'stok', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = [
                'data' => $this->M_barang->getDataByID($id),
                'kategori' => $this->M_kategori->getData()
            ];
            $this->_view('edit', $data);
        } else {
            $file_name = '';
            $config['upload_path']          = FCPATH . '/public/barang';
            $config['allowed_types']        = 'png|jpg|jepg';
            $config['max_size']             = 2200;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                // saat gagal, tampilkan pesan error
                $result = [
                    'data' => $this->M_barang->getDataByID($id),
                    'kategori' => $this->M_kategori->getData(),
                    'error' => $this->upload->display_errors()
                ];
                $this->_view('edit', $data);
            } else {
                // saat berhasil ambil datanya
                $uploaded_data = $this->upload->data();
                $file_name = $uploaded_data['file_name'];
            }
            if ($file_name != '') {
                $this->M_barang->updateData($file_name);
            } else {
                $this->M_barang->updateData();
            }
            $this->session->set_flashdata('pesan', 'Data barang berhasil diedit!!');
            redirect('barang');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tbl_barang', array('id_barang' => $id));
        $this->session->set_flashdata('pesan', 'Data barang berhasil dihapus!!');
        redirect('barang/index');
    }

    public function getDataAjax()
    {
        $obat = $this->M_barang->getData();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($obat));
    }
}
