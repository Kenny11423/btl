<?php
require_once __DIR__ . "/../../config/database.php";

class Category {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllCategories() {
        $sql = "SELECT category_id, category_name FROM categories ORDER BY category_name ASC";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

