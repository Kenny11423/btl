<!DOCTYPE html>
<html>
<head>
    <title>Thêm tin tức</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>

<header class="navbar">
    <div class="logo">Placeholder</div>
    <nav>
        <a href="index.php?controller=home">Home</a>
        <a href="index.php?controller=products">Products</a>
        <a href="index.php?controller=pages&action=about">About</a>
        <a href="index.php?controller=news">News</a>
        <a href="index.php?controller=pages&action=contact">Contact</a>
        <div class="user-dropdown">
            <button class="user-btn">👤 Admin ▾</button>
            <div class="dropdown-content">
                <a href="index.php?controller=admin&action=dashboard">Dashboard</a>
                <a href="index.php?controller=admin&action=users">Danh sách users</a>
                <a href="index.php?controller=auth&action=logout">Đăng Xuất</a>
            </div>
        </div>
    </nav>
</header>

<main class="admin-dashboard">
    <section class="admin-hero">
        <h2>Thêm tin tức mới</h2>
        <p>Điền nội dung bài viết công nghệ cho mục News.</p>
    </section>

    <section class="admin-actions">
        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p style="color:green;"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form method="post">
            <label>Tiêu đề</label>
            <input type="text" name="title" required>

            <label>Ảnh (tên file trong assets/Images, có thể để trống)</label>
            <input type="text" name="image" placeholder="vd: ai.jpg">

            <label>Nội dung</label>
            <textarea name="content" rows="8" required></textarea>

            <button type="submit">Lưu tin tức</button>
        </form>
    </section>
</main>

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

