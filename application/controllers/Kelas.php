<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        // Memuat Basis Konstruksi
        parent::__construct();
        // Memuat Model Sistem
        $this->load->model('User_Model');
        $this->load->model('Kelas_Model');
    }

    public function index()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel Kelas
        $data['kelas'] = $this->Kelas_Model->getAllKelas();
        // Tampilan Sistem
        $data['title'] = 'Kelas';
        $this->load->view('template/header', $data);
        $this->load->view('kelas/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel Kelas
        $data['kelas'] = $this->Kelas_Model->getAllKelas();
        // Aturan Validasi Formulir
        $this->form_validation->set_rules('nkelas', 'Nama Kelas', 'required|trim|numeric|is_unique[kelas.nkelas]');
        $this->form_validation->set_rules('sub', 'Sub Kelas', 'required|trim|is_unique[kelas.sub]');
        // Decision atau Keputusan
        if ($this->form_validation->run() == false) {
            // Tampilan Sistem
            $data['title'] = 'Tambah Kelas';
            $this->load->view('template/header', $data);
            $this->load->view('kelas/tambah', $data);
            $this->load->view('template/footer');
        } else {
            // Array Data Input ke Database
            $data = [
                'nkelas' => htmlspecialchars($this->input->post('nkelas'), true),
                'sub' => htmlspecialchars($this->input->post('sub'), true)
            ];
            // Input ke Database
            $this->db->insert('kelas', $data);
            // Dikembalikan ke Tampilan Data Kelas
            redirect('kelas');
        }
    }

    public function ubah($id)
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel Kelas
        $data['kelas'] = $this->Kelas_Model->getKelasById($id);
        // Aturan Validasi Formulir
        $this->form_validation->set_rules('nkelas', 'Nama Kelas', 'required|trim|numeric');
        $this->form_validation->set_rules('sub', 'Sub Kelas', 'required|trim');
        // Decision atau Keputusan
        if ($this->form_validation->run() == false) {
            // Tampilan Sistem
            $data['title'] = 'Ubah Kelas';
            $this->load->view('template/header', $data);
            $this->load->view('kelas/ubah', $data);
            $this->load->view('template/footer');
        } else {
            // Mengambil Data Inputan
            $id = $this->input->post('id');
            $nkelas = htmlspecialchars($this->input->post('nkelas'), true);
            $sub = htmlspecialchars($this->input->post('sub'), true);
            // Set Update Database
            $this->db->set('nkelas', $nkelas);
            $this->db->set('sub', $sub);
            $this->db->where('id_kelas', $id);
            $this->db->update('kelas');
            // Dikembalikan Ke Data User
            redirect('kelas');
        }
    }

    public function hapus($id)
    {
        // Meload Kelas Model DeleteKelas
        $this->Kelas_Model->deleteKelas($id);
        // Dikembalikan Ke Data Kelas
        redirect('kelas');
    }
}
