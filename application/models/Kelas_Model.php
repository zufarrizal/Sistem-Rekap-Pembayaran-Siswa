<?php

class Kelas_Model extends CI_model
{
    public function getAllKelas()
    {
        return $this->db->get('kelas')->result_array();
    }

    public function deleteKelas($id)
    {
        $this->db->delete('kelas', ['id_kelas' => $id]);
    }

    public function getKelasById($id)
    {
        return $this->db->get_where('kelas', ['id_kelas' => $id])->row_array();
    }
}
