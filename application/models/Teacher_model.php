<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_model extends CI_Model {
    public function register($data) {
        return $this->db->insert('teachers', $data);
    }
    public function get_by_username($username) {
        return $this->db->get_where('teachers', ['username' => $username])->row();
    }
    public function get_by_email($email) {
        return $this->db->get_where('teachers', ['email' => $email])->row();
    }
    public function get_all() {
        return $this->db->get('teachers')->result();
    }
}
?>