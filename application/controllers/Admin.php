<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        // Memuat Basis Konstruksi
        parent::__construct();
        // Memuat Model Sistem
        $this->load->model('User_Model');
        // $this->load->model('Siswa_Model');
        // $this->load->model('Jenis_Model');
        // $this->load->model('Pembayaran_Model');
    }

    public function index()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel User
        $data['HUser'] = $this->db->get('user')->num_rows();
        $data['HSiswa'] = $this->db->get('siswa')->num_rows();
        $data['HKelas'] = $this->db->get('kelas')->num_rows();
        $data['HJenis'] = $this->db->get('jenis')->num_rows();
        $data['HTransaksi'] = $this->db->get('transaksi')->num_rows();
        // Tampilan Sistem
        $data['title'] = 'Dashboard';
        $this->load->view('template/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function user()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel User
        $data['users'] = $this->User_Model->getAllUser();
        // Tampilan Sistem
        $data['title'] = 'Pengguna';
        $this->load->view('template/header', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel User
        $data['users'] = $this->User_Model->getAllUser();
        // Aturan Validasi Formulir
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        // Decision atau Keputusan
        if ($this->form_validation->run() == false) {
            // Tampilan Sistem
            $data['title'] = 'Tambah Pengguna';
            $this->load->view('template/header', $data);
            $this->load->view('admin/tambah', $data);
            $this->load->view('template/footer');
        } else {
            // Array Data Input ke Database
            $data = [
                'username' => htmlspecialchars($this->input->post('username'), true),
                'name' => htmlspecialchars($this->input->post('name'), true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            // Input ke Database
            $this->db->insert('user', $data);
            // Dikembalikan ke Tampilan Data Pengguna
            redirect('admin/user');
        }
    }

    public function ubah($id)
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel User
        $data['users'] = $this->User_Model->getUserById($id);
        // Aturan Validasi Formulir
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        // Decision atau Keputusan
        if ($this->form_validation->run() == false) {
            // Tampilan Sistem
            $data['title'] = 'Ubah Pengguna';
            $this->load->view('template/header', $data);
            $this->load->view('admin/ubah', $data);
            $this->load->view('template/footer');
        } else {
            // Mengambil Data Inputan
            $id = $this->input->post('id');
            $username = htmlspecialchars($this->input->post('username'), true);
            $name = htmlspecialchars($this->input->post('name'), true);
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            // Set Update Database
            $this->db->set('username', $username);
            $this->db->set('name', $name);
            $this->db->set('password', $password);
            $this->db->where('id_user', $id);
            $this->db->update('user');
            // Dikembalikan Ke Data User
            redirect('admin/user');
        }
    }

    public function hapus($id)
    {
        // Meload User Model DeleteUser
        $this->User_Model->deleteUser($id);
        // Dikembalikan Ke Data User
        redirect('admin/user');
    }
}
