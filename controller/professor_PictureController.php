<?php

require_once '../models/ProfessorClass.php'; 

class Professor_PictureController {
    private $professorModel;

    public function __construct() {
        $this->professorModel = new Professor();
    }

    public function updateProfilePic() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

            if (!isset($_SESSION['id'])) {
                header('Location: login.php');
                exit();
            }

            $professorId = $_SESSION['id'];

            // to Check if a file was uploaded without errors
            if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {

                $uploadDir ='../assets/update_profile_image/'; 

                $uploadPath = $uploadDir . uniqid('profilePic_') . '_' . basename($_FILES['profilePic']['name']);


                if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $uploadPath)) {
                    // Update  picture path in db
                    $this->professorModel->updateProfilePicPath($professorId, $uploadPath);

                    header('Location: ../views/professor_home.php');
                    exit();
                } else {
                    echo 'Error uploading file.';
                }
            } else {
                echo 'Error submitting form.';
            }
        }
    }
}

$controller = new professor_PictureController();
$controller->updateProfilePic();
?>
