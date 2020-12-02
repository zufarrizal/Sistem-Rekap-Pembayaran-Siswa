<?php

class Jenis_Model extends CI_model
{
    public function getAllJenis()
    {
        return $this->db->get('jenis')->result_array();
    }

    public function deleteJenis($id)
    {
        $this->db->delete('jenis', ['id_jenis' => $id]);
    }

    public function getJenisById($id)
    {
        return $this->db->get_where('jenis', ['id_jenis' => $id])->row_array();
    }
}
