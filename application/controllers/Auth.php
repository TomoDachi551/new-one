<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Show login form
    public function login() {
        include 'views/login_form.php';
    }

    // Check credentials, set session, redirect
    public function login_post() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->model->verify_password($username, $password)) {
                $user = $this->model->get_user_by_username($username);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header('Location: dashboard.php');
                exit;
            } else {
                $error = "Invalid username or password.";
                include 'views/login_form.php';
            }
        }
    }

    // Destroy session
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: Auth.php?action=login');
        exit;
    }
}