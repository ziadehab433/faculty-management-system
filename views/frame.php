    <header>
        <p>Welcome name</p>
        <a href="../controller/LogoutController.php">Log Out</a>
    </header>  
    <nav>
        <div class="topIcons">
            <a href="./<?php echo $_SESSION['type'] == 'student'? 'student_home.php': 'professor_home.php'; ?>">
                <div class="iconContainer">
                    <img src="../assets/icons/home.png" alt="">
                </div>
            </a>
            <a href="./both_timeTable.php">
                <div class="iconContainer">
                    <img src="../assets/icons/clipboard.png" alt="">
                </div>
            </a>
            <?php if($_SESSION['type'] == 'student'){ ?>
            <a href="./student_questions.php">
                <div class="iconContainer">
                    <img src="../assets/icons/question-mark.png" alt="">
                </div>
            </a>
            <?php } ?>
        </div>
        <div class="bottomIcons">
            <div class="iconContainer">
                <img src="../assets/icons/question.png" alt="">
            </div>
            <div class="iconContainer">
                <img src="../assets/icons/setting.png" alt="">
            </div>
        </div>
    </nav>