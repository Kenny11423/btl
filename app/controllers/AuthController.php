<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    

    public function login() {

    $error = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        $userModel = new User();
        $user = $userModel->checkLogin($email);

        if ($user && password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["fullname"] = $user["fullname"];

            $return = $_GET['return'] ?? '';
            if (!empty($return)) {
                // `return` thường được urlencode từ các controller (vd: CartController)
                $return = urldecode($return);

                // Chặn open redirect: chỉ cho phép URL nội bộ (relative)
                $isRelative =
                    str_starts_with($return, '/') ||
                    str_starts_with($return, 'index.php') ||
                    str_starts_with($return, './');

                if ($isRelative) {
                    header("Location: " . $return);
                } else {
                    header("Location: index.php?controller=home");
                }
            } else {
            header("Location: index.php?controller=home");
            }
            exit();

        } else {
            $error = "Sai email hoặc mật khẩu!";
        }
    }

    require_once __DIR__ . '/../views/auth/login.php';
}
    public function register() {

    $error = "";
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $fullname = trim($_POST["fullname"]);
        $email    = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $confirm  = trim($_POST["confirm_password"]);

        if ($password !== $confirm) {
            $error = "Mật khẩu xác nhận không khớp!";
        } else {

            $userModel = new User();

            if ($userModel->emailExists($email)) {
                $error = "Email đã tồn tại!";
            } else {

                $hashed = password_hash($password, PASSWORD_DEFAULT);

                if ($userModel->register($fullname, $email, $hashed)) {
                    $message = "Đăng ký thành công! Bạn có thể đăng nhập.";
                } else {
                    $error = "Có lỗi xảy ra!";
                }
            }
        }
    }

    require_once __DIR__ . '/../views/auth/register.php';
}
public function logout() {
    session_start();          // đảm bảo session đang chạy
    session_unset();          // xóa biến session
    session_destroy();        // hủy session

    header("Location: index.php?controller=home");
    exit();
}
}