<?php
require_once __DIR__ . '/../models/Product.php';
class HomeController {

    public function index() {

    if (!isset($_SESSION["user_id"])) {
        header("Location: index.php?controller=auth&action=login");
        exit();
    }
    // Lấy 4 sản phẩm đầu tiên
        $featuredProducts = Product::getFeaturedProducts();

    require_once __DIR__ . '/../views/home/mainpage.php';
}
}