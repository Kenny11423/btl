<!DOCTYPE html>
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
        <a href="index.php?controller=cart">Giỏ hàng</a>
        <a href="index.php?controller=auth&action=logout">Đăng Xuất</a>
    </div>
</div>
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