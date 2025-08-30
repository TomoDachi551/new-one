<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function index() {
        $this->load->helper('url');
        $this->load->model('Course_model');
        $data['courses'] = $this->Course_model->get_all_courses();
        $this->load->view('register_view', $data);
    }

    public function submit() {
        $this->load->helper('url');
        $role = $this->input->post('role');
        $username = $this->input->post('username');
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm  = $this->input->post('confirm');
        $fullname = $this->input->post('fullname');
        $address  = $this->input->post('address');
        $contact_number = $this->input->post('contact_number');

        // Load the correct model
        if ($role === 'student') {
            $this->load->model('Student_model');
            $model = $this->Student_model;
        } elseif ($role === 'teacher') {
            $this->load->model('Teacher_model');
            $model = $this->Teacher_model;
        } else {
            $this->load->model('Admin_model');
            $model = $this->Admin_model;
        }

        // Check for duplicate username/email
        if ($model->get_by_username($username)) {
            $data['error'] = 'Username already exists';
            $this->load->model('Course_model');
            $data['courses'] = $this->Course_model->get_all_courses();
            $this->load->view('register_view', $data);
            return;
        }
        if ($model->get_by_email($email)) {
            $data['error'] = 'Email already exists';
            $this->load->model('Course_model');
            $data['courses'] = $this->Course_model->get_all_courses();
            $this->load->view('register_view', $data);
            return;
        }
        if ($password !== $confirm) {
            $data['error'] = 'Passwords do not match';
            $this->load->model('Course_model');
            $data['courses'] = $this->Course_model->get_all_courses();
            $this->load->view('register_view', $data);
            return;
        }

        // Prepare data for each role
        $user_data = [
            'username'      => $username,
            'email'         => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'fullname'      => $fullname,
            'address'       => $address,
            'contact_number'=> $contact_number,
        ];
        if ($role === 'student') {
            $student_data = [
                'username'      => $username,
                'email'         => $email,
                'password_hash' => password_hash($password, PASSWORD_DEFAULT),
                'fullname'      => $fullname,
                'course'        => $this->input->post('course'),
                'year_level'    => $this->input->post('year_level'),
                'address'       => $address,
                'contact_number'=> $contact_number
            ];
            $this->Student_model->register($student_data);
            $student_id = $this->db->insert_id();

            $this->load->model('Grade_model');
            $subject_ids = [1, 2, 3];
            $semesters = ['1st Sem', '2nd Sem'];
            $year_levels = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
            $possible_grades = [1, 2, 3, 4, 5];

            $grades = [];
            foreach ($subject_ids as $subject_id) {
                $grade_value = $possible_grades[array_rand($possible_grades)];
                $grades[] = $grade_value;
                $grade_data = [
                    'student_id' => $student_id,
                    'subject_id' => $subject_id,
                    'grade'      => $grade_value,
                    'semester'   => $semesters[array_rand($semesters)],
                    'year_level' => $year_levels[array_rand($year_levels)]
                ];
                $this->Grade_model->add_grade($grade_data);
            }

            // Calculate total/average grade
            $total_grade = array_sum($grades) / count($grades);
            $grade_data = [
                'student_id' => $student_id,
                'subject_id' => 0, // 0 means total/average
                'grade'      => $total_grade,
                'semester'   => 'Total',
                'year_level' => ''
            ];
            $this->Grade_model->add_grade($grade_data);
        } elseif ($role === 'teacher') {
            $user_data['department'] = $this->input->post('department');
            $model->register($user_data);
        } else {
            $model->register($user_data);
        }

        $data['success'] = 'Registration successful! You can now log in.';
        $this->load->model('Course_model');
        $data['courses'] = $this->Course_model->get_all_courses();
        $this->load->view('register_view', $data);
        redirect('students');
    }
}
?>