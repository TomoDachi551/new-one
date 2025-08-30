<?php
// filepath: c:\xampp\htdocs\student\User_model.php

class User_model extends CI_Model

{
    
    public function __construct() {
        parent::__construct();
    }

    // Get user by username
    public function get_user_by_username($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Create a new user
    public function create_user($data) {
        $stmt = $this->conn->prepare(
            "INSERT INTO users (username, email, password_hash, role, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())"
        );
        $stmt->bind_param(
            "ssss",
            $data['username'],
            $data['email'],
            $data['password_hash'],
            $data['role']
        );
        return $stmt->execute();
    }

    public function register($data) {
        return $this->db->insert('users', $data);
    }

    public function get_all_users() {
    return $this->db->get('users')->result();
}

    public function get_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }
    
    // Verify password for a username
    public function verify_password($username, $password) {
        $user = $this->get_user_by_username($username);
        if ($user && password_verify($password, $user['password_hash'])) {
            return true;
        }
        return false;
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function update_user($id, $data) {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function delete_user($id) {
        return $this->db->where('id', $id)->delete('users');
    }
}

?>