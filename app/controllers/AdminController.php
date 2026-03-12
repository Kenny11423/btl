<?php

require_once "app/models/User.php";
require_once "app/models/Product.php";
require_once "app/models/News.php";

class AdminController {

    private function checkAdmin() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
            header("Location: index.php");
            exit();
        }
    }

    public function users() {

        $this->checkAdmin();

        $userModel = new User();
        $users = $userModel->getAllUsers();

        require_once "app/views/admin/profile.php";
    }

    public function dashboard() {
        $this->checkAdmin();

        $userModel = new User();
        $users = $userModel->getAllUsers();
        $totalUsers = count($users);

        $totalAdmins = 0;
        foreach ($users as $u) {
            if (($u['role'] ?? '') === 'admin') {
                $totalAdmins++;
            }
        }
        $totalCustomers = $totalUsers - $totalAdmins;

        require_once "app/views/admin/dashboard.php";
    }

    public function changeRole() {

        $this->checkAdmin();

        $userId = $_POST['user_id'];
        $role   = $_POST['role'];

        $userModel = new User();
        $userModel->updateRole($userId, $role);

        header("Location: index.php?controller=admin&action=users");
    }

    public function addProduct() {
        $this->checkAdmin();

        $error = "";
        $success = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name        = trim($_POST['product_name'] ?? '');
            $categoryId  = (int)($_POST['category_id'] ?? 0);
            $brandId     = (int)($_POST['brand_id'] ?? 0);
            $price       = (float)($_POST['price'] ?? 0);
            $stock       = (int)($_POST['stock'] ?? 0);
            $description = trim($_POST['description'] ?? '');
            $image       = trim($_POST['image'] ?? '');

            if ($name === '' || $price <= 0) {
                $error = "Tên sản phẩm và giá là bắt buộc.";
            } else {
                $ok = Product::createProduct(
                    $name,
                    $categoryId ?: null,
                    $brandId ?: null,
                    $price,
                    $stock,
                    $description,
                    $image
                );

                if ($ok) {
                    $success = "Thêm sản phẩm thành công.";
                } else {
                    $error = "Không thể thêm sản phẩm.";
                }
            }
        }

        require "app/views/admin/add_product.php";
    }

    public function addNews() {
        $this->checkAdmin();

        $error = "";
        $success = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title   = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $image   = trim($_POST['image'] ?? '');

            if ($title === '' || $content === '') {
                $error = "Tiêu đề và nội dung là bắt buộc.";
            } else {
                $newsModel = new News();
                $ok = $newsModel->createNews($title, $content, $image);

                if ($ok) {
                    $success = "Thêm tin tức thành công.";
                } else {
                    $error = "Không thể thêm tin tức.";
                }
            }
        }

        require "app/views/admin/add_news.php";
    }
}