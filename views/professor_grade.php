<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/grade.css">
    <link rel="stylesheet" href="../assets/css/frame.css">
</head>

<body>
    
    <?php include './frame.php'; ?>

    <main>
        <section id="students">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample data, replace this with dynamic data from your backend -->
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td><input type="text" id="grade-1" name="grade[]" placeholder="Enter grade"></td>
                        <td><button onclick="addGrade(1, 'John Doe')">Submit</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td><input type="text" id="grade-2" name="grade[]" placeholder="Enter grade"></td>
                        <td><button onclick="addGrade(2, 'Jane Smith')">Submit</button></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </section>
    </main>

    <script>
        function addGrade(studentId, studentName) {
            var gradeInput = document.getElementById('grade-' + studentId);
            var grade = gradeInput.value;

            // Add your logic to handle the grade, e.g., send an AJAX request to your backend to save the grade

            // For now, let's display an alert with the entered grade
            alert('Grade for ' + studentName + ' (ID: ' + studentId + '): ' + grade);
        }
    </script>
</body>

</html>
