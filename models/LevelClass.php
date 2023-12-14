<?php
    class Level {
        private $levelNumber;
        private $db;

        function __construct(){
            include __DIR__ . '/../include/DatabaseClass.php';
            $this->db = new database();
        }

        function getAllLevels(){
            $sql = 'SELECT * FROM level';
            return $this->db->display($sql);
        }

        function insertLevel($levelNumber){
            $sql = "INSERT INTO level VALUES('$levelNumber')";
            return $this->db->insert($sql);
        }

        function deleteLevel($levelNumber){
            $sql = "DELETE FROM level WHERE levelNumber = '$levelNumber'";
            return $this->db->delete($sql);
        }
    }