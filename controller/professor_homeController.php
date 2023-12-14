<?php 
    include '../models/CourseClass.php';
    include '../models/ProfessorClass.php';
    $course = new Course();
    $professor = new Professor();

    $data = $course->getCoursesByProfessorId($_SESSION['id']);
    $professorData = $professor->getProfilePicPath($_SESSION['id']);
