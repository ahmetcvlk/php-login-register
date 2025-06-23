<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

    public function insert_message($user_id, $message)
    {
        $data = [
            'user_id' => $user_id,
            'message' => $message
        ];
        return $this->db->insert('messages', $data);
    }
}
