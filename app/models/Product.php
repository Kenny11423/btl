<?php
require_once __DIR__ . '/../../config/database.php';

class Product {

    public static function getFeaturedProducts() {

        // Tạo object Database
        $database = new Database();

        // Lấy connection
        $conn = $database->getConnection();

        if (!$conn) {
            die("Kết nối database thất bại.");
        }

        $sql = "SELECT * FROM products 
                ORDER BY product_id ASC 
                LIMIT 5";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Lỗi query: " . mysqli_error($conn));
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public static function getAllProducts() {

    $database = new Database();
    $conn = $database->getConnection();

    $sql = "SELECT * FROM products ORDER BY product_id DESC";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
public static function getProductById($id) {

    $database = new Database();
    $conn = $database->getConnection();

    $id = intval($id);

    $sql = "SELECT p.*, 
                   b.brand_name, 
                   c.category_name
            FROM products p
            LEFT JOIN brands b ON p.brand_id = b.brand_id
            LEFT JOIN categories c ON p.category_id = c.category_id
            WHERE p.product_id = $id";


    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}
}