<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_model extends CI_Model
{
    public function konsumen()
    {
        $query = "SELECT * FROM `user` WHERE `user`.`role_id` = 3";
        return $this->db->query($query)->num_rows();
    }
    public function rumah()
    {
        $query = "SELECT `list_rumah`.`tipe_id` FROM `list_rumah`";
        return $this->db->query($query)->num_rows();
    }
    public function transaksi()
    {
        $query = "SELECT `metode_bayar`.`id` FROM `metode_bayar`";
        return $this->db->query($query)->num_rows();
    }
}
