<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        // Memuat Basis Konstruksi
        parent::__construct();
        // Memuat Model Sistem
        $this->load->model('User_Model');
        $this->load->model('Siswa_Model');
        $this->load->model('Jenis_Model');
        $this->load->model('Kelas_Model');
        $this->load->model('Transaksi_Model');
    }

    public function index()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel
        $data['siswa'] = $this->Siswa_Model->getAllSiswa();
        $data['transaksi'] = $this->Transaksi_Model->getAllTransaksi();
        // Tampilan Sistem
        $data['title'] = 'Data Transaksi';
        $this->load->view('template/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel
        $data['siswa'] = $this->Siswa_Model->getAllSiswa();
        $data['jenis'] = $this->Jenis_Model->getAllJenis();
        $data['transaksi'] = $this->Transaksi_Model->getAllTransaksi();
        // Aturan Validasi Formulir
        $this->form_validation->set_rules('niss', 'Niss', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim');
        // Decision atau Keputusan
        if ($this->form_validation->run() == false) {
            // Tampilan Sistem
            $data['title'] = 'Tambah Transaksi';
            $this->load->view('template/header', $data);
            $this->load->view('transaksi/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $niss = htmlspecialchars($this->input->post('niss'), true);
            $jenis = htmlspecialchars($this->input->post('jenis'), true);
            $filter = array("niss" => $niss, "jenis" => $jenis);
            $trax = $this->db->get_where('transaksi', $filter)->num_rows();
            if ($trax >= 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Transaksi Sudah Pernah Ditambahkan!</div>');
                redirect('transaksi/tambah/');
            } else {
                $swa = $this->db->get_where('siswa', ['niss' => $niss])->row_array();
                $jns = $this->db->get_where('jenis', ['jenisp' => $jenis])->row_array();
                $total = $jns['total'];
                $nominal = htmlspecialchars($this->input->post('nominal'), true);
                $hitung = $total - $nominal;

                if ($hitung > 0) {
                    $status = 0;
                } else {
                    $status = 1;
                }

                // Array Data Input ke Database
                $data = [
                    'niss' => $niss,
                    'nama' => $swa['nama'],
                    'kelas' => $swa['kelas'],
                    'jenis' => $jenis,
                    'nominal' => htmlspecialchars($this->input->post('nominal'), true),
                    'status' => $status,
                    'kurang' => $hitung,
                    'tanggal' => $this->input->post('tanggal')
                ];
                // Input ke Database
                $this->db->insert('transaksi', $data);
                // Dikembalikan ke Tampilan Data Siswa
                redirect('transaksi');
            }
        }
    }

    public function ubah($id)
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // Memuat Semua Data Tabel
        $data['siswa'] = $this->Siswa_Model->getAllSiswa();
        $data['jenis'] = $this->Jenis_Model->getAllJenis();
        $data['transaksi'] = $this->Transaksi_Model->getTransaksiById($id);
        // Aturan Validasi Formulir
        $this->form_validation->set_rules('niss', 'Niss', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim');
        // Decision atau Keputusan
        if ($this->form_validation->run() == false) {
            // Tampilan Sistem
            $data['title'] = 'Ubah Transaksi';
            $this->load->view('template/header', $data);
            $this->load->view('transaksi/ubah', $data);
            $this->load->view('template/footer');
        } else {
            // Mengambil Data Inputan
            $id = $this->input->post('id');
            $niss = htmlspecialchars($this->input->post('niss'), true);
            $swa = $this->db->get_where('siswa', ['niss' => $niss])->row_array();
            $jenis = htmlspecialchars($this->input->post('jenis'), true);


            $jns = $this->db->get_where('jenis', ['jenisp' => $jenis])->row_array();
            $total = $jns['total'];
            $nominal = htmlspecialchars($this->input->post('nominal'), true);
            $hitung = $total - $nominal;

            if ($hitung > 0) {
                $status = 0;
            } else {
                $status = 1;
            }

            $tanggal = $this->input->post('tanggal');

            // Set Update Database
            $this->db->set('niss', $niss);
            $this->db->set('nama', $swa['nama']);
            $this->db->set('kelas', $swa['kelas']);
            $this->db->set('jenis', $jenis);
            $this->db->set('nominal', $nominal);
            $this->db->set('status', $status);
            $this->db->set('kurang', $hitung);
            $this->db->set('tanggal', $tanggal);
            $this->db->where('id_trx', $id);
            $this->db->update('transaksi');
            // Dikembalikan Ke Data User
            redirect('transaksi');
        }
    }

    public function hapus($id)
    {
        // Meload Transaksi Model DeleteTransaksi
        $this->Transaksi_Model->deleteTransaksi($id);
        // Dikembalikan Ke Data Transaksi
        redirect('transaksi');
    }
}
