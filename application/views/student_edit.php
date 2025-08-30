<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .edit-form-container { background: #fff; max-width: 400px; margin: 40px auto; padding: 30px 25px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h2 { text-align: center; color: #0074D9; }
        label { display: block; margin-top: 15px; color: #333; }
        input, select { width: 100%; padding: 8px 10px; margin-top: 5px; border: 1px solid #bbb; border-radius: 4px; }
        button { margin-top: 20px; width: 100%; background: #0074D9; color: #fff; border: none; padding: 10px; border-radius: 4px; font-size: 16px; }
        button:hover { background: #005fa3; }
        a { display: block; text-align: center; margin-top: 18px; color: #0074D9; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="edit-form-container">
        <h2>Edit Student</h2>
        <form method="post" action="<?php echo site_url('students/update'); ?>">
            <input type="hidden" name="student_id" value="<?php echo $student->student_id; ?>">
            <label>Full Name:</label>
            <input type="text" name="fullname" value="<?php echo htmlspecialchars($student->fullname); ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($student->email); ?>" required>
            <label>Course:</label>
            <select name="course" required>
                <?php foreach ($courses as $course): ?>
                    <option value="<?php echo $course->id; ?>" <?php if($student->course==$course->id) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($course->course_name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label>Year Level:</label>
            <input type="text" name="year_level" value="<?php echo htmlspecialchars($student->year_level); ?>" required>
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($student->address); ?>" required>
            <label>Contact Number:</label>
            <input type="text" name="contact_number" value="<?php echo htmlspecialchars($student->contact_number); ?>" required>
            <button type="submit">Update</button>
        </form>
        <a href="<?php echo site_url('students'); ?>">Back to List</a>
    </div>
</body>
</html>