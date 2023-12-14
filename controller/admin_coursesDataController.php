<?php
    include '../models/CourseClass.php';
    include '../models/SubjectClass.php';
    $course = new Course();
    $subject = new Subject();
    
    $professors = $course->getProfessorsForAddCourse();
    $departments = $course->getDepartmentsForAddCourse();
    $subjects = $subject->getAllSubjects();
    $rooms = $course->getRoomsForAddCourse();
