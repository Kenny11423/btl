<!DOCTYPE html>
<html>
<head>
    <title>Giới thiệu</title>
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
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                        <a href="index.php?controller=admin&action=dashboard">Dashboard</a>
                <?php endif; ?>
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

<body>
<div class="container">
   <div class="about-page">

    <div class="about-container">

        <h2 class="page-title">Về Chúng Tôi</h2>
        <div class="title-underline"></div>

        <div class="about-content">

            <div class="about-text">
                <h3>TechShop</h3>
                <p>
                    Chúng tôi là cửa hàng chuyên cung cấp các sản phẩm công nghệ 
                    chất lượng cao như laptop, điện thoại, phụ kiện gaming và thiết bị âm thanh.
                </p>

                <p>
                    Với mục tiêu mang đến trải nghiệm mua sắm hiện đại và tiện lợi,
                    chúng tôi luôn cam kết:
                </p>

                <ul>
                    <li>Sản phẩm chính hãng 100%</li>
                    <li>Giá cả cạnh tranh</li>
                    <li>Hỗ trợ khách hàng nhanh chóng</li>
                    <li>Bảo hành uy tín</li>
                </ul>
            </div>

        </div>

    </div>

</div>
</div>
</div>
</section>
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