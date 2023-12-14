<?php
    class Room {
        private $roomNumber;
        private $db;

        function __construct(){
            include __DIR__ . '/../include/DatabaseClass.php';
            $this->db = new database();
        }

        function getAllRooms(){
            $sql = 'SELECT * FROM room';
            return $this->db->display($sql);
        }

        function insertRoom($roomNumber){
            $sql = "INSERT INTO room VALUES('$roomNumber')";
            return $this->db->insert($sql);
        }

        function deleteRoom($roomNumber){
            $sql = "DELETE FROM room WHERE roomNumber = '$roomNumber'";
            return $this->db->delete($sql);
        }
    }