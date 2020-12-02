<?php

class Transaksi_Model extends CI_model
{
    public function getAllTransaksi()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function deleteTransaksi($id)
    {
        $this->db->delete('transaksi', ['id_trx' => $id]);
    }

    public function getTransaksiById($id)
    {
        return $this->db->get_where('transaksi', ['id_trx' => $id])->row_array();
    }
}
