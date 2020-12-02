<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
    }
    public function index()
    {
        $data['title'] = 'Masuk | Sistem Pembayaran';
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('auth/index', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if ($user['username'] == $username) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    redirect('auth');
                }
            } else {
                redirect('auth');
            }
        } else {
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('niss');
        $this->session->unset_userdata('nama');
        redirect('auth');
    }

    public function cek()
    {
        $niss = $this->input->post('niss');

        $user = $this->db->get_where('siswa', ['niss' => $niss])->row_array();

        if ($user) {
            if ($user['niss'] == $niss) {
                $data = [
                    'niss' => $user['niss'],
                    'nama' => $user['nama']
                ];
                $this->session->set_userdata($data);
                redirect('cek');
            } else {
                redirect('auth');
            }
        } else {
            redirect('auth');
        }
    }
}
