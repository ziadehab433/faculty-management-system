<?php
    include '../models/CourseClass.php';
    $course = new Course();

    $data = $course->getCoursesByProfessorId($_SESSION['id']);