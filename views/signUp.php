<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/signUp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Sign Up</h5>
            
            <form action="../controller/signUpcontroller.php" method="post" class="form-control">
                <div class="mb-3">
                    <input type="text" class="input" id="fname" name="fname" placeholder="First Name" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="input" id="lname" name="lname" placeholder="Last Name" required>
                </div>
                <div class="mb-3">
                    <input type="number" class="input" id="phoneNumber" name="phoneNumber" placeholder="PhoneNumber" required>
                </div>
                <div class="mb-3">
                    <input type="number" class="input" id="nationalId" name="nationalId" placeholder="National ID" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="input" id="email" name="email" placeholder="Email or UserName" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="input" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <label for="userLevel">Select Your Level:</label>
                    <select id="userLevel" name="userLevel" class="form-select" required>
                        <option value="1">Level 1</option>
                        <option value="2">Level 2</option>
                        <option value="3">Level 3</option>
                        <option value="4">Level 4</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
            <br>
            <p>Don’t have an account? <a href="./signIn.php"> Sign In</a></p>
        </div>
    </div>
</body>
</html>
