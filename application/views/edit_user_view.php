<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $user->username; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user->email; ?>" required><br>
        <label>Role:</label>
        <select name="role" required>
            <option value="student" <?php if($user->role=='student') echo 'selected'; ?>>Student</option>
            <option value="teacher" <?php if($user->role=='teacher') echo 'selected'; ?>>Teacher</option>
            <option value="admin" <?php if($user->role=='admin') echo 'selected'; ?>>Admin</option>
        </select><br>
        <button type="submit">Update</button>
    </form>
    <a href="<?php echo site_url('dashboard'); ?>">Back to Dashboard</a>
</body>
</html>