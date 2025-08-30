<?php
require_once APPPATH . 'models/StudentModel.php';
$this->load->model('StudentModel');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        label { display: block; margin-top: 10px; }
        input, select, textarea { width: 100%; padding: 6px; margin-top: 4px; }
        button { margin-top: 15px; padding: 8px 16px; }
    </style>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($student['id']) ?>">
        
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname" required value="<?= htmlspecialchars($student['fullname']) ?>">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required value="<?= htmlspecialchars($student['email']) ?>">

        <label for="course">Course</label>
        <input type="text" name="course" id="course" required value="<?= htmlspecialchars($student['course']) ?>">
        <!-- Replace above with a <select> if you have a courses table -->

        <label for="year_level">Year Level</label>
        <select name="year_level" id="year_level" required>
            <?php
            $levels = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
            foreach ($levels as $level):
            ?>
                <option value="<?= $level ?>" <?= ($student['year_level'] == $level) ? 'selected' : '' ?>><?= $level ?></option>
            <?php endforeach; ?>
        </select>

        <label for="address">Address</label>
        <textarea name="address" id="address"><?= htmlspecialchars($student['address']) ?></textarea>

        <label for="contact_number">Contact Number</label>
        <input type="text" name="contact_number" id="contact_number" value="<?= htmlspecialchars($student['contact_number']) ?>">

        <button type="submit">Update Student</button>
    </form>
</body>
</html>