<?php

require_once("../models/CourseClass.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $subjectCode = $_POST['subjectCode'];
    $profId = $_POST['profId'];
    $time = $_POST['time'];
    $weekDayNum= $_POST['weekDay'];
    $room = $_POST['roomNumber'];
    $departmentId = $_POST['departmentId'];
    
    $course = new Course();
    $Result = $course->addcourse($subjectCode, $profId, $time, $weekDayNum, $room, $departmentId);

}
?>