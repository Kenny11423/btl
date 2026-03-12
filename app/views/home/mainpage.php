<!DOCTYPE html>
<html>
<head>
    <title>Cửa hàng công nghệ</title>
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

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content">
        <h1>Khám phá thế giới công nghệ</h1>
        <p>Chọn lựa những thiết bị điện tử mới nhất và chất lượng cao.</p>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="products">
    <h2>Sản phẩm nổi bật</h2>
    <div class="underline"></div>

   <div class="product-grid">

    <?php foreach ($featuredProducts as $product): ?>

    <a href="<?= BASE_URL ?>index.php?controller=products&action=detail&id=<?= $product['product_id'] ?>" 
       style="text-decoration:none; color:inherit;">

        <div class="card">

            <div class="product-image">
                <img src="<?= BASE_URL ?>assets/Images/<?= $product['image'] ?>"
                     alt="<?= $product['product_name'] ?>">
            </div>

            <h3><?= $product['product_name'] ?></h3>
            <p><?= $product['description'] ?></p>

            <span class="price">
                <?= number_format($product['price'], 0, ',', '.') ?>đ
            </span>

            <button>Xem Chi Tiết</button>

        </div>

    </a>

<?php endforeach; ?>
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