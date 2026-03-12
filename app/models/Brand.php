<?php
require_once __DIR__ . "/../../config/database.php";

class Brand {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllBrands() {
        $sql = "SELECT brand_id, brand_name FROM brands ORDER BY brand_name ASC";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

