<?php
session_start();
/* ====== CẤU HÌNH ====== */
define("BASE_URL", "/");   // đổi theo tên folder project

require_once "app/controllers/AuthController.php";
require_once "app/controllers/HomeController.php";
require_once "app/controllers/ProductController.php";
require_once "app/controllers/CartController.php";
require_once "app/controllers/NewsController.php";
require_once "app/controllers/PageController.php";

/* ====== ROUTING ====== */
$controller = $_GET['controller'] ?? (isset($_SESSION["user_id"]) ? 'home' : 'auth');
$action     = $_GET['action'] ?? 'index';

switch ($controller) {

    case 'auth':
    $auth = new AuthController();

    if ($action == 'login' || $action == 'index') {
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

    case 'products':
        $productController = new ProductController();

    if ($action == 'detail') {
        $productController->detail();
    } else {
        $productController->index();
    }
    break;

    case 'product':
        if ($action == 'detail') {
            (new ProductController())->detail();
        }
        break;
    case 'pages':
    $page = new PageController();

    if ($action == 'about') {
        $page->about();
    } elseif ($action == 'contact') {
        $page->contact();
    }
    break;
    default:
        echo "404 Not Found";
}