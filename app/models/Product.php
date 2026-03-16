<?php
require_once __DIR__ . '/../../config/database.php';

class Product {

    public static function getFeaturedProducts() {

        $database = new Database();

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

public static function createProduct($name, $categoryId, $brandId, $price, $stock, $description, $image) {

    $database = new Database();
    $conn = $database->getConnection();

    $sql = "INSERT INTO products (product_name, category_id, brand_id, price, stock, description, image)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "siidiss",
        $name,
        $categoryId,
        $brandId,
        $price,
        $stock,
        $description,
        $image
    );

    return mysqli_stmt_execute($stmt);
}

public static function updateProduct($id, $name, $categoryId, $brandId, $price, $stock, $description, $image) {

    $database = new Database();
    $conn = $database->getConnection();

    $sql = "UPDATE products 
            SET product_name = ?, 
                category_id  = ?, 
                brand_id     = ?, 
                price        = ?, 
                stock        = ?, 
                description  = ?, 
                image        = ?
            WHERE product_id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "siidissi",
        $name,
        $categoryId,
        $brandId,
        $price,
        $stock,
        $description,
        $image,
        $id
    );

    return mysqli_stmt_execute($stmt);
}

public static function deleteProduct($id) {
    $database = new Database();
    $conn = $database->getConnection();

    $id = (int)$id;
    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    return mysqli_stmt_execute($stmt);
}
}