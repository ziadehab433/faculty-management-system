<?php
    session_start();
    include '../models/StudentEnrolledCourse.php';
    if(isset($_POST['submit'])){
        $enrolledCourse = new StudentEnrolledCourse();
        $courseIds = $_POST['courseIds'];
        if($courseIds){
            foreach($courseIds as $courseId){
                $enrolledCourse->enrollCourse($_SESSION['id'], $courseId);
            }
            header('Location: ../views/student_home.php');
        }
    }