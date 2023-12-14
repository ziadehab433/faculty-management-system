<?php
    include '../models/studentEnrolledCourse.php';
    include '../models/CourseClass.php';
    include '../models/ProfessorClass.php';

    $studentEnrolledCourse = new StudentEnrolledCourse();
    $studentEnrolledCourses = $studentEnrolledCourse->getEnrolledCourses($_SESSION['id']);

    if ($studentEnrolledCourses) {
        $course = new Course();
        $professor = new Professor();
        for ($i = 0; $i < sizeof($studentEnrolledCourses); $i++) {
            $data[$i] = $course->getCourseById($studentEnrolledCourses[$i]['courseId']);
            $data[$i] += $professor->getProfessorById($data[$i]['profId']); 
        }
    }
