<?php 
    include '../models/StudentClass.php';
    include '../models/DepartmentClass.php';
    $parts = parse_url($_SERVER['REQUEST_URI']);
    parse_str($parts['query'], $query);
    $levelNumber = $query['levelNumber'];

    $student = new Student();
    $students = $student->getStudentByLevel($levelNumber);

    $department = new Department();
    for($i = 0; $i < sizeof($students); $i++){
        $deptId = $students[$i]['departmentId'];
        if($deptId != NULL){
            $students[$i]['departmentId'] = $department->getDepartmentById($deptId)['name'];
        }else{
            $students[$i]['departmentId'] = 'No Department';
        }
    }

    $data = $students;