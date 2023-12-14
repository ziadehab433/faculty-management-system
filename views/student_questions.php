<?php 
    session_start();
    if($_SESSION['id'] && $_SESSION['type'] == 'student'){
    include '../controller/student_questionsController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="'width=device-width ,initial-scale =1.0">
<title>Home page </title>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet"\>
<link href="../assets/css/questions.css" rel="stylesheet"\>
<link rel="stylesheet" href="../assets/css/frame.css">
</head>
<body>
    
    <?php include './frame.php'; ?>

    <main>
            <h1 class="h">Questions. </h1>
            <br>
            <br>
        <div class="container">
            <?php 
                $size = sizeof($data);
                $num = 0;
                foreach($data as $question){
                    if($question['question']){
                    echo ' 
                    <div>
                        <form style="display: flex; align-items: center;">
                        <div  id="firstQ" class="round3">' . $question['question'] . '<p>By: Dr.' . $question['fname'] . ' / Course: ' . $question['subjectCode'] . '</p></div><br>
                        <button type="button" class="button5" >Upload</button>
                        </form>
                    </div>
                    ';
                    }else{
                        $num++;
                    }
                }
                if($size == $num){
                    echo '
                        <h3>No Questions Yet....</h3>
                    ';
                }
            ?>
        </div>
    </main>
</body>


</html>

<?php }else{
    header('Location: ./signIn.php');
} ?>