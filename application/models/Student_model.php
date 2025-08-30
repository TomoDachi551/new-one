<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {
    // Retrieves all rows from the students table
    public function fetch_all_students() {
        return $this->db->get('students')->result();
    }

    // Retrieves one row by student ID
    public function fetch_student_by_id($id) {
        return $this->db->get_where('students', ['student_id' => $id])->row();
    }

    // Updates the row in the DB
    public function update_student($id, $data) {
        return $this->db->where('student_id', $id)->update('students', $data);
    }

    // Retrieves one row by username
    public function get_by_username($username) {
        return $this->db->get_where('students', ['username' => $username])->row();
    }

    // Retrieves one row by email
    public function get_by_email($email) {
        return $this->db->get_where('students', ['email' => $email])->row();
    }

    // Registers a new student
    public function register($data) {
        return $this->db->insert('students', $data);
    }

    // Retrieves all rows from the students table
    public function get_all() {
        return $this->db->get('students')->result();
    }

    // Deletes a student by ID
    public function delete_student($id) {
        // Delete all grades for this student first
        $this->db->where('student_id', $id)->delete('grades');
        // Now delete the student
        return $this->db->where('student_id', $id)->delete('students');
    }
}
