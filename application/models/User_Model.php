<?php

class User_Model extends CI_model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function deleteUser($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }
}
