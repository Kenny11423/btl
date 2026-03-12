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
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="user-dropdown">
                <button class="user-btn">👤 <?= htmlspecialchars($_SESSION['fullname'] ?? 'User') ?> ▾</button>
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

    </nav>
</header>
<body>

<div class="container">
    <h2>TRANG SẢN PHẨM</h2>

    <div class="product-grid">

        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product) : ?>

                <div class="product-card">

                    <img src="assets/Images/<?= $product['image']; ?>" 
                         alt="<?= $product['product_name']; ?>">

                    <h3><?= $product['product_name']; ?></h3>

                    <p class="price">
                        <?= number_format($product['price'], 0, ',', '.'); ?> đ
                    </p>

                    <a href="index.php?controller=product&action=detail&id=<?= $product['product_id']; ?>" 
                       class="btn">
                       Xem chi tiết
                    </a>

                </div>

            <?php endforeach; ?>
        <?php else : ?>
            <p>Không có sản phẩm nào.</p>
        <?php endif; ?>
</div>
</section>
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
</body>
</html>