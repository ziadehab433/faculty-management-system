<?php
    class Professor {
        private $id;
        private $fname;
        private $lname;
        private $degree;
        private $gender;
        private $nationalId;
        private $dateOfBirth;
        private $username;
        private $password;
        private $phoneNumber;
        private $departmentId;
        private $profilePicPath;
        private $db;

        function __construct(){
            include_once __DIR__ . '/../include/DatabaseClass.php';
            $this->db = new database();
        }

        function login($username , $password) {
            $this->username = $username;
            $this->password = $password;
            
            $sql = "SELECT * FROM professor WHERE username='$this->username'";
            $row = $this->db->select($sql);
            
            if (password_verify($this->password, $row['password'])) {
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['type'] = 'professor';

                return true;
            }
            return false;
        }

        function logout() {
            session_start();
            unset($_SESSION['id']);
            unset($_SESSION['type']);
            session_destroy();
            header('Location: ../views/signIn.php');
        }
        
        function getAllProfessors(){
            $sql = 'SELECT * FROM professor';
            return $this->db->display($sql);
        }

        function getProfessorById($id){
            $sql = 'SELECT * FROM professor WHERE id = ' . $id;
            return $this->db->select($sql);
        }

        function insertProfessor($fname,  $lname,  $degree,  $gender,  $nationalId,  $dateOfBirth,  $username,  $password,  $phoneNumber, $departmentId){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO professor(fname,lname,degree,gender,nationalId,dateOfBirth,username,password,phoneNumber, departmentId) VALUES('$fname','$lname','$degree','$gender','$nationalId','$dateOfBirth','$username','$password','$phoneNumber', '$departmentId')";
            return $this->db->insert($sql);
        }

        function deleteProfesssor($id){
            $sql = "DELETE FROM professor WHERE id = '$id'";
            return $this->db->delete($sql);
        }

        function getProfessorsByDeptId($deptId){
            $sql = "SELECT * FROM professor WHERE departmentId = '$deptId'";
            return $this->db->display($sql);
        }

        function updateProfilePicPath($id , $newPath){
            $sql = "UPDATE professor SET profilePicPath = '" . $newPath . "' 
                    WHERE id = " . $id;
            $this->profilePicPath = $newPath;
            return $this->db->update($sql);
        }

        function getProfilePicPath($id){
            $sql = "SELECT profilePicPath FROM professor WHERE id = $id";
            return $this->db->select($sql);
        }
    }
?>