<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        // Memuat Basis Konstruksi
        parent::__construct();
        // Memuat Model Sistem
        $this->load->model('User_Model');
        $this->load->model('Siswa_Model');
        $this->load->model('Kelas_Model');
    }

    public function index()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel
        $data['siswa'] = $this->Siswa_Model->getAllSiswa();
        $data['kelas'] = $this->Kelas_Model->getAllKelas();
        // Tampilan Sistem
        $data['title'] = 'Siswa';
        $this->load->view('template/header', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel
        $data['siswa'] = $this->Siswa_Model->getAllSiswa();
        $data['kelas'] = $this->Kelas_Model->getAllKelas();
        // Aturan Validasi Formulir
        $this->form_validation->set_rules('niss', 'Niss', 'required|trim|is_unique[siswa.niss]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        // Decision atau Keputusan
        if ($this->form_validation->run() == false) {
            // Tampilan Sistem
            $data['title'] = 'Tambah Siswa';
            $this->load->view('template/header', $data);
            $this->load->view('siswa/tambah', $data);
            $this->load->view('template/footer');
        } else {
            // Array Data Input ke Database
            $data = [
                'niss' => htmlspecialchars($this->input->post('niss'), true),
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'kelas' => htmlspecialchars($this->input->post('kelas'), true)
            ];
            // Input ke Database
            $this->db->insert('siswa', $data);
            // Dikembalikan ke Tampilan Data Siswa
            redirect('siswa');
        }
    }

    public function ubah($id)
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel
        $data['siswa'] = $this->Siswa_Model->getSiswaById($id);
        $data['kelas'] = $this->Kelas_Model->getAllKelas();
        // Aturan Validasi Formulir
        $this->form_validation->set_rules('niss', 'Niss', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        // Decision atau Keputusan
        if ($this->form_validation->run() == false) {
            // Tampilan Sistem
            $data['title'] = 'Ubah Siswa';
            $this->load->view('template/header', $data);
            $this->load->view('siswa/ubah', $data);
            $this->load->view('template/footer');
        } else {
            // Mengambil Data Inputan
            $id = $this->input->post('id');
            $niss = htmlspecialchars($this->input->post('niss'), true);
            $nama = htmlspecialchars($this->input->post('nama'), true);
            $kelas = htmlspecialchars($this->input->post('kelas'), true);
            // Set Update Database
            $this->db->set('niss', $niss);
            $this->db->set('nama', $nama);
            $this->db->set('kelas', $kelas);
            $this->db->where('id_siswa', $id);
            $this->db->update('siswa');
            // Dikembalikan Ke Data User
            redirect('siswa');
        }
    }

    public function hapus($id)
    {
        // Meload Siswa Model DeleteSiswa
        $this->Siswa_Model->deleteSiswa($id);
        // Dikembalikan Ke Data Siswa
        redirect('siswa');
    }
}
