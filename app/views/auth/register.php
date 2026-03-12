<?php if (!empty($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<?php if (!empty($message)): ?>
    <div class="success"><?php echo $message; ?></div>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="login-box">
    <h2>Đăng ký tài khoản</h2>
    <p class="subtitle">Tạo tài khoản để bắt đầu mua sắm</p>

    <?php $return = isset($_GET['return']) ? htmlspecialchars($_GET['return']) : ''; ?>
    <form method="POST" action="index.php?controller=auth&action=register<?= $return ? '&return=' . $return : '' ?>">
        <input type="text" name="fullname" placeholder="Họ và tên" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>

        <button type="submit">Đăng ký</button>
    </form>

    <p class="register-text">
        Đã có tài khoản?
        <a href="index.php?controller=auth&action=login<?= $return ? '&return=' . $return : '' ?>">Đăng nhập</a>
    </p>
</div>

</body>
</html>