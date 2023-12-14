<?php
session_start();
if(!$_SESSION['username']){
    header('Location: ../views/signIn.php');
}
require_once("../include/DatabaseClass.php"); 
$row=[];
// Check if the form is submitted
if (isset($_POST['add/update'])) {
    $departmentId = $_POST['departmentId'];
    
    // Sanitize user input to prevent SQL injection

    // Query to get professors associated with the department
    $query = "SELECT * FROM Professor WHERE departmentId = '$departmentId'";
    $result = $db->display($query);

    if ($result === false) {
        echo "Error: Problem fetching professor data.";
    } else {
        $row = $result;
    }
}
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
        /* Shared styles for both sections */
        .btn {
            border: 1px solid #84AFBC;
            width: auto;
            background: none;
            padding: 8px 16px;
            font-size: 15px;
            font-family: "montserrat";
            cursor: pointer;
            margin: 10px 5px;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            display: inline-block;
            text-decoration: none;
        }

        .add-btn {
            background-color: #3d6f7e;
            color: #fff;
        }

        .update-btn {
            background-color: #297289;
            color: #fff;
        }

        .delete-btn {
            background-color: #ffffff;
            color: #297289;
        }

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

        #departmentTable input,
        #departmentTable select {
            width: 80%;
        }

        #departmentDescription {
            margin: 20px 0;
            font-size: 16px;
            color: #333;
        }
    </style>
    <title>Department Page</title>
</head>

<body>
    <main>
        <h2>Add or Update Department</h2>
        <label for="departmentDropdown">Select Department:</label>
        <select id="departmentDropdown" onchange="displayProfessorsAndDescription()">
        </select>

        <p id="departmentDescription"></p>

        <h2>Professors in Department</h2>
        <form action ="">
        <table id="Professor">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Degree</th>
                    <th>Gender</th>
                    <th>National ID</th>
                    <th>Date of Birth</th>
                    <th>User Name</th>
                    <th>Phone Number</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    if (!empty($result)) {
                        foreach ($result as $row) {
                            echo "<tr>";
                    "<td>". $row['id'] ."</td>";
                     "<td>". $row['fname'] ."</td>";
                     "<td>". $row['lname'] ."</td>";
                     "<td>". $row['degree'] ."</td>";
                     "<td>". $row['gender'] ."</td>";
                     "<td>". $row['nationlId'] ."</td>";
                     "<td>". $row['dateOfBirth'] ."</td>";
                     "<td>". $row['username'] ."</td>";
                     "<td>". $row['password'] ."</td>";
                     "<td>". $row['departmentId']."</td>";
                            echo "</tr>";
                    
                }
            }
            ?>

                <tr>
                
                        <select class="course-dropdown">
                            <option value="Course 1">Course 1</option>
                            <option value="Course 2">Course 2</option>
                            <option value="Course 3">Course 3</option>
                            <option value="Course 4">Course 4</option>
                        </select>
                    </td>
                    </td>
                </tr>
            </tbody>
        </table>

        <form id="Professor" >
            <label for="departmentId">Department Id:</label>
            <input type="text" id="departmentId" required>
            <input type="submit" name="add/update" value ="add/update" Class="btn add-btn">
        </form>
        </form>
    </main>

    <script>
        function displayProfessorsAndDescription() {
            var selectedDepartment = document.getElementById('departmentDropdown').value;

            var table = document.getElementById('departmentTable');
            table.innerHTML = ""; // Clear existing rows

            var newRow = table.insertRow(0);
            var cellIndex = 0;
            newRow.insertCell(cellIndex++).innerHTML = '1';
            newRow.insertCell(cellIndex++).innerHTML = 'John';
            newRow.insertCell(cellIndex++).innerHTML = 'Doe';
            newRow.insertCell(cellIndex++).innerHTML = 'Ph.D.';
            newRow.insertCell(cellIndex++).innerHTML = 'Male';
            newRow.insertCell(cellIndex++).innerHTML = '123456789';
            newRow.insertCell(cellIndex++).innerHTML = '1990-01-01';
            newRow.insertCell(cellIndex++).innerHTML = 'johndoe';
            newRow.insertCell(cellIndex++).innerHTML = '1234567890';
            newRow.insertCell(cellIndex++).innerHTML = selectedDepartment;
            newRow.insertCell(cellIndex++).innerHTML = '<select class="course-dropdown"><option value="Course 1">Course 1</option><option value="Course 2">Course 2</option><option value="Course 3">Course 3</option><option value="Course 4">Course 4</option></select>';
            newRow.insertCell(cellIndex++).innerHTML = '<button class="btn update-btn" onclick="updateProfessor(this.parentElement.parentElement)">Update</button>';

            var departmentDescription = document.getElementById('departmentDescription');
            departmentDescription.innerHTML = getDepartmentDescription(selectedDepartment);
        }

        function updateProfessor(row) {
        }

        function addOrUpdateDepartment(event) {
            event.preventDefault();

            var departmentName = document.getElementById('departmentName').value;
            var departmentDescriptionInput = document.getElementById('departmentDescriptionInput').value;

            var dropdown = document.getElementById('departmentDropdown');
            var option = document.createElement('option');
            option.value = departmentName;
            option.text = departmentName;
            dropdown.add(option);

            document.getElementById('departmentName').value = "";
            document.getElementById('departmentDescriptionInput').value = "";

            var departmentDescription = document.getElementById('departmentDescription');
            departmentDescription.innerHTML = departmentDescriptionInput;
        }

        function getDepartmentDescription(departmentName) {
            switch (departmentName) {
                case 'Computer Science':
                    return 'The Computer Science department focuses on...';
                case 'Mathematics':
                    return 'The Mathematics department offers courses in...';
                case 'Physics':
                    return 'The Physics department explores the principles of...';
                default:
                    return 'Description not available.';
            }
        }
    </script>
</body>

</html>
