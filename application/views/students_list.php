<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        h2 { color: #333; }
        table { border-collapse: collapse; width: 95%; margin: 20px auto; background: #fff; }
        th, td { padding: 10px 12px; border: 1px solid #ccc; text-align: center; }
        th { background: #0074D9; color: #fff; }
        tr:nth-child(even) { background: #f2f2f2; }
        a.edit-btn { background: #2ECC40; color: #fff; padding: 5px 12px; border-radius: 4px; text-decoration: none; }
        a.edit-btn:hover { background: #27ae60; }
        a.delete-btn { background: #c0392b; color: #fff; padding: 5px 12px; border-radius: 4px; text-decoration: none; margin-left: 5px; }
        a.delete-btn:hover { background: #a93226; }
        .register-btn { display: inline-block; margin: 18px auto 0 auto; background: #0074D9; color: #fff; padding: 8px 18px; border-radius: 4px; text-decoration: none; font-size: 16px; }
        .register-btn:hover { background: #005fa3; }
        .top-bar { width: 95%; margin: 0 auto; text-align: right; }
    </style>
</head>
<body>
    <div class="top-bar">
        <a class="register-btn" href="<?php echo site_url('register'); ?>">Register New Student</a>
    </div>
    <h2 style="text-align:center;">Students</h2>
    <table>
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
                <a class="edit-btn" href="<?php echo site_url('students/edit/'.$student->student_id); ?>">Edit</a>
                <a class="delete-btn" href="<?php echo site_url('students/delete/'.$student->student_id); ?>" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                <a class="edit-btn" style="background:#0074D9;margin-left:5px;" href="<?php echo site_url('grades/report/'.$student->student_id); ?>">View Grades</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>