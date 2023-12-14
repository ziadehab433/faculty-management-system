<?php 
    session_start();
    if($_SESSION['id']){
        $file = $_SESSION['type'] == 'student' ? 'student_timeTableController.php' : 'professor_timeTableController.php';        
        include '../controller/' . $file; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/frame.css">
    <link rel="stylesheet" href="../assets/css/timeTable.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>bruhhhhhhhh</title>
</head>
<body>

    <?php include './frame.php'; ?>

    <main>
        <body>

            <?php if($data){  
                $weekDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];
            ?>

            <table>
                <tr> <th>TIME/DAY</th>
                    <th>08:00</th>
                    <th>10:00</th>
                   
                    <th>12:00</th>
                    <th>02:00</th>
                    <th>04:00</th>
                </tr>
                <?php 
                    $weekDayNum = 0;
                    foreach($weekDays as $weekDay){
                        echo '<tr>
                                <td>' . $weekDay . '</td>
                        ';

                        $time = 8;
                        $flag = false;
                        for($i = 0; $i < 5; $i++){
                            for($j = 0; $j < sizeOf($data); $j++){
                                if(explode(":", $data[$j]['time'])[0] == $time && $data[$j]['weekDayNum'] == $weekDayNum){
                                    echo "<th>" . $data[$j]['subjectCode'] . "</th>";
                                    $flag = true;
                                    break;
                                }
                            }
                            if(!$flag){
                                echo '<th>----</th>';
                            }else{
                                $flag = false;
                            }
                            $time += 2;
                            if($time > 12){
                                $time = $time - 12;
                            }
                        }
                        echo '</tr>';
                        $weekDayNum += 1;
                    }
                ?>
            <?php }else{
                echo "<h1>You Haven't Registered Any Courses Yet......</h1>";
            } ?>
        
        </body>  
    </main>
</body>
</html>

<?php }else{
    header('Location: ./signIn.php');
} ?>