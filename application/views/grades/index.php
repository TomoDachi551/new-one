<?php
// filepath: c:\xampp\htdocs\student\grades\index.php
// Assumes $grades is provided by Grades::index($student_id)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Grades</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Grades</h2>
    <table>
        <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Grade</th>
                <th>Semester</th>
                <th>Year Level</th>
                <th>Date Recorded</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($grades)): ?>
            <?php foreach ($grades as $grade): ?>
                <tr>
                    <td><?= htmlspecialchars($grade['subject_code']) ?></td>
                    <td><?= htmlspecialchars($grade['subject_name']) ?></td>
                    <td><?= htmlspecialchars($grade['grade']) ?></td>
                    <td><?= htmlspecialchars($grade['semester']) ?></td>
                    <td><?= htmlspecialchars($grade['year_level']) ?></td>
                    <td><?= htmlspecialchars($grade['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">No grades found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>