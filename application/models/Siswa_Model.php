<?php

class Siswa_Model extends CI_model
{
    public function getAllSiswa()
    {
        return $this->db->get('siswa')->result_array();
    }

    public function deleteSiswa($id)
    {
        $this->db->delete('siswa', ['id_siswa' => $id]);
    }

    public function getSiswaById($id)
    {
        return $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
    }
}
