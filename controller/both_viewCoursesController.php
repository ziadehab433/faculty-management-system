<?php
require '../models/CourseClass.php';
require '../models/StudentEnrolledCourse.php';


function getEnrolledCoursesData($studentId) {
    $course = new Course();
    $EnrolledCourseObj = new StudentEnrolledCourse();
    $enrolledCourses = $EnrolledCourseObj->getEnrolledCourses($studentId);
    for($i = 0; $i < sizeof($enrolledCourses); $i++){
        $enrolledCourses[$i] = $course->getCourseById($enrolledCourses[$i]['courseId']);
    }
    return $enrolledCourses;
}

function getCoursesForProfessor($profId){
    $course = new Course();
    $courses = $course->getCoursesByProfessorId($profId);
    return $courses;
}

    $id = $_SESSION['id'];
    if($_SESSION['type'] == 'student'){
        $enrolledCourses = getEnrolledCoursesData($id);
    }else{
        $enrolledCourses = getCoursesForProfessor($id);
    }

?>
