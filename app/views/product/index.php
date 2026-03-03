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
        <a href="#">About</a>
        <a href="#">news</a>
        <a href="#">Contact</a>
        <a href="index.php?controller=auth&action=logout" >Đăng Xuất</a>
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