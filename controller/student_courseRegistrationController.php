<?php 
    include '../models/courseClass.php';
    include '../models/StudentClass.php';

    $parts = parse_url($_SERVER['REQUEST_URI']);
    parse_str($parts['query'], $query);
    $departmentId = $query['selectedDepartmentId'];

    $course = new Course();
    $data = $course->getCoursesByDepartmentId($departmentId);

    $student = new Student();
    $student->updateDepartment($_SESSION['id'], $departmentId);

    