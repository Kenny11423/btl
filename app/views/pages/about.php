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
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <a href="index.php?controller=admin&action=users">Quản lý</a> 
                <?php endif; ?>
        <a href="index.php?controller=pages&action=user">Thông Tin</a>
        <a href="index.php?controller=cart">Giỏ hàng</a>
        <a href="index.php?controller=auth&action=logout">Đăng Xuất</a>
    </div>
</div>
    </nav>
</header>

<body>
2
<div class="container">
    <h2>Về Chúng Tôi</h2>

   <div class="about-page">

    <div class="about-container">

        <h2 class="page-title">Về Chúng Tôi</h2>
        <div class="title-underline"></div>

        <div class="about-content">

            <div class="about-text">
                <h3>Placeholder Store</h3>
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

            <div class="about-image">
                <img src="<?= BASE_URL ?>assets/Images/store.jpg" alt="Store">
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