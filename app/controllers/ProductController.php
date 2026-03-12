<?php

class ProductController {

    // Trang danh sách sản phẩm (mua sắm)
    public function index() {

        // Lấy tất cả sản phẩm
        $products = Product::getAllProducts();

        // Gọi view
        require_once "app/views/product/index.php";
    }


    // Trang chi tiết sản phẩm
    public function detail() {

        if (!isset($_GET['id'])) {
            die("Không tìm thấy sản phẩm.");
        }

        $id = intval($_GET['id']);

        $product = Product::getProductById($id);

        if (!$product) {
            die("Sản phẩm không tồn tại.");
        }

        require_once "app/views/product/detail.php";
    }
}