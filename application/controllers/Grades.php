<?php
// filepath: c:\xampp\htdocs\student\Grades.php



class Grades extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Grade_model');
        $this->load->helper('url');
    }

    // List grades for a student
    public function index($student_id) {
        if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'teacher' && $_SESSION['role'] !== 'student')) {
            header('Location: unauthorized.php');
            exit;
        }
        $data['grades'] = $this->Grade_model->get_grades_by_student($student_id);
        $this->load->view('grades_list', $data); // $grades available in view
    }

    // Show form to add grade (teacher role only)
    public function add() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'teacher') {
            header('Location: unauthorized.php');
            exit;
        }
        $subjects = $this->subjectModel->get_all_subjects();
        $this->load->view('grade_add_form', ['subjects' => $subjects]); // $subjects available
    }

    public function report($student_id) {
        $data['grades'] = $this->Grade_model->get_grades_by_student($student_id);
        $this->load->view('grade_report_view', $data);
    }

    public function edit($id) {
        $this->load->model('Grade_model');
        $grade = $this->Grade_model->get_grade_by_id($id);
        if (!$grade) show_404();
        $this->load->view('grade_edit_view', ['grade' => $grade]);
    }

    public function update() {
        $id = $this->input->post('id');
        $data = [
            'grade' => $this->input->post('grade'),
            'semester' => $this->input->post('semester'),
            'year_level' => $this->input->post('year_level')
        ];
        $this->load->model('Grade_model');
        $this->Grade_model->update_grade($id, $data);
        $student_id = $this->input->post('student_id');
        redirect('grades/report/'.$student_id);
    }
}