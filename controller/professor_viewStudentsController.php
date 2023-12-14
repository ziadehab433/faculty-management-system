<?php 
    include '../models/CourseClass.php';
    $course = new Course();
    $courses = $course->getCoursesByProfessorId($_SESSION['id']);
    include '../models/StudentEnrolledCourse.php';
    $studentEnrolled = new StudentEnrolledCourse();

    for($i = 0; $i < sizeof($courses); $i++){
       $data[$i] = $studentEnrolled->getStudentsEnrolled($courses[$i]['courseId']);  
    }
    include '../models/StudentClass.php';
    $student = new Student();

    for($i = 0; $i < sizeof($data); $i++){
        for($j = 0; $j < sizeof($data[$i]); $j++){
            $newData[$j] = $student->getStudentById($data[$i][$j]['studentId']); 
        }
    }

    