<?php
include_once '../models/StudentEnrolledCourse.php';
include_once '../models/StudentClass.php';

$studentObj = new student();
$studentId = $studentObj->getID();

function displayTermResults($studentId) {
    $enrolledCourseObj = new StudentEnrolledCourse();
    $grades = $enrolledCourseObj->getGrades($studentId);
    return $grades ;
}

$studentId = $_SESSION['id'];
$termResults = displayTermResults($studentId);
?>