<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_Model
{

    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row(); // 1 satır döndürür
    }

}

?>