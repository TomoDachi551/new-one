<?php
// filepath: c:\xampp\htdocs\student\grades\add.php
// Assumes $subjects is provided by Grades::add()
// Assumes $student_id is available (e.g., via GET or POST)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Grade</title>
    <style>
        label { display: block; margin-top: 10px; }
        select, input, button { width: 100%; padding: 6px; margin-top: 4px; }
        button { margin-top: 15px; }
    </style>
</head>
<body>
    <h2>Add Grade</h2>
    <form method="post" action="add_post.php">
        <input type="hidden" name="student_id" value="<?= htmlspecialchars($student_id) ?>">

        <label for="subject_id">Subject</label>
        <select name="subject_id" id="subject_id" required>
            <option value="">Select Subject</option>
            <?php foreach ($subjects as $subject): ?>
                <option value="<?= $subject['id'] ?>">
                    <?= htmlspecialchars($subject['code']) ?> - <?= htmlspecialchars($subject['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="grade">Grade</label>
        <input type="text" name="grade" id="grade" required placeholder="e.g. 1.25, 85, A">

        <label for="semester">Semester</label>
        <input type="text" name="semester" id="semester" required placeholder="e.g. 1st Sem AY 2024–2025">

        <label for="year_level">Year Level</label>
        <select name="year_level" id="year_level" required>
            <?php
            $levels = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
            foreach ($levels as $level):
            ?>
                <option value="<?= $level ?>"><?= $level ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Add Grade</button>
    </form>
</body>
</html>