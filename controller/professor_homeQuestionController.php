
<?php

include '../models/CourseClass.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
  
    $question = $_GET["text"];
    $courseId = $_GET['courseId'];

   
    if (empty($questionText)) {
        header('Location: ../views/professor_home.php?error=The Question And Course Fields Should Not Be Empty');
    }

    $course = new Course();
    if(!$course->updateQuestion($courseId, $question)){
        header('Location: ../views/professor_home.php?error=Problem With Sending The Question'); 
    }else{
        header('Location: ../views/professor_home.php?state=Question Sent Successfully');
    }

   
} else {

    echo "Invalid request.";
}
?>
