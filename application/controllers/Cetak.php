<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
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

        //Memuat Semua Data Kelas
        $data['kelas'] = $this->Kelas_Model->getAllKelas();
        $data['siswa'] = $this->Siswa_Model->getAllSiswa();

        $data['title'] = 'Cetak Pembayaran';
        $this->load->view('template/header', $data);
        $this->load->view('cetak/index', $data);
        $this->load->view('template/footer');
    }

    public function perniss()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = "Cetak Per NISS";
        $data['niss'] = $this->input->post('niss');
        $data['transaksi'] = $this->Transaksi_Model->getAllTransaksi();

        $this->load->view('template/header', $data);
        $this->load->view('cetak/perniss', $data);
        $this->load->view('template/footer');
    }

    public function perkelas()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = "Cetak Per Kelas";
        $data['kls'] = $this->input->post('kelas');
        $data['transaksi'] = $this->Transaksi_Model->getAllTransaksi();

        $this->load->view('template/header', $data);
        $this->load->view('cetak/perkelas', $data);
        $this->load->view('template/footer');
    }

    public function perstatus()
    {
        // Memuat Data Pengakses
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = "Cetak Per Status";
        $data['kls'] = $this->input->post('kelas');
        $data['sts'] = $this->input->post('status');

        $data['transaksi'] = $this->Transaksi_Model->getAllTransaksi();

        $this->load->view('template/header', $data);
        $this->load->view('cetak/perstatus', $data);
        $this->load->view('template/footer');
    }
}
