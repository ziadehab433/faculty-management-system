<?php 
    $error = '';
    $parts = parse_url($_SERVER['REQUEST_URI']);
    if(isset($parts['query'])){
        parse_str($parts['query'], $query);
        $error = $query['error'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/signIn.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Sign In</h5>
            
            <form action="../controller/SignInController.php" method="post" class="form-control">
                <div class="mb-3">
                    <input type="text" class="input" id="email" name="email" placeholder="Email or UserName" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="input" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3 checkbox-container">
                    <input type="checkbox" name="haveAccount">
                    <label>Remember me</label>
                </div>
                <p style="color: red; font-size: 14px;"><?php echo $error ?></p>

                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
            <br>
            <p>Don’t have an account? <a href="./signUp.php"> Sign Up</a></p>
        </div>
    </div>
</body>
</html>
