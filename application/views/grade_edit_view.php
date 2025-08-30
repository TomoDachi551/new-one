<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Grade</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .edit-form-container { background: #fff; max-width: 400px; margin: 40px auto; padding: 30px 25px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h2 { text-align: center; color: #0074D9; }
        label { display: block; margin-top: 15px; color: #333; }
        input { width: 100%; padding: 8px 10px; margin-top: 5px; border: 1px solid #bbb; border-radius: 4px; }
        button { margin-top: 20px; width: 100%; background: #0074D9; color: #fff; border: none; padding: 10px; border-radius: 4px; font-size: 16px; }
        button:hover { background: #005fa3; }
        a { display: block; text-align: center; margin-top: 18px; color: #0074D9; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="edit-form-container">
        <h2>Edit Grade</h2>
        <form method="post" action="<?php echo site_url('grades/update'); ?>">
            <input type="hidden" name="grade_id" value="<?php echo $grade->id; ?>">
            <input type="hidden" name="student_id" value="<?php echo $grade->student_id; ?>">
            <label>Grade:</label>
            <input type="text" name="grade" value="<?php echo htmlspecialchars($grade->grade); ?>" required>
            <label>Semester:</label>
            <input type="text" name="semester" value="<?php echo htmlspecialchars($grade->semester); ?>" required>
            <label>Year Level:</label>
            <input type="text" name="year_level" value="<?php echo htmlspecialchars($grade->year_level); ?>" required>
            <button type="submit">Update</button>
        </form>
        <a href="<?php echo site_url('grades/report/'.$grade->student_id); ?>">Back to Grade Report</a>
    </div>
</body>
</html>