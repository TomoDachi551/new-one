<?php
// filepath: c:\xampp\htdocs\student\Admin.php

require_once 'UserModel.php';

class Admin {
    private $userModel;

    public function __construct($db_conn) {
        $this->userModel = new UserModel($db_conn);
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Admin dashboard
    public function index() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: unauthorized.php');
            exit;
        }
        include 'views/admin_dashboard.php';
    }

    // Show all users, manage roles
    public function manage_users() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: unauthorized.php');
            exit;
        }
        $users = [];
        $stmt = $this->userModel->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        include 'views/manage_users.php';
    }
}