<?php

require_once __DIR__ . "/../models/Product.php";

class CartController {

    public function add() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Guest phải đăng nhập trước khi thêm vào giỏ
        if (!isset($_SESSION['user_id'])) {
            $returnUrl = urlencode($_SERVER['REQUEST_URI'] ?? 'index.php?controller=products');
            header("Location: index.php?controller=auth&action=login&return={$returnUrl}");
            exit();
        }

        if (!isset($_GET['id'])) {
            header("Location: index.php");
            exit();
        }

        $id = intval($_GET['id']);

        $productModel = new Product();
        $product = $productModel->getProductById($id);

        if (!$product) {
            header("Location: index.php");
            exit();
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1
            ];
        }

        header("Location: index.php?controller=cart");
    }

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

    require_once __DIR__ . "/../models/Order.php";

    $orderModel = new Order();
    $paymentMethods = $orderModel->getPaymentMethods();

    require_once __DIR__ . "/../views/cart/index.php";
    }

    public function remove() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $id = intval($_GET['id']);
        unset($_SESSION['cart'][$id]);

        header("Location: index.php?controller=cart");
    }

    public function update() {

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_POST['checkout'])) {
        $this->checkout();
        return;
    }

    if (isset($_POST['quantity'])) {

        foreach ($_POST['quantity'] as $id => $qty) {

            if (isset($_SESSION['cart'][$id])) {

                $qty = intval($qty);

                if ($qty <= 0) {
                    unset($_SESSION['cart'][$id]);
                } else {
                    $_SESSION['cart'][$id]['quantity'] = $qty;
                }
            }
        }
    }

    $_SESSION['success'] = "Cập nhật giỏ hàng thành công!";
    header("Location: index.php?controller=cart");
    exit();
}

    public function checkout() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            $returnUrl = urlencode($_SERVER['REQUEST_URI'] ?? 'index.php?controller=cart');
            header("Location: index.php?controller=auth&action=login&return={$returnUrl}");
            exit();
        }

        if (empty($_SESSION['cart'])) {
            header("Location: index.php?controller=cart");
            exit();
        }

        if (empty($_POST['payment_id'])) {
            $_SESSION['error'] = "Vui lòng chọn phương thức thanh toán!";
            header("Location: index.php?controller=cart");
            exit();
        }

        require_once __DIR__ . "/../models/Order.php";

        $orderModel = new Order();

        $userId = $_SESSION['user_id'];
        $paymentId = intval($_POST['payment_id']);
        $cart = $_SESSION['cart'];

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Tạo đơn hàng
        $orderId = $orderModel->createOrder($userId, $total, $paymentId);

        // Lưu chi tiết đơn
        foreach ($cart as $item) {
            $orderModel->addOrderDetail(
                $orderId,
                $item['name'],
                $item['price'],
                $item['quantity']
            );
        }

        // Xoá giỏ
        unset($_SESSION['cart']);

        $_SESSION['success'] = "Thanh toán thành công!";

        header("Location: index.php?controller=pages&action=user");
    }
}