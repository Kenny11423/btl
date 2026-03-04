
<?php
require_once __DIR__ . "/../../config/database.php";

class News {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllNews() {

        $sql = "SELECT * FROM news ORDER BY created_at DESC";
        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getNewsById($id) {

        $sql = "SELECT * FROM news WHERE news_id=?";
        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }
}