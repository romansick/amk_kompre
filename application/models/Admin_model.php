<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getRumah()
    {
        $query = "SELECT `list_rumah`.*, `lokasi_rumah`.`lokasi`, `tipe_rumah`.`kategori`, `lokasi_rumah`.`unit`
                 FROM `list_rumah`
                 JOIN `lokasi_rumah` ON  `list_rumah`.`lokasi_id` = `lokasi_rumah`.`id`
                 JOIN `tipe_rumah` ON `list_rumah`.`tipe_id` = `tipe_rumah`.`id`
       ";
        return $this->db->query($query)->result_array();
    }
    // public function getTransaksi()
    // {
    //     $query = "SELECT `metode_bayar`.*, `metode_transaksi`.`metode`, `user`.`nama`, `bank`.`nama_bank`, `bank`.`no_rek`, `bank`.`nama_pemilik`
    //               FROM `metode_bayar` 
    //               JOIN `metode_transaksi` ON `metode_transaksi`.`id` = `metode_bayar`.`metode_id`
    //               JOIN `user` ON `user`.`id` = `metode_bayar`.`user_id`
    //               JOIN `bank` ON `bank`.`id` = `metode_bayar`.`bank_id`";
    //     return $this->db->query($query)->result_array();
    // }
    public function getTransaksi()
    {
        $query = "SELECT `metode_bayar`.*, `metode_transaksi`.`metode`, `user`.`nama`, `lokasi_rumah`.`unit`
                  FROM `metode_bayar`
                  INNER JOIN `metode_transaksi` ON `metode_transaksi`.`id` = `metode_bayar`.`metode_id`
                  INNER JOIN `user` ON `user`.`id` = `metode_bayar`.`user_id`
                  INNER JOIN `lokasi_rumah` ON `lokasi_rumah`.`id` = `metode_bayar`.`lokasi_id`
                  WHERE `metode_bayar`.`user_id` = `user`.`id`";
        return $this->db->query($query)->result_array();
    }
    // public function getInvoice($id)
    // {
    //     $query = "SELECT `metode_bayar`.*, `metode_transaksi`.`metode`, `user`.`nama`, `bank`.`nama_bank`, `bank`.`no_rek`, `bank`.`nama_pemilik`
    //               FROM `metode_bayar` 
    //               JOIN `metode_transaksi` ON `metode_transaksi`.`id` = `metode_bayar`.`metode_id`
    //               JOIN `user` ON `user`.`id` = `metode_bayar`.`user_id`
    //               JOIN `bank` ON `bank`.`id` = `metode_bayar`.`bank_id`
    //               WHERE `metode_bayar`.`id` = $id";
    //     return $this->db->query($query)->row_array();
    // }
    public function getInvoice($id)
    {
        $query = "SELECT `metode_bayar`.*, `metode_transaksi`.`metode`, `user`.`nama`, `bank`.`nama_bank`, `bank`.`no_rek`, `bank`.`nama_pemilik`, `tipe_rumah`.`kategori`
                  FROM `metode_bayar` 
                  JOIN `metode_transaksi` ON `metode_transaksi`.`id` = `metode_bayar`.`metode_id`
                  JOIN `user` ON `user`.`id` = `metode_bayar`.`user_id`
                  JOIN `bank` ON `bank`.`id` = `metode_bayar`.`bank_id`
                  JOIN `tipe_rumah` ON `tipe_rumah`.`id` = `metode_bayar`.`tipe_id`
                  WHERE `metode_bayar`.`id` = $id";
        return $this->db->query($query)->row_array();
    }
    public function getUser()
    {
        $query = "SELECT `user`.*, `user_role`.`role`
                  FROM `user` JOIN `user_role` ON `user_role`.`id` = `user`.`role_id` WHERE `user`.`role_id` != 3";
        return $this->db->query($query)->result_array();
    }
    public function getUserNew()
    {
        $query = "SELECT `user`.*, `user_role`.`role`
                  FROM `user` JOIN `user_role` ON `user_role`.`id` = `user`.`role_id`
                  WHERE `user_role`.`id` != 3";
        return $this->db->query($query)->result_array();
    }
    public function getKonsumen()
    {
        $query = "SELECT `user`.*, `user_role`.`role`
                  FROM `user` JOIN `user_role` ON `user_role`.`id` = `user`.`role_id`
                  WHERE `user_role`.`id` = 3";
        return $this->db->query($query)->result_array();
    }
    public function dataKonsumen()
    {
        $query = "SELECT * FROM `user` WHERE `user`.`role_id` = 3";
        return $this->db->query($query)->result_array();
    }
    public function countRumah()
    {
        $query = "SELECT * FROM `tipe_rumah` ";
        return $this->db->query($query)->num_rows();
    }
    public function countRumahByLokasi()
    {
        $query = "SELECT * FROM `lokasi_rumah`";
        return $this->db->query($query)->num_rows();
    }
    public function countRumahById($id)
    {
        $query = "SELECT `list_rumah`.*, `tipe_rumah`.`kategori`, `lokasi_rumah`.`lokasi`
                  FROM `list_rumah` 
                  JOIN `tipe_rumah` ON `tipe_rumah`.`id` = `list_rumah`.`tipe_id`
                  JOIN `lokasi_rumah` ON `lokasi_rumah`.`id` = `list_rumah`.`lokasi_id`
                  WHERE `list_rumah`.`id` = $id";
        return $this->db->query($query)->row_array();
    }
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
