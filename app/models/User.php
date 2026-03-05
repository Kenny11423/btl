<?php
require_once __DIR__ . "/../../config/database.php";

class User {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function checkLogin($email) {

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($this->conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
    }
    public function emailExists($email) {

    $sql = "SELECT user_id FROM users WHERE email = ?";
    $stmt = mysqli_prepare($this->conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    return $result->num_rows > 0;
}
    public function register($fullname, $email, $password) {

    $sql = "INSERT INTO users (fullname, email, password)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($this->conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $password);

    return mysqli_stmt_execute($stmt);
}
 public function getUserById($id) {

        $sql = "SELECT * FROM users WHERE user_id=?";
        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }
 public function updateProfile($id, $fullname, $phone, $address) {

        $sql = "UPDATE users 
                SET fullname=?, phone=?, address=?
                WHERE user_id=?";

        $stmt = mysqli_prepare($this->conn, $sql);

        mysqli_stmt_bind_param($stmt, "sssi",
            $fullname,
            $phone,
            $address,
            $id
        );

        return mysqli_stmt_execute($stmt);
    }
public function getOrderHistory($userId) {

    $sql = "SELECT * FROM orders 
            WHERE user_id = ? 
            ORDER BY created_at DESC";

    $stmt = mysqli_prepare($this->conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
public function logout() {

    session_start();        // đảm bảo session đang mở
    session_unset();        // xóa toàn bộ biến session
    session_destroy();      // hủy session

    header("Location: index.php?controller=auth&action=login");
    exit();
}
public function getAllUsers()
{
    $sql = "SELECT * FROM users ORDER BY user_id DESC";

    $result = mysqli_query($this->conn, $sql);

    $users = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    return $users;
}
public function updateRole($userId, $role) {

    $sql = "UPDATE users SET role=? WHERE user_id=?";

    $stmt = mysqli_prepare($this->conn, $sql);

    mysqli_stmt_bind_param($stmt, "si", $role, $userId);

    return mysqli_stmt_execute($stmt);
}
}