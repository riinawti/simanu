<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            redirect('dashboard');
        } else {

            $this->load->view('auth/login');
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->M_pengguna->getUserBYusername($username);
        if ($query->num_rows() > 0 && password_verify($password, $query->row_array()['password'])) {
            //masuk kehalaman dashboard
            $data = [
                'user' => $query->row_array(),
            ];
            $this->session->set_userdata($data);
            $this->session->set_flashdata('pesan', 'berhasil login');
            if ($data['user']['role'] == 0) {
                redirect('penjualan');
            } else {
                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Login gagal!!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('auth');
    }
}
