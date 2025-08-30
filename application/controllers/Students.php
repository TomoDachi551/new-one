<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->model('Course_model');
        $this->load->helper('url');
    }

    // List all students
    public function index() {
        $data['students'] = $this->Student_model->fetch_all_students();
        $this->load->view('students_list', $data);
    }

    // Show edit form for a student
    public function edit($id) {
        $data['student'] = $this->Student_model->fetch_student_by_id($id);
        $data['courses'] = $this->Course_model->get_all_courses();
        if (!$data['student']) show_404();
        $this->load->view('student_edit', $data);
    }

    // Handle update
    public function update() {
        $id = $this->input->post('student_id');
        $data = [
            'fullname'       => $this->input->post('fullname'),
            'email'          => $this->input->post('email'),
            'course'         => $this->input->post('course'),
            'year_level'     => $this->input->post('year_level'),
            'address'        => $this->input->post('address'),
            'contact_number' => $this->input->post('contact_number')
        ];
        $this->Student_model->update_student($id, $data);
        redirect('students');
    }

    // Delete a student
    public function delete($id) {
        $this->Student_model->delete_student($id);
        redirect('students');
    }
}