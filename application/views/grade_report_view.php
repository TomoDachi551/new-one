<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Grade Report</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        h2 { text-align: center; color: #0074D9; }
        table { border-collapse: collapse; width: 60%; margin: 30px auto; background: #fff; }
        th, td { padding: 10px 12px; border: 1px solid #ccc; text-align: center; }
        th { background: #0074D9; color: #fff; }
        .back-btn {
            display: block;
            width: 180px;
            margin: 30px auto 0 auto;
            background: #0074D9;
            color: #fff;
            padding: 10px 0;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
        }
        .back-btn:hover {
            background: #005fa3;
        }
    </style>
</head>
<body>
    <h2>Grade Report</h2>
    <?php if (empty($grades)): ?>
        <p style="text-align:center;">No grades found for this student.</p>
    <?php else: ?>
        <p>All of these are randomly generated as it is still temporary.</p>
    <table>
        <tr>
            <th>Subject</th>
            <th>Grade</th>
            <th>Semester</th>
            <th>Year Level</th>
        </tr>
        <?php foreach ($grades as $grade): ?>
        <tr>
            <td>
                <?php
                if ($grade->subject_id == 0) {
                    echo "Total/Average";
                } else {
                    echo htmlspecialchars($grade->subject_name ?? "Subject " . $grade->subject_id);
                }
                ?>
            </td>
            <td><?php echo htmlspecialchars($grade->grade); ?></td>
            <td><?php echo htmlspecialchars($grade->semester); ?></td>
            <td><?php echo htmlspecialchars($grade->year_level); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    <a class="back-btn" href="<?php echo site_url('students'); ?>">Back to Student List</a>
</body>
</html>