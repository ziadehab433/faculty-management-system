<?php 
    session_start();
    if($_SESSION['id'] && $_SESSION['type'] == 'student'){
        include '../controller/student_termResultController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/frame.css">
    <link rel="stylesheet" href="../assets/css/termResults.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>bruhhhhhhhh</title>
</head>
<body>

    <?php include './frame.php'; ?>

    <main>
    <body>
    <h1>Term Results</h1>
    <?php if (!empty($termResults)): ?>
        <table>
            <tr>
                <th>subjectCode</th>
                <th>Grade</th>
            </tr>
            <?php foreach ($termResults as $result): ?>
                <tr>
                    <td><?= $result['subjectCode'] ?></td>
                    <td><?= $result['grade'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No results available .</p>
    <?php endif; ?>
</body>
    </main>
</body>
</html>

<?php }else{
    header('Location: ../views/signIn.php');
} ?>