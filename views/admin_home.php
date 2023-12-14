<?php 
    session_start();
    if(!$_SESSION['username']){
        header('Location: ./signIn.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/frame.css"/>
    <link rel="stylesheet" href="../assets/css/Adminhome,levelOptions.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    
    <title>bruhhhhhhhh</title>
</head>
<body>
    <header>
        <p>Admin</p>
        <a href="../controller/LogoutController.php">Log Out</a>
    </header>  
    
    <main>



    <div class="container">
        <div class="container">
            <a href="./admin_professor.php" class="btn btn1">Professor</a>
            <a href="./admin_courses.php" class="btn btn2">Courses</a>
            <a href="./admin_levelOptions.php" class="btn btn3">Levels</a>
            <a href="./admin_subjects.php" class="btn btn4">Subjects</a>
            <a href="./admin_department.php" class="btn btn4">Depratment</a>
    </div>
    </div>
    
    </main>
</body>
</html>
