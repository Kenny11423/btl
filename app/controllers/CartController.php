<?php

require_once __DIR__ . "/../models/Product.php";

class CartController {

    public function add() {

        session_start();

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
        require_once __DIR__ . "/../views/cart/index.php";
    }

    public function remove() {
        session_start();

        $id = intval($_GET['id']);
        unset($_SESSION['cart'][$id]);

        header("Location: index.php?controller=cart");
    }

    public function update() {
        session_start();

        foreach ($_POST['quantity'] as $id => $qty) {
            $_SESSION['cart'][$id]['quantity'] = max(1, intval($qty));
        }

        header("Location: index.php?controller=cart");
    }
}