<?php
include '../models/StudentClass.php';

class SignUpController {


    /*
// v1.1

    // Method to handle the sign-up form submission
    public function checkSignUp() {
        // Check if the sign-up form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phoneNumber = $_POST['phoneNumber'];
            $nationalId = $_POST['nationalId'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $studentModel = new student();

            // Call the SignUp method from student model
            if ($studentModel->SignUp($fname, $lname, $phoneNumber, $nationalId, $email, $password)) {

                header("location: ../views/student_home.php");
                exit();
            }

             else {
                echo "Sign-up failed. National ID OR Email already exists " ;
                    }
                        }
    }

    */


// v.1.2

    public function checkSignUp() {
        // Check if the sign-up form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phoneNumber = $_POST['phoneNumber'];
            $nationalId = $_POST['nationalId'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $levelNumber = $_POST['userLevel'];
    
            //correct email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format.";
                return;
            }
    
            // Hash the password before storing it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            $studentModel = new Student(); // Assuming your class name is Student
    
            // Call the SignUp method from the student model
            if ($studentModel->SignUp($fname, $lname, $phoneNumber, $nationalId, $email, $hashedPassword, $levelNumber)) {
                header("Location: ../views/student_home.php");
                exit();
            } else {
                echo "Sign-up failed. National ID or Email already exists.";
            }
        }
    }
    
}

$signUp = new SignUpController();
$signUp->checkSignUp();


?>
