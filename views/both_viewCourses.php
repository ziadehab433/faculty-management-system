<?php 
    session_start () ;
    if ($_SESSION['id']) {
    include '../controller/both_viewCoursesController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/frame.css">
    <link rel="stylesheet" href="../assets/css/viewCourses.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>View Enrolled Courses</title>
</head>
<body>
    <?php include './frame.php'; ?>
    <h1>Enrolled Courses</h1>
    <?php if (!empty($enrolledCourses)): 
        $weekDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];
    ?>
        <table>
            <tr>
                <th>subjectCode</th>
                <th>profId</th>
                <th>time</th>
                <th>weekDayNum</th>
                <th>room</th>
            </tr>
            <?php foreach ($enrolledCourses as $course): ?>
                <tr>
                    <td><?= $course['subjectCode'] ?></td>
                    <td><?= $course['profId'] ?></td>
                    <td><?= $course['time'] ?></td>
                    <td><?= $weekDays[$course['weekDayNum']] ?></td>
                    <td><?= $course['room'] ?></td>
                    =
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No enrolled courses available.</p>
    <?php endif; ?>
</body>
</html>

<?php }else{
    header('Location: ../views/signIn.php');
} ?>