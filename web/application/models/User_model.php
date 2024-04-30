<?php

use PhpParser\Node\Expr\FuncCall;

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function login($id)
    {
        $query = "SELECT id, username
                  FROM user
                  WHERE id = $id
                  ";
        return $this->db->query($query)->row_array();
    }

    public function level($id)
    {
        $query = "SELECT level_user.id, level_user.name
                  FROM level_user
                  JOIN user
                  ON user.level_user_id = level_user.id
                  WHERE user.id = $id
                  ";

        return $this->db->query($query)->row_array();
    }

    public function directorate($id)
    {
        $query = "SELECT directorate.name
                  FROM directorate
                  JOIN user
                  ON user.directorate_id = directorate.id
                  WHERE user.id = $id
                  ";

        return $this->db->query($query)->row_array();
    }

    public function user_data($id)
    {
        $query = "SELECT user.id, user.username, user.level_user_id, directorate.name as directorate, level_user.name as level_user
                  FROM user
                  JOIN directorate
                  ON user.directorate_id = directorate.id
                  JOIN level_user
                  ON user.level_user_id = level_user.id
                  WHERE user.id = $id
                  ";
        return $this->db->query($query)->row_array();
    }

    public function list_users($level_user_id)
    {
        if ($level_user_id == 0) {
            $query = "SELECT username, level_user.name as level_user, directorate.name as directorate, last_login, last_logout, ip_address, is_active, is_login, user.created_at
                        FROM user
                        JOIN level_user ON user.level_user_id = level_user.id
                        JOIN directorate ON user.directorate_id = directorate.id
                        ORDER BY user.created_at
                        ";
        }
        return $this->db->query($query);
    }
}
