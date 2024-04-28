<?php

use PhpParser\Node\Expr\FuncCall;

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function login($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function level($id)
    {
        $query = "SELECT *
                  FROM level_user
                  JOIN user
                  ON user.level_user_id = level_user.id
                  WHERE user.id = $id
                  ";

        return $this->db->query($query)->row_array();
    }
}
