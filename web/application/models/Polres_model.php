<?php


defined('BASEPATH') or exit('No direct script access allowed');
class Polres_model extends CI_Model
{
    public function list_polres($level_user_id, $polda_id)
    {
        if ($level_user_id == 0) {
            $query = "SELECT *
            FROM polres
            ";
        } elseif ($level_user_id == 1) {
            $query = "SELECT *
            FROM polres
            WHERE polda_id = $polda_id
            ";
        }

        return $this->db->query($query)->row_array();
    }
}
