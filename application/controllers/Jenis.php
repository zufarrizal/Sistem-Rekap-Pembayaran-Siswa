<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        // Memuat Basis Konstruksi
        parent::__construct();
        // Memuat Model Sistem
        $this->load->model('Jenis_Model');
    }

    public function index()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel Jenis
        $data['jenis'] = $this->Jenis_Model->getAllJenis();
        // Tampilan Sistem
        $data['title'] = 'Jenis Pembayaran';
        $this->load->view('template/header', $data);
        $this->load->view('jenis/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel Jenis
        $data['jenis'] = $this->Jenis_Model->getAllJenis();
        // Aturan Validasi Formulir
        $this->form_validation->set_rules('jenisp', 'Jenis Pembayara', 'required|trim|is_unique[jenis.jenisp]');
        $this->form_validation->set_rules('total', 'Total', 'required|trim');
        // Decision atau Keputusan
        if ($this->form_validation->run() == false) {
            // Tampilan Sistem
            $data['title'] = 'Tambah Jenis Pembayaran';
            $this->load->view('template/header', $data);
            $this->load->view('jenis/tambah', $data);
            $this->load->view('template/footer');
        } else {
            // Array Data Input ke Database
            $data = [
                'jenisp' => htmlspecialchars($this->input->post('jenisp'), true),
                'total' => htmlspecialchars($this->input->post('total'), true)
            ];
            // Input ke Database
            $this->db->insert('jenis', $data);
            // Dikembalikan ke Tampilan Data Jenis
            redirect('jenis');
        }
    }

    public function ubah($id)
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel Jenis
        $data['jenis'] = $this->Jenis_Model->getJenisById($id);
        // Aturan Validasi Formulir
        $this->form_validation->set_rules('jenisp', 'Jenis Pembayaran', 'required|trim');
        $this->form_validation->set_rules('total', 'Total', 'required|trim');
        // Decision atau Keputusan
        if ($this->form_validation->run() == false) {
            // Tampilan Sistem
            $data['title'] = 'Ubah Jenis';
            $this->load->view('template/header', $data);
            $this->load->view('jenis/ubah', $data);
            $this->load->view('template/footer');
        } else {
            // Mengambil Data Inputan
            $id = $this->input->post('id');
            $jenisp = htmlspecialchars($this->input->post('jenisp'), true);
            $total = htmlspecialchars($this->input->post('total'), true);
            // Set Update Database
            $this->db->set('jenisp', $jenisp);
            $this->db->set('total', $total);
            $this->db->where('id_jenis', $id);
            $this->db->update('jenis');
            // Dikembalikan Ke Data User
            redirect('jenis');
        }
    }

    public function hapus($id)
    {
        // Meload Jenis Model DeleteJenis
        $this->Jenis_Model->deleteJenis($id);
        // Dikembalikan Ke Data Jenis
        redirect('jenis');
    }
}
