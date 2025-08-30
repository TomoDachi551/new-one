<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        $role = $this->session->userdata('role');
        $users = [];

        if ($role === 'student') {
            $this->load->model('Student_model');
            $users = $this->Student_model->get_all();
        } elseif ($role === 'teacher') {
            $this->load->model('Teacher_model');
            $users = $this->Teacher_model->get_all();
        } elseif ($role === 'admin') {
            $this->load->model('Admin_model');
            $users = $this->Admin_model->get_all();
        }

        $data['users'] = $users;
        $data['role'] = $role;
        $this->load->view('dashboard_view', $data);
    }
}
?>