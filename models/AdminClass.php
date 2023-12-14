<?php

class Admin {
    private $userName;
    private $password;
    
    private $db;

    public function __construct() {
        include_once '../include/DatabaseClass.php';
        $this->db = new database();
    }

    public function login($userName, $password) {
        $this->userName = $userName;
        $this->password = $password;

        $sql = "SELECT * FROM admin WHERE username='$this->userName'";
        $row = $this->db->select($sql);

        if ($row && $row['password'] == $this->password) {
            session_start();
            $_SESSION['username'] = $row['username'];
            return true;
        }
        return false;
    }

    function logout() {
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        header('Location: ../views/signIn.php');
    }

    public function adminInfo($info) {
        $this->userName= $info['username'];
        $this->password = $info['password'];}
     


    public function getuserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setusername($userName) {
        $this->userName= $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

}

?>

