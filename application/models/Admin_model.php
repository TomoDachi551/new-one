<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function register($data) {
        return $this->db->insert('admins', $data);
    }
    public function get_by_username($username) {
        return $this->db->get_where('admins', ['username' => $username])->row();
    }
    public function get_by_email($email) {
        return $this->db->get_where('admins', ['email' => $email])->row();
    }
    public function get_all() {
        return $this->db->get('admins')->result();
    }
}
?>