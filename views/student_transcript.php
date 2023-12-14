<?php 
    session_start();
    if($_SESSION['id'] && $_SESSION['type'] == 'student'){
    include '../controller/student_transcriptController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/frame.css">
    <link rel="stylesheet" href="../assets/css/transcript.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>bruhhhhhhhh</title>
</head>
<body>
    <?php include './frame.php'; ?>

    <main>
        <body>
            <?php
            echo '<h1>Transcript</h1>';
            if (!empty($transcript)) {
                echo '<table>';
                echo '<tr>';
                echo '<th>Course</th>';
                echo '<th>Mark</th>';
                echo '<th>STATE</th>';
                echo '</tr>';
                foreach ($transcript as $result) {
                    echo '<tr>';
                    echo '<td>' . $result['subjectCode'] . '</td>';
                    echo '<td>' . $result['totalMarks'] . '</td>';
                    echo '<td>' . $result['state'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No transcript data available.</p>';
            }
            ?>
        </body>
    </main>
</body>
</html>

<?php }else{
    header('Location: ./signIn.php');
} ?>