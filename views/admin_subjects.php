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
        #addSubjectTable input,
        #addSubjectTable select {
            width: 80%;
        }
    </style>
    <title>Subject Table</title>
</head>

<body>
    <header>
        <p>Admin</p>
        <a href="../controller/LogoutController.php">Log Out</a>
    </header>  
    <main>
        <h2>Add New Subject</h2>
        <table id="addSubjectTable">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Level</th>
                    <th>Semester</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>New ID</td>
                    <td><input type="text" id="addSubjectName" placeholder="Subject Name"></td>
                    <td><input type="text" id="addDescription" placeholder="Description"></td>
                    <td><input type="text" id="addLevel" placeholder="Level"></td>
                    <td><input type="text" id="addSemester" placeholder="Semester"></td>
                    <td><button class="btn add-btn" onclick="addSubject()">Add</button></td>
                </tr>
            </tbody>
        </table>

        <h2>Subject Table</h2>
        <table id="subjectTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject Name</th>
                    <th>Description</th>
                    <th>Level</th>
                    <th>Semester</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Math 101</td>
                    <td>Description here</td>
                    <td>3</td>
                    <td>Fall 2023</td>
                    <td>
                        <button class="btn delete-btn">Delete</button>
                        <button class="btn update-btn" onclick="updateSubject(this.parentElement.parentElement)">Update</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </main>

    <script>
        function addSubject() {
            // Get values from the input fields
            var subjectName = document.getElementById('addSubjectName').value;
            var description = document.getElementById('addDescription').value;
            var level = document.getElementById('addLevel').value;
            var semester = document.getElementById('addSemester').value;

            // Create a new row
            var table = document.getElementById('subjectTable');
            var newRow = table.insertRow(1); // Insert at the second position (below the header)

            // Insert cells with the subject's information
            var cellIndex = 0;
            newRow.insertCell(cellIndex++).innerHTML = 'New ID'; // Replace 'New ID' with the actual ID
            newRow.insertCell(cellIndex++).innerHTML = subjectName;
            newRow.insertCell(cellIndex++).innerHTML = description;
            newRow.insertCell(cellIndex++).innerHTML = level;
            newRow.insertCell(cellIndex++).innerHTML = semester;

            // Create action buttons in the last cell
            var actionsCell = newRow.insertCell(cellIndex++);
            actionsCell.innerHTML = '<button class="btn delete-btn" onclick="deleteRow(this)">Delete</button>';
            actionsCell.innerHTML += '<button class="btn update-btn" onclick="updateSubject(this.parentElement.parentElement)">Update</button>';
        }

        function updateSubject(row) {
            // Get values from the row
            var id = row.cells[0].innerHTML;
            var subjectName = row.cells[1].innerHTML;
            var description = row.cells[2].innerHTML;
            var level = row.cells[3].innerHTML;
            var semester = row.cells[4].innerHTML;

            // Prompt user for new data
            var newSubjectName = prompt("Enter new Subject Name:", subjectName);
            var newDescription = prompt("Enter new Description:", description);
            var newLevel = prompt("Enter new Level:", level);
            var newSemester = prompt("Enter new Semester:", semester);

            // Update the row with new data
            row.cells[1].innerHTML = newSubjectName;
            row.cells[2].innerHTML = newDescription;
            row.cells[3].innerHTML = newLevel;
            row.cells[4].innerHTML = newSemester;
        }

        function deleteRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
</body>

</html>