<html>
<head>
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>

<!-- HEADER -->
<header class="navbar">
    <div class="logo">TechShop</div>
    <nav>
        <a href="index.php?controller=home">Trang chủ</a>
        <a href="index.php?controller=products">Sản phẩm</a>
        <a href="index.php?controller=pages&action=about">Giới thiệu</a>
        <a href="index.php?controller=news">Tin tức</a>
        <a href="index.php?controller=pages&action=contact">Liên hệ</a>
        <div class="user-dropdown">
    <button class="user-btn">👤 Tài khoản ▾</button>
    <div class="dropdown-content">
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <a href="index.php?controller=admin&action=dashboard">Dashboard</a>
               <?php else: ?>
                    <a href="index.php?controller=pages&action=user">Thông Tin</a>
                <?php endif; ?>
        <a href="index.php?controller=cart">Giỏ hàng</a>
        <a href="index.php?controller=auth&action=logout">Đăng Xuất</a>
    </div>
</div>
    </nav>
</header>


    </nav>
</header>
<body>
<section class="user-profile">
    <h2>Thông Tin Tài Khoản</h2>

    <form method="POST" class="profile-card">

        <label>Email</label>
        <input type="text" value="<?= $user['email'] ?>" disabled>

        <label>Họ và tên</label>
        <input type="text" name="fullname" 
               value="<?= $user['fullname'] ?? '' ?>">

        <label>Số điện thoại</label>
        <input type="text" name="phone" 
               value="<?= $user['phone'] ?? '' ?>">

        <label>Địa chỉ</label>
        <input type="text" name="address" 
               value="<?= $user['address'] ?? '' ?>">

        <label>Vai trò</label>
        <input type="text" value="<?= $user['role'] ?>" disabled>

        <button type="submit">Cập Nhật</button>

    </form>
</section>
<div class="order-history">
    <h3>Lịch Sử Mua Hàng</h3>

    <?php if (empty($orderHistory)): ?>
        <p>Bạn chưa có đơn hàng nào.</p>
    <?php else: ?>

        <table>
            <tr>
                <th>Mã đơn</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
            </tr>

            <?php foreach ($orderHistory as $order): ?>
                <tr>
                    <td>#<?= $order['order_id']; ?></td>
                    <td><?= number_format($order['total']); ?> đ</td>
                    <td><?= date("d/m/Y", strtotime($order['created_at'])); ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

    <?php endif; ?>
</div>
</body>
<footer class="footer">
    <div class="footer-container">

        <div class="footer-col">
            <h3>TechShop</h3>
            <p>Mang công nghệ hiện đại đến gần hơn với bạn.</p>
        </div>

        <div class="footer-col">
            <h4>Liên kết nhanh</h4>
            <ul>
                <a href="<?= BASE_URL ?>index.php?controller=home">Trang chủ</a>
                <a href="<?= BASE_URL ?>index.php?controller=products">Sản phẩm</a>
                <a href="<?= BASE_URL ?>index.php?controller=pages&action=about">Giới thiệu</a>
                <a href="<?= BASE_URL ?>index.php?controller=news">Tin tức</a>
                <a href="<?= BASE_URL ?>index.php?controller=pages&action=contact">Liên hệ</a>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Liên hệ</h4>
            <p>Email: support@techshop.com</p>
            <p>Điện thoại: 0123 456 789</p>
        </div>

    </div>

    <div class="footer-bottom">
        © 2026 TechShop. Đã đăng ký bản quyền.
    </div>
</footer>
</html>