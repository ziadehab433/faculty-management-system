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

        /* Adjust the width of the input fields and dropdown list */
        #addLevelTable input {
            width: 80%;
        }
    </style>
    <title>Add Level</title>
</head>

<body>
    <header>
        <p>Admin</p>
        <a href="../controller/LogoutController.php">Log Out</a>
    </header>  
    <main>
        <h2>Add New Level</h2>
        <table id="addLevelTable">
            <thead>
                <tr>
                    <th>Level Number</th>
                    <th>Enrolled Students</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" id="addLevelNumber" placeholder="Level Number"></td>
                    <td><input type="text" id="addEnrolledStudents" placeholder="Enrolled Students"></td>
                    <td><button class="btn add-btn" onclick="addLevel()">Add</button></td>
                </tr>
            </tbody>
        </table>

        <h2>Level Table</h2>
        <table id="levelTable">
            <thead>
                <tr>
                    <th>Level Number</th>
                    <th>Enrolled Students</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample row, add more rows dynamically using JavaScript -->
                <tr>
                    <td>1</td>
                    <td>50</td>
                    <td>
                        <button class="btn delete-btn" onclick="deleteRow(this)">Delete</button>
                        <button class="btn update-btn" onclick="updateLevel(this.parentElement.parentElement)">Update</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <script>
        function addLevel() {
            // Get values from the input fields
            var levelNumber = document.getElementById('addLevelNumber').value;
            var enrolledStudents = document.getElementById('addEnrolledStudents').value;

            // Create a new row
            var table = document.getElementById('levelTable');
            var newRow = table.insertRow(1); // Insert at the second position (below the header)

            // Insert cells with the level information
            var cellIndex = 0;
            newRow.insertCell(cellIndex++).innerHTML = levelNumber;
            newRow.insertCell(cellIndex++).innerHTML = enrolledStudents;

            // Create action buttons in the last cell
            var actionsCell = newRow.insertCell(cellIndex++);
            actionsCell.innerHTML = '<button class="btn delete-btn" onclick="deleteRow(this)">Delete</button>';
            actionsCell.innerHTML += '<button class="btn update-btn" onclick="updateLevel(this.parentElement.parentElement)">Update</button>';
        }

        function updateLevel(row) {
            // Get values from the row
            var levelNumber = row.cells[0].innerHTML;
            var enrolledStudents = row.cells[1].innerHTML;

            // Prompt user for new data
            var newLevelNumber = prompt("Enter new Level Number:", levelNumber);
            var newEnrolledStudents = prompt("Enter new Enrolled Students:", enrolledStudents);

            // Update the row with new data
            row.cells[0].innerHTML = newLevelNumber;
            row.cells[1].innerHTML = newEnrolledStudents;
        }

        function deleteRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
</body>

</html>
