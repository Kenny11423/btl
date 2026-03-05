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
                                <img src="public/images/<?= $item['image']; ?>" width="60">
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
                    <select name="payment_id"2>
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
</html>