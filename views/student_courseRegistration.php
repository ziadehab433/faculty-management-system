<?php 
    session_start();
    if($_SESSION['id'] && $_SESSION['type'] == 'student'){
        include '../controller/student_courseRegistrationController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/frame.css">
    <link rel="stylesheet" href="../assets/css/courseRegistration.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>CourseRegestraion</title>
</head>
<body>

    <?php include './frame.php'; ?>

    <main>
        <body>
            <table>
            <form method="post" action="../controller/student_courseRegistrationSubmitController.php">
                <tr>
                    <th>Course Name</th>
                    <th>Prof Name</th>
                    <th>Hall</th>
                    <th>Time</th>
                    <th class="checkbox-cell">Select</th>
                </tr>
                <?php 
                if(!empty($data)){
                    foreach($data as $course){
                        echo '
                            <tr>
                                <td>' . $course['subjectCode'] . '</td>
                                <td>' . $course['profId'] . '</td>
                                <td>' . $course['time'] . '</td>
                                <td>' . $course['room'] . '</td>
                                <td><input type="checkbox" name="courseIds[]" value="' . $course['courseId'] . '"></td>
                            </tr> 
                        ';
                    }
                }
                ?>
            </table>
            
            <div class="confirm-button">
                <button type="submit" name="submit">Confirm</button>
            </div>
            </form>
        
        </body>
    </main>
</body>
</html>

<?php }else{
    header('Location: ./signIn.php');
} ?>