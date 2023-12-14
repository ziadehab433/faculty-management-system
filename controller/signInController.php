<?php

include_once __DIR__ . '/../models/StudentClass.php'; 
include_once __DIR__ . '/../models/ProfessorClass.php'; 
include_once __DIR__ . '/../models/AdminClass.php'; 


class LoginController {

 /*   // Assuming you have a method to render the login view
    public function showLoginView() {
        // Include your login view file (login.php or similar)
        include_once __DIR__ . '/../views/login.php';
    }

    */
    // Method to handle the login form submission

    // v.1.3
    public function checkLogin() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST')                   {
            include_once __DIR__ . '/../models/StudentClass.php'; 


            $studentModel = new Student();  
            $professorModel = new Professor();
            $adminModel = new Admin();

// in the html page the input username or password has name & id ="email"  ~~~~~~~~~ so post i wrote email
            $usernameOrEmail = $_POST['email'];  
            $password = $_POST['password'];

            if ($studentModel->login($usernameOrEmail, $password)) {
                // Determine user type and redirect
    
                header("Location: ../views/student_home.php");
                    exit();
                }
                elseif($professorModel->login($usernameOrEmail, $password)) {
                    header("Location: ../views/professor_home.php");
                    exit();
                }
                elseif($adminModel->login($usernameOrEmail, $password)) {
                    header("Location: ../views/admin_home.php");
                    exit();
                }
                
             else {
                header('Location: ../views/signIn.php?error=Login failed. Invalid email or password.');
            }


        }

    }

            /////////////////////////////////////////////////////////////////////
   /*             if ($userType === "student") {
                    header("Location: ../views/student_home.php");
                    exit();
                } elseif ($userType === "professor") {
                    header("Location: ../views/professor_home.php");
                    exit();
                } elseif ($userType === "admin") {
                    header("Location: ../views/admin_home.php");
                    exit();
                }
            } else {
                echo "Login failed. Invalid email or password.";
            }

///////////////////////////////////////////////////////////////////////////////////
*/








            /*
            $email = $_POST['email'];
            $password = $_POST['password'];
            // object of  the student model
            $studentModel = new student();
            //object of the proff class 
            $professorModel = new Professor();
            //object of admin model 
            $adminModel = new Admin();
        
$person;

if (filter_var($person, FILTER_VALIDATE_EMAIL)){
    
    $person=$studentModel;
                // Call the login method from the student model
                if ($person->login($email, $password)) {




                 // if sucess go to home page for student
                        header("location: ../views/student_home.php");
                        exit();
                    } 
}


            
            elseif((preg_match('/^[a-zA-Z0-9_]+$/', $person))){
                $person = $professorModel;
                    if($person->login($usernameOrEmail , $password)){
                // if sucess go to home page for proff
                header("location: ../views/professor_home.php");
                exit();
                    }
                elseif((preg_match('/^[a-zA-Z0-9_]+$/', $input))){
                    $person = $AdninModel;
                    if($person->login($usernameOrEmail, $password)){
                        header("location: ../view/admin_home.php");
                }

            }
             
         
            
            

            else {
                echo "Login failed. Invalid email or password.";
         */  
        
        
        
        
        
        
        } 
        
        $signIn = new LoginController();
        $signIn->checkLogin();
    




?>
