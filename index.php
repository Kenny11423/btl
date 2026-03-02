<?php
session_start();

/* ====== CẤU HÌNH ====== */
define("BASE_URL", "/btl/");   // đổi theo tên folder project

require_once "app/controllers/AuthController.php";
require_once "app/controllers/HomeController.php";

/* ====== ROUTING ====== */
$controller = $_GET['controller'] ?? (isset($_SESSION["user_id"]) ? 'home' : 'auth');
$action     = $_GET['action'] ?? 'login';

switch ($controller) {

    case 'auth':
        $auth = new AuthController();

        if ($action == 'login') {
            $auth->login();
        } elseif ($action == 'register') {
            $auth->register();
        } elseif ($action == 'logout') {
            $auth->logout();
        } else {
            echo "Action không tồn tại";
        }
        break;

    case 'home':
        if (!isset($_SESSION["user_id"])) {
            header("Location: index.php?controller=auth&action=login");
            exit();
        }

        $home = new HomeController();
        $home->index();
        break;

    default:
        echo "404 Not Found";
}