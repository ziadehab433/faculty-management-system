<?php
include_once '../models/StudentEnrolledCourse.php';
include_once '../models/StudentClass.php';

$studentObj = new student();
$studentId = $studentObj->getID();

function displayTranscript($studentId) {
    $enrolledCourseObj = new StudentEnrolledCourse();
    $transcript = $enrolledCourseObj->getTranscript($studentId);
    return $transcript;
}

$transcript = displayTranscript($_SESSION['id']);