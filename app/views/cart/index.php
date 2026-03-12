<!DOCTYPE html>
<html>
<head>
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>

<!-- HEADER -->
<header class="navbar">
    <div class="logo">TechShop</div>
    <nav>
        <a href="index.php?controller=home">Trang chủ</a>
        <a href="index.php?controller=products">Sản phẩm</a>
        <a href="index.php?controller=pages&action=about">Giới thiệu</a>
        <a href="index.php?controller=news">Tin tức</a>
        <a href="index.php?controller=pages&action=contact">Liên hệ</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="user-dropdown">
                <button class="user-btn">👤 <?= htmlspecialchars($_SESSION['fullname'] ?? 'Tài khoản') ?> ▾</button>
                <div class="dropdown-content">
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                        <a href="index.php?controller=admin&action=dashboard">Dashboard</a>
                    <?php endif; ?>
                    <a href="index.php?controller=pages&action=user">Thông Tin</a>
                    <a href="index.php?controller=cart">Giỏ hàng</a>
                    <a href="index.php?controller=auth&action=logout">Đăng Xuất</a>
                </div>
            </div>
        <?php else: ?>
            <a href="index.php?controller=auth&action=login" class="btn">Đăng nhập</a>
            <a href="index.php?controller=auth&action=register" class="btn">Đăng ký</a>
        <?php endif; ?>
    </nav>
</header>

    </nav>
</header>
<body>
<section class="cart-page">
    <h2>Giỏ Hàng</h2>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Giỏ hàng trống.</p>
    <?php else: ?>

        <form method="POST" action="index.php?controller=cart&action=update">

            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Hình</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>

                <?php $total = 0; ?>

                <?php foreach ($_SESSION['cart'] as $id => $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>

                    <tr>
                        <td><?= $item['name']; ?></td>

                        <td>
                            <?php if (!empty($item['image'])): ?>
                                <img src="assets/Images/<?= $item['image']; ?>" width="60">
                            <?php endif; ?>
                        </td>

                        <td><?= number_format($item['price']); ?> đ</td>

                        <td>
                            <input type="number"
                                   name="quantity[<?= $id; ?>]"
                                   value="<?= $item['quantity']; ?>"
                                   min="1">
                        </td>

                        <td><?= number_format($subtotal); ?> đ</td>

                        <td>
                            <a class="remove-btn"
                               href="index.php?controller=cart&action=remove&id=<?= $id; ?>">
                               X
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>

            <div class="cart-summary">
                <h3>Tổng tiền: <?= number_format($total); ?> đ</h3>

                <!-- CHỌN PHƯƠNG THỨC THANH TOÁN -->
                <div style="margin:15px 0;">
                    <label>Phương thức thanh toán:</label>
                    <select name="payment_id">
                        <option value="">-- Chọn phương thức --</option>
                        <?php foreach ($paymentMethods as $method): ?>
                            <option value="<?= $method['payment_id']; ?>">
                                <?= $method['method_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit">Cập nhật giỏ hàng</button>

                <button type="submit" name="checkout">
                    Thanh toán
                </button>

            </div>

        </form>

    <?php endif; ?>
</section>


</body>
<footer class="footer">
    <div class="footer-container">

        <div class="footer-col">
            <h3>TechShop</h3>
            <p>Mang công nghệ hiện đại đến gần hơn với bạn.</p>
        </div>

        <div class="footer-col">
            <h4>Liên kết nhanh</h4>
            <ul>
                <a href="<?= BASE_URL ?>index.php?controller=home">Trang chủ</a>
                <a href="<?= BASE_URL ?>index.php?controller=products">Sản phẩm</a>
                <a href="<?= BASE_URL ?>index.php?controller=pages&action=about">Giới thiệu</a>
                <a href="<?= BASE_URL ?>index.php?controller=news">Tin tức</a>
                <a href="<?= BASE_URL ?>index.php?controller=pages&action=contact">Liên hệ</a>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Liên hệ</h4>
            <p>Email: support@techshop.com</p>
            <p>Điện thoại: 0123 456 789</p>
        </div>

    </div>

    <div class="footer-bottom">
        © 2026 TechShop. Đã đăng ký bản quyền.
    </div>
</footer>
</html>