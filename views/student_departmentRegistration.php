<?php
session_start();
if ($_SESSION['id'] && $_SESSION['type'] == 'student') {

    require_once("../models/DepartmentClass.php");
    $department = new Department();

    $result = $department->getAllDepartments();

    if ($result === false) {
        echo "Error: Problem fetching department data.";
        exit();
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/frame.css">
        <link rel="stylesheet" href="../assets/css/courseRegistration.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <title>Department Registration</title>
    </head>

    <body>

        <?php include './frame.php'; ?>

        <main>

            <form method="get" action="../controller/student_departmentRegistrationController.php">
                <table>
                    <tr>
                        <th>Department Name</th>
                        <th>Department Description</th>
                        <th class="checkbox-cell">Select</th>
                    </tr>
                    <tr>
                            <?php
                            if (!empty($result)) {
                                foreach ($result as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td > <input type='radio' name='selectedRows[]' value='" . $row['id'] . "'></td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                    </tr>
                </table>
                
                <div class="confirm-button">
                    <button type="submit" name="submitButton">Confirm</button>
                </div>
            </form>
        </main>
    </body>

    </html>

<?php } else {
    header('Location: ./signIn.php');
} ?>