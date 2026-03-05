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

</header>
<body>

<div class="container">
    <h2>Liên hệ với chúng tôi</h2>

    <div class="contact-page">

    <div class="contact-container">

        <h2 class="page-title">Liên Hệ</h2>
        <div class="title-underline"></div>

        <div class="contact-wrapper">

            <div class="contact-info">
                <h3>Thông tin liên hệ</h3>
                <p><strong>Địa chỉ:</strong> Hà Nội, Việt Nam</p>
                <p><strong>Email:</strong> support@placeholder.com</p>
                <p><strong>Điện thoại:</strong> 0123 456 789</p>
            </div>

            <div class="contact-form">
                <form method="post">
                    <input type="text" name="name" placeholder="Họ và tên" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <textarea name="message" rows="5" placeholder="Nội dung..." required></textarea>
                    <button type="submit">Gửi Tin Nhắn</button>
                </form>
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