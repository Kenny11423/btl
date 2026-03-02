<?php if (!empty($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<?php if (!empty($message)): ?>
    <div class="success"><?php echo $message; ?></div>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="login-box">
    <h2>Create Account</h2>
    <p class="subtitle">Register to get started</p>

    <form method="POST">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>

        <button type="submit">Register</button>
    </form>

    <p class="register-text">
        Already have an account?
        <a href="index.php?controller=auth&action=login">Sign in</a>
    </p>
</div>

</body>
</html>