<?php if (!empty($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="login-box">
    <h2>Đăng nhập</h2>
    <p class="subtitle">Nhập email và mật khẩu để tiếp tục</p>

    <?php $return = isset($_GET['return']) ? htmlspecialchars($_GET['return']) : ''; ?>
    <form method="POST" action="index.php?controller=auth&action=login<?= $return ? '&return=' . $return : '' ?>">
        <input type="email" name="email" placeholder="Email" required>

        <div class="password-field">
            <input type="password" name="password" placeholder="Mật khẩu" required>
        </div>

        <div class="options">
            <label>
                <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
            </label>
        </div>

        <button type="submit">Đăng nhập</button>
    </form>

    <p class="register-text">
        Chưa có tài khoản?
        <a href="index.php?controller=auth&action=register<?= $return ? '&return=' . $return : '' ?>">Đăng ký ngay</a>
    </p>
</div>

</body>
</html>