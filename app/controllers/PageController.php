<?php

class PageController
{
    public function about()
    {
        require_once "app/views/pages/about.php";
    }

    public function contact()
    {
        require_once "app/views/pages/contact.php";
    }
     public function user() {

        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $userModel = new User();
        $userId = $_SESSION['user_id'];

        // Nếu submit form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $fullname = $_POST['fullname'];
            $phone    = $_POST['phone'];
            $address  = $_POST['address'];

            $userModel->updateProfile($userId, $fullname, $phone, $address);

            header("Location: index.php?controller=pages&action=user");
            exit();
        }

        $user = $userModel->getUserById($userId);

        require_once "app/views/pages/user.php";
    }
}