<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getKaryawan()
    {
        $query = "SELECT * from `user` WHERE `role_id` != 3";
        return $this->db->query($query)->result_array();
    }
}
