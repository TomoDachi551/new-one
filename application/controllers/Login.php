<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('login_view');
    }

    public function authenticate() {
        $this->load->model('Student_model');
        $this->load->model('Teacher_model');
        $this->load->model('Admin_model');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Student_model->get_by_username($username);
        $role = null;
        $user_id = null;

        if ($user && password_verify($password, $user->password_hash)) {
            $role = 'student';
            $user_id = $user->student_id;
        } else {
            $user = $this->Teacher_model->get_by_username($username);
            if ($user && password_verify($password, $user->password_hash)) {
                $role = 'teacher';
                $user_id = $user->teacher_id;
            } else {
                $user = $this->Admin_model->get_by_username($username);
                if ($user && password_verify($password, $user->password_hash)) {
                    $role = 'admin';
                    $user_id = $user->admin_id;
                }
            }
        }

        if ($role) {
            $this->session->set_userdata([
                'logged_in' => true,
                'user_id'   => $user_id,
                'role'      => $role,
                'username'  => $username
            ]);
            redirect('students');
        } else {
            $data['error'] = 'Invalid username or password';
            $this->load->view('login_view', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>