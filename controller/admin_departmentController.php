<?php
require_once("../include/DatabaseClass.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $professor = new Professor();
    $departmentId = $_POST['departmentNId'];
   
    $result = $professor->getProfessorsByDeptId($departmentId );
    $row = $result;
    include('../views/admin_department.php');
}
?>