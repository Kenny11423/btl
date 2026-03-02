<?php
class HomeController {

    public function index() {

    if (!isset($_SESSION["user_id"])) {
        header("Location: index.php?controller=auth&action=login");
        exit();
    }

    require_once __DIR__ . '/../views/home/mainpage.php';
}
}