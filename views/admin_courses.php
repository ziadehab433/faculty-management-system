<?php 
    session_start();
    if($_SESSION['username']){
        include '../controller/admin_coursesDataController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/frame.css" />
    <link rel="stylesheet" href="../assets/css/levelsbruuhh.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>

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

        #addCourseTable input,
        #addCourseTable select {
            width: 80%;
        }
    </style>
    <title>Course Table</title>
</head>

<body>
    <header>
        <p>Admin</p>
        <a href="../controller/LogoutController.php">Log Out</a>
    </header>  
    <main>
        <h2>Add New Course</h2>
        <form action ="../controller/admin_coursesController.php" method="post">
        <table id="addCourseTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject Code</th>
                    <th>Professor</th>
                    <th>Week Day</th>
                    <th>Room</th>
                    <th>Department</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>New ID</td>
                    <td>
                        <select name="subjectCode" id="subjectCode">
                            <?php
                                for($i = 0; $i < sizeof($subjects); $i++){
                                    echo '<option value="' . $subjects[$i]['code'] . '">' . $subjects[$i]['code'] . '</option>';
                                }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="profId" id="profID">
                            <?php
                                for($i = 0; $i < sizeof($professors); $i++){
                                    echo '<option value="' . $professors[$i]['id'] . '">' . $professor[$i]['fname'] . '</option>';
                                }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="weekDay" id="weekDay">
                            <?php
                                $weekDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];
                                for($i = 0; $i < 5; $i++){
                                    echo '<option value="' . $i . '">' . $weekDays[$i] . '</option>';
                                }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="roomNumber" id="roomNumber">
                            <?php
                                for($i = 0; $i < sizeof($rooms); $i++){
                                    echo '<option value="' . $rooms[$i]['roomNumber'] . '">' . $rooms[$i]['roomNumber'] . '</option>';
                                }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="departmentId" id="departmentId">
                            <?php
                                for($i = 0; $i < sizeof($departments); $i++){
                                    echo '<option value="' . $departments[$i]['id'] . '">' . $departments[$i]['name'] . '</option>';
                                }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="time" id="time">
                                <option value="08:00:00">8</option>
                                <option value="10:00:00">10</option>
                                <option value="12:00:00">12</option>
                                <option value="02:00:00">2</option>
                                <option value="04:00:00">4</option>

                        </select>
                    </td>
                    <td><button type="submit" name="submit" class="btn add-btn" onclick="addCourse()">Add</button></td>
                </tr>
            </tbody>
        </table>

        <h2>Course Table</h2>
        <table id="courseTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>department</th>
                    <th>Professor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Math 101</td>
                    <td>3</td>
                    <td>
                        <select class="professor-dropdown">
                            <option value="Professor 1">Professor 1</option>
                            <option value="Professor 2">Professor 2</option>
                            <option value="Professor 3">Professor 3</option>
                            <option value="Professor 4">Professor 4</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn delete-btn">Delete</button>
                        <button class="btn update-btn" onclick="updateCourse(this.parentElement.parentElement)">Update</button>
                    </td>
                </tr>
            </tbody>
        </table>
        </form>
    </main>

    <script>
        function addCourse() {
            var courseName = document.getElementById('addCourseName').value;
            var department = document.getElementById('adddepartment').value;
            var professor = document.getElementById('addProfessors').value;

            var table = document.getElementById('courseTable');
            var newRow = table.insertRow(1); 

            var cellIndex = 0;
            newRow.insertCell(cellIndex++).innerHTML = 'New ID'; 
            newRow.insertCell(cellIndex++).innerHTML = courseName;
            newRow.insertCell(cellIndex++).innerHTML = department;
            newRow.insertCell(cellIndex++).innerHTML = professor;

            var actionsCell = newRow.insertCell(cellIndex++);
            actionsCell.innerHTML = '<button class="btn delete-btn" onclick="deleteRow(this)">Delete</button>';
            actionsCell.innerHTML += '<button class="btn update-btn" onclick="updateCourse(this.parentElement.parentElement)">Update</button>';
        }

        function updateCourse(row) {
            var id = row.cells[0].innerHTML;
            var courseName = row.cells[1].innerHTML;
            var department = row.cells[2].innerHTML;
            var professor = row.cells[3].innerHTML;

            var newCourseName = prompt("Enter new Course Name:", courseName);
            var newdepartment = prompt("Enter new Credit Hours:", department);
            var newProfessor = prompt("Enter new Professor:", professor);

            row.cells[1].innerHTML = newCourseName;
            row.cells[2].innerHTML = newdepartment;
            row.cells[3].innerHTML = newProfessor;
        }

        function deleteRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
</body>

</html>

<?php }else{
    header('Location: ../views/signIn.php');
} ?>