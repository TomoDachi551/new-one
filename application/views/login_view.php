<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .login-container { background: #fff; max-width: 350px; margin: 60px auto; padding: 30px 25px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h2 { text-align: center; color: #0074D9; }
        label { display: block; margin-top: 15px; color: #333; }
        input { width: 100%; padding: 8px 10px; margin-top: 5px; border: 1px solid #bbb; border-radius: 4px; }
        button { margin-top: 20px; width: 100%; background: #0074D9; color: #fff; border: none; padding: 10px; border-radius: 4px; font-size: 16px; }
        button:hover { background: #005fa3; }
        .error { color: #c0392b; text-align: center; margin-bottom: 10px; }
        .register-link { display: block; text-align: center; margin-top: 18px; color: #0074D9; text-decoration: none; }
        .register-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="post" action="<?php echo site_url('login/authenticate'); ?>">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <a class="register-link" href="<?php echo site_url('register'); ?>">Don't have an account? Register</a>
    </div>
</body>
</html>
