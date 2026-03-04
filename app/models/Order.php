<?php
require_once __DIR__ . "/../../config/database.php";

class Order {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function createOrder($userId, $total, $paymentId) {

        $sql = "INSERT INTO orders (user_id, total, payment_id)
                VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "idi", $userId, $total, $paymentId);
        mysqli_stmt_execute($stmt);

        return mysqli_insert_id($this->conn);
    }

    public function addOrderDetail($orderId, $name, $price, $qty) {

        $sql = "INSERT INTO order_details (order_id, product_name, price, quantity)
                VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "isdi", $orderId, $name, $price, $qty);
        mysqli_stmt_execute($stmt);
    }
    public function getPaymentMethods()
{
    $sql = "SELECT * FROM payment_methods";
    $result = mysqli_query($this->conn, $sql);

    $methods = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $methods[] = $row;
    }

    return $methods;
}
}