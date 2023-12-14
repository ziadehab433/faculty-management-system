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
    <header>
        <p>Admin</p>
    </header>
    <main>

       

    <div class="container">
        <div class="container">
    
            <a href="./admin_students.php?levelNumber=1" class="btn btn1">Level 1</a>
            <a href="./admin_students.php?levelNumber=2" class="btn btn2">Level 2</a>
            <a href="./admin_students.php?levelNumber=3" class="btn btn3">Level 3</a>
            <a href="./admin_students.php?levelNumber=4" class="btn btn4">Level 4</a>
            <a href="./admin_level.php" class="btn btn3">Add Level</a>
    </div>

    </main>
</body>
</html>
