<?php
    include '../models/StudentEnrolledCourse.php';
    include '../models/CourseClass.php';
    $studentEnrolledCourse = new StudentEnrolledCourse();
    $course = new Course();

    $coursesEnrolled = $studentEnrolledCourse->getEnrolledCourses($_SESSION['id']);
    if($coursesEnrolled){
        for($i = 0; $i < sizeOf($coursesEnrolled); $i++){
            $data[$i] = $course->getCourseById($coursesEnrolled[$i]['courseId']);
        }
    }