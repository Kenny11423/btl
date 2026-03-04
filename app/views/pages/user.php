<html>
<head>
    <title>Placeholder</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>

<!-- HEADER -->
<header class="navbar">
    <div class="logo">Placeholder</div>
    <nav>
        <a href="index.php?controller=home">Home</a>
        <a href="index.php?controller=products">Products</a>
        <a href="index.php?controller=pages&action=about">About</a>
        <a href="index.php?controller=news">News</a>
        <a href="index.php?controller=pages&action=contact">Contact</a>
        <div class="user-dropdown">
    <button class="user-btn">👤 User ▾</button>
    <div class="dropdown-content">
        <a href="index.php?controller=pages&action=user">Thông Tin</a>
        <a href="index.php?controller=pages&action=user">Giỏ hàng</a>
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
            <h3>Placeholder</h3>
            <p>Leading the future of innovative technology and smart devices.</p>
        </div>

        <div class="footer-col">
            <h4>Quick Links</h4>
            <ul>
                <a href="<?= BASE_URL ?>index.php?controller=home">Home</a>
                <a href="<?= BASE_URL ?>index.php?controller=products">Products</a>
                <a href="<?= BASE_URL ?>index.php?controller=pages&action=about">About</a>
                <a href="<?= BASE_URL ?>index.php?controller=news">News</a>
                <a href="<?= BASE_URL ?>index.php?controller=pages&action=contact">Contact</a>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Contact</h4>
            <p>Email: support@placeholder.com</p>
            <p>Phone: +1 234 567 890</p>
        </div>

    </div>

    <div class="footer-bottom">
        © 2026 Placeholder. All rights reserved.
    </div>
</footer>
</html>