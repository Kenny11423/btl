<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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

        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="user-dropdown">
                <button class="user-btn">👤 <?= htmlspecialchars($_SESSION['fullname'] ?? 'Tài khoản') ?> ▾</button>
                <div class="dropdown-content">
                    <a href="index.php?controller=admin&action=dashboard">Dashboard</a>
                    <a href="index.php?controller=pages&action=user">Thông Tin</a>
                    <a href="index.php?controller=cart">Giỏ hàng</a>
                    <a href="index.php?controller=auth&action=logout">Đăng Xuất</a>
                </div>
            </div>
        <?php else: ?>
            <a href="index.php?controller=auth&action=login" class="btn">Đăng nhập</a>
            <a href="index.php?controller=auth&action=register" class="btn">Đăng ký</a>
        <?php endif; ?>
    </nav>
</header>

<main class="admin-dashboard">
    <section class="admin-hero">
        <h2>Admin Dashboard</h2>
        <p>Chào <?= htmlspecialchars($_SESSION['fullname'] ?? 'Admin') ?> — quản lý nhanh hệ thống.</p>
    </section>

    <section class="admin-cards">
        <div class="admin-card">
            <div class="admin-card-title">Tổng users</div>
            <div class="admin-card-value"><?= (int)($totalUsers ?? 0) ?></div>
            <a class="admin-card-link" href="index.php?controller=admin&action=users">Xem danh sách →</a>
        </div>

        <div class="admin-card">
            <div class="admin-card-title">Admins</div>
            <div class="admin-card-value"><?= (int)($totalAdmins ?? 0) ?></div>
            <a class="admin-card-link" href="index.php?controller=admin&action=users">Quản lý role →</a>
        </div>

        <div class="admin-card">
            <div class="admin-card-title">Customers</div>
            <div class="admin-card-value"><?= (int)($totalCustomers ?? 0) ?></div>
            <a class="admin-card-link" href="index.php?controller=admin&action=users">Xem customers →</a>
        </div>
    </section>

    <section class="admin-actions">
        <h3>Thao tác nhanh</h3>
        <div class="admin-action-grid">
            <a class="admin-action" href="index.php?controller=admin&action=users">Quản lý người dùng</a>
            <a class="admin-action" href="index.php?controller=admin&action=manageProducts">Quản lý sản phẩm</a>
            <a class="admin-action" href="index.php?controller=admin&action=manageNews">Quản lý tin tức</a>
            <a class="admin-action" href="index.php?controller=admin&action=addProduct">Thêm sản phẩm</a>
            <a class="admin-action" href="index.php?controller=admin&action=addNews">Thêm tin tức</a>
            <a class="admin-action" href="index.php?controller=products">Xem sản phẩm</a>
            <a class="admin-action" href="index.php?controller=news">Xem tin tức</a>
            <a class="admin-action" href="index.php?controller=home">Về trang chủ</a>
        </div>
    </section>
</main>

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

</body>
</html>

