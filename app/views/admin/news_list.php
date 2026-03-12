<!DOCTYPE html>
<html>
<head>
    <title>Quản lý tin tức</title>
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
                <a href="index.php?controller=auth&action=logout">Đăng Xuất</a>
            </div>
        </div>
    </nav>
</header>

<main class="admin-dashboard">
    <section class="admin-hero">
        <h2>Quản lý tin tức</h2>
        <p>Danh sách các bài viết trong mục News.</p>
        <a class="admin-action" href="index.php?controller=admin&action=addNews">+ Thêm tin tức</a>
    </section>

    <section class="admin-users">
        <table class="admin-table">
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ngày tạo</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
            <?php foreach ($allNews as $n): ?>
                <tr>
                    <td><?= $n['news_id']; ?></td>
                    <td><?= htmlspecialchars($n['title']); ?></td>
                    <td><?= $n['created_at']; ?></td>
                    <td>
                        <?php if (!empty($n['image'])): ?>
                            <img src="assets/Images/<?= $n['image']; ?>" width="60">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a class="admin-action" href="index.php?controller=admin&action=editNews&id=<?= $n['news_id']; ?>">Sửa</a>
                        <a class="admin-action" href="index.php?controller=admin&action=deleteNews&id=<?= $n['news_id']; ?>"
                           onclick="return confirm('Xóa tin tức này?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
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

