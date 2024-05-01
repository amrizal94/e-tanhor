<?php


defined('BASEPATH') or exit('No direct script access allowed');
class Polda_model extends CI_Model
{
    public function list_polda($level_user_id)
    {
        if ($level_user_id == 0) {
            $query = "SELECT *
            FROM polda
            ";
            return $this->db->query($query);
        }
    }
}
