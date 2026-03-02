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
                LIMIT 4";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Lỗi query: " . mysqli_error($conn));
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}