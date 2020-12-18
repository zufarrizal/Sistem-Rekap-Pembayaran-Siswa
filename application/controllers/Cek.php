<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek extends CI_Controller
{
    public function __construct()
    {
        // Memuat Basis Konstruksi
        parent::__construct();
        // Memuat Model Sistem
        $this->load->model('Siswa_Model');
        $this->load->model('Transaksi_Model');
        $this->load->model('Kelas_Model');
    }

    public function index()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('siswa', ['niss' => $this->session->userdata('niss')])->row_array();

        // Memuat Semua Data Tabel
        $data['transaksi'] = $this->Transaksi_Model->getAllTransaksi();
        $data['kelas'] = $this->Kelas_Model->getAllKelas();
        // Tampilan Sistem
        $data['title'] = 'Transaksi Pembayaran';
        $this->load->view('template/c_header', $data);
        $this->load->view('cek/index', $data);
        $this->load->view('template/footer');
    }
}
