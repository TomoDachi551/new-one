<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
</head>
<body>
    <h2>Students</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Year Level</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student->student_id; ?></td>
            <td><?php echo htmlspecialchars($student->fullname); ?></td>
            <td><?php echo htmlspecialchars($student->email); ?></td>
            <td><?php echo htmlspecialchars($student->course); ?></td>
            <td><?php echo htmlspecialchars($student->year_level); ?></td>
            <td><?php echo htmlspecialchars($student->address); ?></td>
            <td><?php echo htmlspecialchars($student->contact_number); ?></td>
            <td>
                <a href="<?php echo site_url('students/edit/'.$student->student_id); ?>">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>