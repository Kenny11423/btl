<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
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

<?php if ($product): ?>

<div class="product-detail">

    <div class="detail-container">

        <div class="detail-image">
            <img src="assets/Images/<?= $product['image']; ?>"
                 alt="<?= $product['product_name']; ?>">
        </div>

        <div class="detail-info">

            <h1><?= $product['product_name']; ?></h1>

        <div class="detail-meta">
            <span><strong>Thương hiệu:</strong> <?= $product['brand_name']; ?></span>
            <span><strong>Danh mục:</strong> <?= $product['category_name']; ?></span>
        </div>

            <p class="detail-description">
                <?= $product['description']; ?>
            </p>
            <div class="detail-price">
        <?= number_format($product['price'], 0, ',', '.'); ?> đ
    </div>

            <a href="index.php?controller=cart&action=add&id=<?= $product['product_id']; ?>"
               class="btn-buy">
                Thêm vào giỏ hàng
            </a>

            <a href="index.php?controller=products" class="btn-back">
                ← tiếp tục mua sắm
            </a>

        </div>

    </div>

</div>

<?php else: ?>
    <h3 style="text-align:center;">Sản phẩm không tồn tại</h3>
<?php endif; ?>

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