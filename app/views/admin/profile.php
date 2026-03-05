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

    </nav>
</header>
<body>
<section class="admin-users">

<h2 class="admin-title">Quản Lý Người Dùng</h2>

<table class="admin-table">

<tr>
    <th>ID</th>
    <th>Tên</th>
    <th>Email</th>
    <th>Role</th>
    <th>Đổi Role</th>
</tr>

<?php foreach ($users as $user): ?>

<tr>

<td><?= $user['user_id'] ?></td>
<td><?= $user['fullname'] ?></td>
<td><?= $user['email'] ?></td>
<td><?= $user['role'] ?></td>

<td>

<form method="POST" action="index.php?controller=admin&action=changeRole">

<input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">

<select name="role">

<option value="user" <?= $user['role']=='user'?'selected':'' ?>>User</option>
<option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>

</select>

<button type="submit">Cập nhật</button>

</form>

</td>

</tr>

<?php endforeach; ?>

</table>

</section>

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