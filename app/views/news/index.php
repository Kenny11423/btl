<?php include "app/views/header.php"; ?>
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
<section class="news-list">
    <h2>Tin Công Nghệ</h2>

    <?php foreach ($newsList as $item): ?>
        <div class="news-item">

            <?php if (!empty($item['image'])): ?>
                <img src="public/images/<?= $item['image']; ?>" alt="">
            <?php endif; ?>

            <div class="news-content">
                <h3>
                    <a href="index.php?controller=news&action=detail&id=<?= $item['news_id']; ?>">
                        <?= $item['title']; ?>
                    </a>
                </h3>

                <p class="news-date">
                    <?= date("d/m/Y", strtotime($item['created_at'])); ?>
                </p>

                <p>
                    <?= substr($item['content'], 0, 150); ?>...
                </p>

                <a class="read-more"
                   href="index.php?controller=news&action=detail&id=<?= $item['news_id']; ?>">
                   Xem thêm →
                </a>
            </div>

        </div>
    <?php endforeach; ?>

</section>

<?php include "app/views/footer.php"; ?>
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