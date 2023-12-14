<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['submitButton'])) {
        if (isset($_GET['selectedRows']) && is_array($_GET['selectedRows'])){ 
            $selectedRow = $_GET['selectedRows'][0];
            header("Location: ../views/student_courseRegistration.php?selectedDepartmentId=$selectedRow");
            exit();
        }
    }
}
?>