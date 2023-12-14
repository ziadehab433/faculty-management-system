<?php session_start(); 
    if($_SESSION['id'] && $_SESSION['type'] == 'student'){
        include '../models/StudentClass.php';
        $student = new Student();
        $studentData = $student->getProfilePicPath($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/frame.css">

    <style>
        body {
            background-color: #f8f9fa; 
        }

        .container {
            padding-top: 30px;
        }

        #img {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        #profilePic {
            width: 500%;
            max-width: 300px;
            margin: 10px 40%;
        }

        .btn-primary {
            background-color: #297289; 
            color: #ffffff; 
        }

        .btn-primary:hover {
            background-color: #84AFBC; 
        }

    </style>

    <title>Student Page</title>
</head>
<body>

    <?php include './frame.php'; ?>

    <main class="container text-center">
            <?php
                if($studentData['profilePicPath'] != NULL){
                    $path = $studentData['profilePicPath'];
                }else{
                    $path = '../assets/img/noPFP.jpg';
                }
            ?>
            <img src="<?php echo $path; ?>" alt="Profile Picture" id="img" class="img-fluid rounded-circle">

        <form action="../controller/Student_HomeController.php" method="post" enctype="multipart/form-data">
            <label for="profilePic" class="form-label">Upload Profile Picture:</label>
            <input type="file" name="profilePic" id="profilePic" class="form-control mb-2">
            <input type="submit" value="Update Picture" class="btn btn-primary">
        </form>

        <h4 id="text" class="mt-3">Student Name</h4>

        <a href="./student_departmentRegistration.php" class="text-decoration-none">
            <div class="row smallerWidthAndColor mt-4">
                <div class="col-12 btn btn-primary bt">Register Courses</div>
            </div>
        </a>

        <a href="./both_viewCourses.php" class="text-decoration-none">
            <div class="row smallerWidthAndColor mt-4">
                <div class="col-12 btn btn-primary bt">View Courses</div>
            </div>
        </a>

        <a href="./student_questions.php" class="text-decoration-none">
            <div class="row smallerWidthAndColor mt-4">
                <div class="col-12 btn btn-primary bt">Questions</div>
            </div>
        </a>

        <a href="./student_termResults.php" class="text-decoration-none">
            <div class="row smallerWidthAndColor mt-4">
                <div class="col-12 btn btn-primary bt">Term Results</div>
            </div>
        </a>

        <a href="./student_transcript.php" class="text-decoration-none">
            <div class="row smallerWidthAndColor mt-4">
                <div class="col-12 btn btn-primary bt">Transcript</div>
            </div>
        </a>

        <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    </main>

</body>
</html>

<?php }else{
    header('Location: ./signIn.php');
} ?>