<!DOCTYPE html>
<html>
<head>
    <title>Sửa sản phẩm</title>
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
        <h2>Sửa sản phẩm #<?= $product['product_id']; ?></h2>
        <p>Cập nhật thông tin sản phẩm.</p>
    </section>

    <section class="admin-actions">
        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p style="color:green;"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <label>Tên sản phẩm</label>
            <input type="text" name="product_name" required value="<?= htmlspecialchars($product['product_name']); ?>">

            <label>Danh mục (Category)</label>
            <select name="category_id">
                <option value="0">-- Chọn danh mục --</option>
                <?php foreach ($categories as $c): ?>
                    <option value="<?= $c['category_id']; ?>"
                        <?= $product['category_id'] == $c['category_id'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($c['category_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Thương hiệu (Brand)</label>
            <select name="brand_id">
                <option value="0">-- Chọn thương hiệu --</option>
                <?php foreach ($brands as $b): ?>
                    <option value="<?= $b['brand_id']; ?>"
                        <?= $product['brand_id'] == $b['brand_id'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($b['brand_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Giá (VNĐ)</label>
            <input type="number" step="0.01" name="price" required value="<?= $product['price']; ?>">

            <label>Tồn kho</label>
            <input type="number" name="stock" min="0" value="<?= (int)$product['stock']; ?>">

            <label>Mô tả</label>
            <textarea name="description" rows="4"><?= htmlspecialchars($product['description'] ?? ''); ?></textarea>

            <?php if (!empty($product['image'])): ?>
                <p>Ảnh hiện tại:</p>
                <img src="assets/Images/<?= $product['image']; ?>" width="100">
            <?php endif; ?>

            <label>Ảnh mới (nếu muốn thay)</label>
            <input type="file" name="image_file" accept="image/*">

            <label>Hoặc nhập tên file/URL ảnh mới (tùy chọn)</label>
            <input type="text" name="image" value="">

            <button type="submit">Lưu thay đổi</button>
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

