 <?php 
    session_start();
    if($_SESSION['id'] && $_SESSION['type'] == 'professor'){

    include '../controller/professor_homeController.php';

    $message = '';
    $parts = parse_url($_SERVER['REQUEST_URI']);
    if(isset($parts['query'])){
        parse_str($parts['query'], $query);
        if(isset($query['error'])){
          $message = $query['error'];
          $color = 'red';
        }elseif(isset($query['state'])){
          $message = $query['state'];
          $color = 'green';
        }
   
      }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/professor_home.css">
    <link rel="stylesheet" href="../assets/css/frame.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Professor Page</title>
</head>
<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        padding-top: 30px;
    }

    #img-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    #img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 0px;
    }

    #profilePic {
        width: 100%;
        max-width: 300px;
    }

    .btn-primary {
        background-color: #297289;
        color: white;
    }

    .btn-primary:hover {
        background-color: #84AFBC;
    }

    #nav {
        margin-top: 20px;
    }

    .nav-link {
        color: #297289;
        font-size: 18px;
    }

    #drop {
        margin-top: 20px;
        text-align: center;
    }

    #com {
        margin-top: 30px;
    }

    .form-select {
        width: 100%;
        height: 50px;
        background-color: #297289;
        color: white;
        font-size: 18px;
        border-radius: 5px;
    }

    .bgColor {
        background-color: #297289;
        color: white;
    }
</style>
<body>
    <?php include './frame.php'; ?>
    <main>
        <div id="img-container">
            <?php
                if($professorData['profilePicPath'] != NULL){
                    $path = $professorData['profilePicPath'];
                }else{
                    $path = '../assets/img/noPFP.jpg';
                }
            ?>
            <img src="<?php echo $path; ?>" alt="Profile Picture" id="img" class="img-fluid rounded-circle">
            <h4 id="text">Professor Name</h4>
            <form action="../controller/Professor_PictureController.php" method="post" enctype="multipart/form-data">
                <label for="profilePic" class="form-label">Upload Profile Picture:</label>
                <input type="file" name="profilePic" id="profilePic" class="form-control mb-2">
                <input type="submit" value="Update Picture" class="btn btn-primary">
            </form>
        </div>

        <div id="nav">
            <div class="container">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="./professor_viewStudents.php"><h3 class="color">View Students</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./both_viewCourses.php"><h3 class="color">View Courses</h3></a>
                    </li>
                </ul>
            </div>
        </div>

        <form action="../controller/professor_homeQuestionController.php" method="get">
            <div id="drop">
                <div class="dropdown">
                    <select id="courseId" name="courseId" class="form-select" required>
                        <?php
                        foreach ($data as $course) {
                            echo '<option value="' . $course['courseId'] . '">' . $course['subjectCode'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div id="com" class="container mt-3">
                <div class="mb-3 mt-3">
                    <label for="comment"><h5>Enter the Question:</h5></label>
                    <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary bgColor">Submit</button>
                <p style="color: <?php echo $color; ?>; font-size: 14px;"><?php echo $message ?></p>
            </div>
        </form>
    </main>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
                      

<?php  }
else{
    header('Location: ../views/signIn.php');
} 

?>


