<?php
session_start();
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
        <a href="#">Home</a>
        <a href="#">Products</a>
        <a href="#">Categories</a>
        <a href="#">About</a>
        <a href="#">Testimonials</a>
        <a href="#">Contact</a>
        <a href="index.php?controller=auth&action=logout" >Đăng Xuất</a>
    </nav>
</header>

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content">
        <h1>Discover the Future of Tech</h1>
        <p>Explore our curated selection of the latest and greatest electronic gadgets.</p>
        <button class="explore-btn">Explore Products</button>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="products">
    <h2>Featured Products</h2>
    <div class="underline"></div>

   <div class="product-grid">

    <?php foreach ($featuredProducts as $product): ?>
        <div class="card">

            <!-- Ảnh sản phẩm -->
            <div class="product-image">
                <img src="/assets/Images/<?= $product['image'] ?>"
                     alt="<?= $product['product_name'] ?>">
            </div>

            <h3><?= $product['product_name'] ?></h3>
            <p><?= $product['description'] ?></p>

            <span class="price">
                <?= number_format($product['price'], 0, ',', '.') ?>đ
            </span>

            <button>Mua Ngay</button>

        </div>
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
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Contact</a></li>
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