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
$controller = $_GET['controller'] ?? 'home';
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
    }elseif ($action == 'user') {
        $page->user();
    }
    break;
    case 'news':
    $news = new NewsController();

    if ($action == 'detail') {
        $news->detail();
    } else {
        $news->index();
    }
    break;
    case 'cart':
    $cart = new CartController();

    if ($action == 'add') {
        $cart->add();
    } elseif ($action == 'remove') {
        $cart->remove();
    } elseif ($action == 'update') {
        $cart->update();
    } elseif ($action == 'checkout') {
        $cart->checkout();
    } else {
        $cart->index();
    }
    break;
    case "admin":

    require_once "app/controllers/AdminController.php";

    $controller = new AdminController();

    if ($action == "dashboard") {
        $controller->dashboard();
    } elseif ($action == "addProduct") {
        $controller->addProduct();
    } elseif ($action == "addNews") {
        $controller->addNews();
    } elseif ($action == "changeRole") {
        $controller->changeRole();
    } else {
        $controller->users();
    }

break;
    default:
        echo "404 Not Found";
}