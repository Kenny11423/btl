<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sản phẩm</title>
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
        <h2>Quản lý sản phẩm</h2>
        <p>Danh sách toàn bộ sản phẩm trong hệ thống.</p>
        <a class="admin-action" href="index.php?controller=admin&action=addProduct">+ Thêm sản phẩm</a>
    </section>

    <section class="admin-users">
        <table class="admin-table">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Tồn kho</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
            <?php foreach ($products as $p): ?>
                <tr>
                    <td><?= $p['product_id']; ?></td>
                    <td><?= htmlspecialchars($p['product_name']); ?></td>
                    <td><?= number_format($p['price'], 0, ',', '.'); ?> đ</td>
                    <td><?= (int)$p['stock']; ?></td>
                    <td>
                        <?php if (!empty($p['image'])): ?>
                            <img src="assets/Images/<?= $p['image']; ?>" width="60">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a class="admin-action" href="index.php?controller=admin&action=editProduct&id=<?= $p['product_id']; ?>">Sửa</a>
                        <a class="admin-action" href="index.php?controller=admin&action=deleteProduct&id=<?= $p['product_id']; ?>"
                           onclick="return confirm('Xóa sản phẩm này?');">Xóa</a>
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

