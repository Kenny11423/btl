<?php if (!empty($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="login-box">
    <h2>Sign In</h2>
    <p class="subtitle">Enter your credentials to continue</p>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>

        <div class="password-field">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="options">
            <label>
                <input type="checkbox" name="remember"> Remember me
            </label>
        </div>

        <button type="submit">Sign In</button>
    </form>

    <p class="register-text">
        Don't have an account?
        <a href="index.php?controller=auth&action=register">Create one</a>
    </p>
</div>

</body>
</html>