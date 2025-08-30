<?php ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post" action="<?php echo site_url('students/update'); ?>">
        <input type="hidden" name="id" value="<?php echo $student->id; ?>">
        <label>Full Name:</label>
        <input type="text" name="fullname" value="<?php echo $student->fullname; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $student->email; ?>" required><br>
        <label>Course:</label>
        <input type="text" name="course" value="<?php echo $student->course; ?>" required><br>
        <label>Year Level:</label>
        <input type="text" name="year_level" value="<?php echo $student->year_level; ?>" required><br>
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $student->address; ?>" required><br>
        <label>Contact Number:</label>
        <input type="text" name="contact_number" value="<?php echo $student->contact_number; ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <a href="<?php echo site_url('students'); ?>">Back to List</a>
</body>
</html>