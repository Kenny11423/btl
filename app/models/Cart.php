<?php

class Cart {

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    // Lấy toàn bộ giỏ hàng
    public function getCart()
    {
        return $_SESSION['cart'];
    }

    // Thêm sản phẩm vào giỏ
    public function add($product)
    {
        $id = $product['id'];

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'id'       => $product['id'],
                'name'     => $product['name'],
                'price'    => $product['price'],
                'quantity' => 1
            ];
        }
    }

    // Cập nhật số lượng
    public function update($id, $quantity)
    {
        if (isset($_SESSION['cart'][$id])) {

            if ($quantity <= 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                $_SESSION['cart'][$id]['quantity'] = $quantity;
            }
        }
    }

    // Xóa 1 sản phẩm
    public function remove($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }

    // Xóa toàn bộ giỏ hàng
    public function clear()
    {
        $_SESSION['cart'] = [];
    }

    // Tính tổng tiền
    public function getTotal()
    {
        $total = 0;

        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }
}