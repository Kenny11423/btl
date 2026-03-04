<?php
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>
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
        <a href="index.php?controller=pages&action=user">Giỏ hàng</a>
        <a href="index.php?controller=auth&action=logout">Đăng Xuất</a>
    </div>
</div>
    </nav>
</header>

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content">
        <h1>Discover the Future of Tech</h1>
        <p>Explore our curated selection of the latest and greatest electronic gadgets.</p>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="products">
    <h2>Featured Products</h2>
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