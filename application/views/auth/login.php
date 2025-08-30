<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        form { max-width: 350px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 6px; }
        label { display: block; margin-top: 12px; }
        input { width: 100%; padding: 8px; margin-top: 4px; }
        button { margin-top: 18px; padding: 8px 16px; width: 100%; }
        .error { color: red; margin-top: 10px; }
    </style>
</head>
<body>
    <form method="post" action="login_post.php">
        <h2>Login</h2>
        <label for="username">Username or Email</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
    </form>
</body>
</html>