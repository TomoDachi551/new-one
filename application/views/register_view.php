<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .register-container { background: #fff; max-width: 400px; margin: 40px auto; padding: 30px 25px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h2 { text-align: center; color: #0074D9; }
        label { display: block; margin-top: 15px; color: #333; }
        input, select { width: 100%; padding: 8px 10px; margin-top: 5px; border: 1px solid #bbb; border-radius: 4px; }
        button { margin-top: 20px; width: 100%; background: #0074D9; color: #fff; border: none; padding: 10px; border-radius: 4px; font-size: 16px; }
        button:hover { background: #005fa3; }
        .error { color: #c0392b; text-align: center; margin-bottom: 10px; }
        .success { color: #27ae60; text-align: center; margin-bottom: 10px; }
        .role-fields { display: none; }
    </style>
    <script>
        function toggleFields() {
            var role = document.getElementsByName('role')[0].value;
            document.getElementById('studentFields').style.display = (role === 'student') ? 'block' : 'none';
            document.getElementById('teacherFields').style.display = (role === 'teacher') ? 'block' : 'none';
        }
        window.onload = function() {
            toggleFields();
            document.getElementsByName('role')[0].onchange = toggleFields;
        };
    </script>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
        <?php if (isset($success)) echo "<div class='success'>$success</div>"; ?>
        <form method="post" action="<?php echo site_url('register/submit'); ?>">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <label>Confirm Password:</label>
            <input type="password" name="confirm" required>
            <label>Role:</label>
            <select name="role" required>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
                <option value="admin">Admin</option>
            </select>
            <label>Full Name:</label>
            <input type="text" name="fullname" required>
            <div id="studentFields" class="role-fields">
                <label>Course:</label>
                <select name="course">
                    <?php if (isset($courses)) foreach ($courses as $course): ?>
                        <option value="<?php echo $course->id; ?>"><?php echo htmlspecialchars($course->course_name); ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Year Level:</label>
                <input type="text" name="year_level">
            </div>
            <div id="teacherFields" class="role-fields">
                <label>Department:</label>
                <input type="text" name="department">
            </div>
            <label>Address:</label>
            <input type="text" name="address">
            <label>Contact Number:</label>
            <input type="text" name="contact_number">
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>