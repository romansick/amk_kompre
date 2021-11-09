<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrasi_model extends CI_Model
{
    public function getRumah($id)
    {
        $query = "SELECT `list_rumah`.*, `tipe_rumah`.`kategori`, `lokasi_rumah`.`lokasi`
                  FROM `list_rumah` 
                  JOIN `tipe_rumah` ON `tipe_rumah`.`id` = `list_rumah`.`tipe_id`
                  JOIN `lokasi_rumah` ON `lokasi_rumah`.`id` = `list_rumah`.`lokasi_id`
                  WHERE `list_rumah`.`id` = $id";
        return $this->db->query($query)->row_array();
    }
}
