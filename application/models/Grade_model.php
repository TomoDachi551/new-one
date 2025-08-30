<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade_model extends CI_Model {
    public function get_grades_by_student($student_id) {
        $this->db->select('grades.*, subjects.name as subject_name');
        $this->db->from('grades');
        $this->db->join('subjects', 'grades.subject_id = subjects.id', 'left');
        $this->db->where('grades.student_id', $student_id);
        return $this->db->get()->result();
    }

    public function add_grade($data) {
        return $this->db->insert('grades', $data);
    }

    public function get_grade_by_id($id) {
        return $this->db->get_where('grades', ['id' => $id])->row();
    }

    public function update_grade($id, $data) {
        return $this->db->where('id', $id)->update('grades', $data);
    }
}