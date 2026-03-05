<?php

require_once "app/models/User.php";

class AdminController {

    private function checkAdmin() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
            header("Location: index.php");
            exit();
        }
    }

    public function users() {

        $this->checkAdmin();

        $userModel = new User();
        $users = $userModel->getAllUsers();

        require_once "app/views/admin/profile.php";
    }

    public function changeRole() {

        $this->checkAdmin();

        $userId = $_POST['user_id'];
        $role   = $_POST['role'];

        $userModel = new User();
        $userModel->updateRole($userId, $role);

        header("Location: index.php?controller=admin&action=users");
    }
}