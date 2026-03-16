<?php
require_once __DIR__ . '/../models/Product.php';
class HomeController {

    public function index() {
        // Guest cũng được xem trang chủ + sản phẩm nổi bật
        // Lấy 4/5 sản phẩm đầu tiên
        $featuredProducts = Product::getFeaturedProducts();

    require_once __DIR__ . '/../views/home/mainpage.php';
}
}