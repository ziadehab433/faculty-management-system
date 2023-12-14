<?php
    session_start();
    if(!$_SESSION['username']){
        header('Location: ./signIn.php');
    }
require_once("../include/DatabaseClass.php");
$db = new database(); 

$query = "SELECT * FROM professor";
$result = $db->display($query);

if ($result === false) {
    echo "Error: Problem fetching professor data.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/frame.css" />
    <link rel="stylesheet" href="../assets/css/professors.css" />
    <link rel="stylesheet" href="../assets/css/professorsbruuhh.css" />
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

        #addProfessorTable input {
            width: 80%;
        }
    </style>
    <title>Professor Table</title>
</head>

<body>
    <header>
        <p>Admin</p>
        <a href="../controller/LogoutController.php">Log Out</a>
    </header>  
    <main>
        <!-- Display the data from the database -->
        <h2>Professor Table</h2>
        <table id="professorTable">
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $row) :
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['degree']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['nationalId']; ?></td>
                        <td><?php echo $row['dateOfBirth']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['phoneNumber']; ?></td>
                        <td><?php echo $row['departmentId']; ?></td>
                        <td>
                            <button type="button" class="btn delete-btn" onclick="deleteRow(this)">Delete</button>
                            <button type="button" class="btn update-btn" onclick="updateProfessor(this.parentElement.parentElement)">Update</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Add a new professor to the database -->
        <h2>Add New Professor</h2>
        <form action="../controller/admin_professorController.php" method="post">

            <input type="hidden" name="action" value="add">
            <table id="addprofTable">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Degree</th>
                        <th>Gender</th>
                        <th>National ID</th>
                        <th>Date of Birth</th>
                        <th>User Name</th>
                        <th>password</th>
                        <th>Phone Number</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="fname" id="addFirstName" placeholder="First Name"></td>
                        <td><input type="text" name="lname" id="addLastName" placeholder="Last Name"></td>
                        <td><input type="text" name="degree" id="addDegree" placeholder="Degree"></td>
                        <td><input type="text" name="gender" id="addGender" placeholder="Gender"></td>
                        <td><input type="text" name="nationalId" id="addNationalID" placeholder="National ID"></td>
                        <td><input type="text" name="dateOfBirth" id="addDateOfBirth" placeholder="Date of Birth"></td>
                        <td><input type="text" name="username" id="addUserName" placeholder="User Name"></td>
                        <td><input type="text" name="password" id="password" placeholder="User Name"></td>
                        <td><input type="text" name="phoneNumber" id="addPhoneNumber" placeholder="Phone Number"></td>
                        <td><input type="text" name="departmentId" id="addDepartment" placeholder="Department"></td>
                        <td><button type="submit" class="btn add-btn">Add</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
  
                <h2>Update / Delete Professor</h2>
                <!-- Form for updating a professor -->
                <form action="../controller/admin_professorController.php" method="post">
                    <input type="hidden" name="action" value="update">

                    <!-- Input field for Professor ID to update -->
                    <label for="updateId">Professor ID:</label>
                    <input type="text" name="updateId" id="updateId" placeholder="Enter ID">

                    <!-- Input fields for updated information -->
                    <label for="newFirstName">New First Name:</label>
                    <input type="text" name="newFirstName" id="newFirstName" placeholder="New First Name">
                    <label for="newLastName">New Last Name:</label>
                    <input type="text" name="newLastName" id="newLastName" placeholder="New Last Name">
                    <label for="newDegree">New Degree:</label>
                    <input type="text" name="newDegree" id="newDegree" placeholder="New Degree">
                    <!-- Add other fields similarly -->

                    <!-- Update button -->
                    <button type="submit" class="btn update-btn">Update</button>
                </form>

                <!-- Form for deleting a professor -->
                <form action="../controller/adminprofcontroller.php" method="post">
                    <input type="hidden" name="action" value="delete">

                    <!-- Input field for Professor ID to delete -->
                    <label for="deleteId">Professor ID:</label>
                    <input type="text" name="deleteId" id="deleteId" placeholder="Enter ID">

                    <!-- Delete button -->
                    <button type="submit" class="btn delete-btn">Delete</button>
                </form>


    </main>

    <script>
        function addProfessor() {
            // Get values from the input fields and dropdown
            var firstName = document.getElementById('addFirstName').value;
            var lastName = document.getElementById('addLastName').value;
            var degree = document.getElementById('addDegree').value;
            var gender = document.getElementById('addGender').value;
            var nationalId = document.getElementById('addNationalID').value;
            var dateOfBirth = document.getElementById('addDateOfBirth').value;
            var userName = document.getElementById('addUserName').value;
            var phoneNumber = document.getElementById('addPhoneNumber').value;
            var department = document.getElementById('addDepartment').value;
            var course = document.getElementById('addCourses').value;

            // Create a new row
            var table = document.getElementById('professorTable');
            var newRow = table.insertRow(1); // Insert at the second position (below the header)

            // Insert cells with the professor's information
            var cellIndex = 0;
            newRow.insertCell(cellIndex++).innerHTML = 'New ID'; // Replace 'New ID' with the actual ID
            newRow.insertCell(cellIndex++).innerHTML = firstName;
            newRow.insertCell(cellIndex++).innerHTML = lastName;
            newRow.insertCell(cellIndex++).innerHTML = degree;
            newRow.insertCell(cellIndex++).innerHTML = gender;
            newRow.insertCell(cellIndex++).innerHTML = nationalId;
            newRow.insertCell(cellIndex++).innerHTML = dateOfBirth;
            newRow.insertCell(cellIndex++).innerHTML = userName;
            newRow.insertCell(cellIndex++).innerHTML = phoneNumber;
            newRow.insertCell(cellIndex++).innerHTML = department;
            newRow.insertCell(cellIndex++).innerHTML = course;

            // Create action buttons in the last cell
            var actionsCell = newRow.insertCell(cellIndex++);
            actionsCell.innerHTML = '<button class="btn delete-btn" onclick="deleteRow(this)">Delete</button>';
            actionsCell.innerHTML += '<button class="btn update-btn" onclick="updateProfessor(this.parentElement.parentElement)">Update</button>';
        }

        function updateProfessor(row) {
            // Get values from the row
            var id = row.cells[0].innerHTML;
            var firstName = row.cells[1].innerHTML;
            var lastName = row.cells[2].innerHTML;
            var degree = row.cells[3].innerHTML;
            var gender = row.cells[4].innerHTML;
            var nationalId = row.cells[5].innerHTML;
            var dateOfBirth = row.cells[6].innerHTML;
            var userName = row.cells[7].innerHTML;
            var phoneNumber = row.cells[8].innerHTML;
            var department = row.cells[9].innerHTML;
            var course = row.cells[10].innerHTML;

            // Prompt user for new data
            var newFirstName = prompt("Enter new First Name:", firstName);
            var newLastName = prompt("Enter new Last Name:", lastName);
            var newDegree = prompt("Enter new Degree:", degree);
            var newGender = prompt("Enter new Gender:", gender);
            var newNationalId = prompt("Enter new National ID:", nationalId);
            var newDateOfBirth = prompt("Enter new Date of Birth:", dateOfBirth);
            var newUserName = prompt("Enter new User Name:", userName);
            var newPhoneNumber = prompt("Enter new Phone Number:", phoneNumber);
            var newDepartment = prompt("Enter new Department:", department);
            var newCourse = prompt("Enter new Course:", course);

            // Update the row with new data
            row.cells[1].innerHTML = newFirstName;
            row.cells[2].innerHTML = newLastName;
            row.cells[3].innerHTML = newDegree;
            row.cells[4].innerHTML = newGender;
            row.cells[5].innerHTML = newNationalId;
            row.cells[6].innerHTML = newDateOfBirth;
            row.cells[7].innerHTML = newUserName;
            row.cells[8].innerHTML = newPhoneNumber;
            row.cells[9].innerHTML = newDepartment;
            row.cells[10].innerHTML = newCourse;
        }

        function deleteRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
</body>

</html>
