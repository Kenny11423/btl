<?php

require_once "app/models/User.php";
require_once "app/models/Product.php";
require_once "app/models/News.php";
require_once "app/models/Category.php";
require_once "app/models/Brand.php";

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

    /**
     * Tải ảnh từ URL về thư mục assets/Images và trả về tên file.
     */
    private function downloadImageFromUrl($url, &$errorMessage) {
        $errorMessage = "";

        // Kiểm tra URL hợp lệ
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $errorMessage = "URL ảnh không hợp lệ.";
            return null;
        }

        // Lấy phần mở rộng file
        $pathInfo = pathinfo(parse_url($url, PHP_URL_PATH));
        $ext = strtolower($pathInfo['extension'] ?? '');
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($ext, $allowed, true)) {
            $errorMessage = "Định dạng ảnh không được hỗ trợ (chỉ hỗ trợ: jpg, jpeg, png, gif, webp).";
            return null;
        }

        $targetDir = __DIR__ . "/../../assets/Images/";
        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0777, true);
        }

        $fileName = "img_" . time() . "_" . rand(1000, 9999) . "." . $ext;
        $targetPath = $targetDir . $fileName;

        // Tải file về server (yêu cầu allow_url_fopen bật)
        $ok = @copy($url, $targetPath);

        if (!$ok) {
            $errorMessage = "Không thể tải ảnh từ URL.";
            return null;
        }

        return $fileName;
    }

    public function addProduct() {
        $this->checkAdmin();

        $error = "";
        $success = "";

        // Lấy danh sách categories / brands để hiển thị theo tên
        $categoryModel = new Category();
        $brandModel    = new Brand();
        $categories    = $categoryModel->getAllCategories();
        $brands        = $brandModel->getAllBrands();

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
                // Ưu tiên file upload từ máy
                if (!empty($_FILES['image_file']['name'] ?? '')) {
                    $uploadError = "";
                    $uploadName = $this->handleLocalImageUpload($_FILES['image_file'], $uploadError);
                    if ($uploadName === null) {
                        $error = $uploadError;
                    } else {
                        $image = $uploadName;
                    }
                }
                // Nếu không có file nhưng nhập URL ảnh thì tải về thư mục assets/Images
                elseif ($image !== '' && filter_var($image, FILTER_VALIDATE_URL)) {
                    $downloadError = "";
                    $downloaded = $this->downloadImageFromUrl($image, $downloadError);
                    if ($downloaded === null) {
                        $error = $downloadError;
                    } else {
                        $image = $downloaded; // chỉ lưu tên file vào DB
                    }
                }

                if ($error === "") {
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
        }

        require "app/views/admin/add_product.php";
    }

    public function manageProducts() {
        $this->checkAdmin();

        $products = Product::getAllProducts();
        require "app/views/admin/products_list.php";
    }

    public function editProduct() {
        $this->checkAdmin();

        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            header("Location: index.php?controller=admin&action=manageProducts");
            exit();
        }

        $categoryModel = new Category();
        $brandModel    = new Brand();
        $categories    = $categoryModel->getAllCategories();
        $brands        = $brandModel->getAllBrands();

        $product = Product::getProductById($id);
        if (!$product) {
            header("Location: index.php?controller=admin&action=manageProducts");
            exit();
        }

        $error = "";
        $success = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name        = trim($_POST['product_name'] ?? '');
            $categoryId  = (int)($_POST['category_id'] ?? 0);
            $brandId     = (int)($_POST['brand_id'] ?? 0);
            $price       = (float)($_POST['price'] ?? 0);
            $stock       = (int)($_POST['stock'] ?? 0);
            $description = trim($_POST['description'] ?? '');
            $image       = trim($_POST['image'] ?? $product['image']);

            if ($name === '' || $price <= 0) {
                $error = "Tên sản phẩm và giá là bắt buộc.";
            } else {
                // Upload file mới nếu có
                if (!empty($_FILES['image_file']['name'] ?? '')) {
                    $uploadError = "";
                    $uploadName = $this->handleLocalImageUpload($_FILES['image_file'], $uploadError);
                    if ($uploadName === null) {
                        $error = $uploadError;
                    } else {
                        $image = $uploadName;
                    }
                } elseif ($image !== '' && filter_var($image, FILTER_VALIDATE_URL)) {
                    // Nếu nhập URL mới
                    $downloadError = "";
                    $downloaded = $this->downloadImageFromUrl($image, $downloadError);
                    if ($downloaded === null) {
                        $error = $downloadError;
                    } else {
                        $image = $downloaded;
                    }
                }

                if ($error === "") {
                    $ok = Product::updateProduct(
                        $id,
                        $name,
                        $categoryId ?: null,
                        $brandId ?: null,
                        $price,
                        $stock,
                        $description,
                        $image
                    );

                    if ($ok) {
                        $success = "Cập nhật sản phẩm thành công.";
                        $product = Product::getProductById($id);
                    } else {
                        $error = "Không thể cập nhật sản phẩm.";
                    }
                }
            }
        }

        require "app/views/admin/edit_product.php";
    }

    public function deleteProduct() {
        $this->checkAdmin();
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            Product::deleteProduct($id);
        }
        header("Location: index.php?controller=admin&action=manageProducts");
        exit();
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
                // Ưu tiên file upload từ máy
                if (!empty($_FILES['image_file']['name'] ?? '')) {
                    $uploadError = "";
                    $uploadName = $this->handleLocalImageUpload($_FILES['image_file'], $uploadError);
                    if ($uploadName === null) {
                        $error = $uploadError;
                    } else {
                        $image = $uploadName;
                    }
                }
                // Nếu là URL thì tải ảnh về
                elseif ($image !== '' && filter_var($image, FILTER_VALIDATE_URL)) {
                    $downloadError = "";
                    $downloaded = $this->downloadImageFromUrl($image, $downloadError);
                    if ($downloaded === null) {
                        $error = $downloadError;
                    } else {
                        $image = $downloaded;
                    }
                }

                if ($error === "") {
                $newsModel = new News();
                $ok = $newsModel->createNews($title, $content, $image);

                if ($ok) {
                    $success = "Thêm tin tức thành công.";
                } else {
                    $error = "Không thể thêm tin tức.";
                }
                }
            }
        }

        require "app/views/admin/add_news.php";
    }

    public function manageNews() {
        $this->checkAdmin();

        $newsModel = new News();
        $allNews   = $newsModel->getAllNews();

        require "app/views/admin/news_list.php";
    }

    public function editNews() {
        $this->checkAdmin();

        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            header("Location: index.php?controller=admin&action=manageNews");
            exit();
        }

        $newsModel = new News();
        $news = $newsModel->getNewsById($id);
        if (!$news) {
            header("Location: index.php?controller=admin&action=manageNews");
            exit();
        }

        $error = "";
        $success = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title   = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $image   = trim($_POST['image'] ?? $news['image']);

            if ($title === '' || $content === '') {
                $error = "Tiêu đề và nội dung là bắt buộc.";
            } else {
                if (!empty($_FILES['image_file']['name'] ?? '')) {
                    $uploadError = "";
                    $uploadName = $this->handleLocalImageUpload($_FILES['image_file'], $uploadError);
                    if ($uploadName === null) {
                        $error = $uploadError;
                    } else {
                        $image = $uploadName;
                    }
                } elseif ($image !== '' && filter_var($image, FILTER_VALIDATE_URL)) {
                    $downloadError = "";
                    $downloaded = $this->downloadImageFromUrl($image, $downloadError);
                    if ($downloaded === null) {
                        $error = $downloadError;
                    } else {
                        $image = $downloaded;
                    }
                }

                if ($error === "") {
                    $ok = $newsModel->updateNews($id, $title, $content, $image);
                    if ($ok) {
                        $success = "Cập nhật tin tức thành công.";
                        $news = $newsModel->getNewsById($id);
                    } else {
                        $error = "Không thể cập nhật tin tức.";
                    }
                }
            }
        }

        require "app/views/admin/edit_news.php";
    }

    public function deleteNews() {
        $this->checkAdmin();
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            $newsModel = new News();
            $newsModel->deleteNews($id);
        }
        header("Location: index.php?controller=admin&action=manageNews");
        exit();
    }

    /**
     * Xử lý upload ảnh từ máy người dùng lên thư mục assets/Images.
     */
    private function handleLocalImageUpload(array $file, &$errorMessage) {
        $errorMessage = "";

        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errorMessage = "Lỗi upload file (mã lỗi: " . (int)$file['error'] . ").";
            return null;
        }

        $allowedMime = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array(mime_content_type($file['tmp_name']), $allowedMime, true)) {
            $errorMessage = "Chỉ cho phép upload file ảnh (jpg, png, gif, webp).";
            return null;
        }

        $targetDir = __DIR__ . "/../../assets/Images/";
        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0777, true);
        }

        $pathInfo = pathinfo($file['name']);
        $ext = strtolower($pathInfo['extension'] ?? 'jpg');
        $fileName = "upload_" . time() . "_" . rand(1000, 9999) . "." . $ext;
        $targetPath = $targetDir . $fileName;

        if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
            $errorMessage = "Không thể lưu file upload.";
            return null;
        }

        return $fileName;
    }
}