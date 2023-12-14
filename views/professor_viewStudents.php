<?php 
    session_start();
    if($_SESSION['id'] && $_SESSION['type'] == 'professor'){
    include '../controller/professor_viewStudentsController.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/frame.css" />
    <link rel="stylesheet" href="../assets/css/levels.css" />
    <link rel="stylesheet" href="../assets/css/levelsbruuhh.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ddd;
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #84afbc;
        }

        tr:hover {
            background-color: #b0babd;
        }

        table,
        th {
            border: 1px solid #84afbc;
            border-radius: 10px;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        main {
            text-align: center;
        }

        #studentTable input {
            width: 80%;
        }
    </style>
    <title>Student Table</title>
</head>

<body>
    <?php include '../views/frame.php'; ?>
    <main>
        <h2>Student Table</h2>
        <table id="studentTable">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($newData as $student){
                        echo '
                            <tr>
                                <td>' . $student['id'] . '</td>
                                <td>' . $student['fname'] . $student['lname'] . '</td>
                                <td>' . $student['departmentId'] . '</td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>

<?php }else{
    header('Location: ./signIn.php');
} ?>
