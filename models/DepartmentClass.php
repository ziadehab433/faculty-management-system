<?php

class Department{
    
    private $id ;
    private $name;
    private $description;
    private $db;
    



    public function __construct() {
        include_once  __DIR__ .'/../include/DatabaseClass.php';		
		$this->db = new database();


    }
      
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
   
    public function getAllDepartments(){

     $sql= " select * from  department ";
     return $this->db->display($sql);         
    }

    public function getDepartmentById($id){
        $sql = "select * from department where id = '$id'";
        return $this->db->select($sql);
    }

    function deleteDepartment($id){
        $sql = "DELETE FROM department WHERE id = '$id'";
        return $this->db->delete($sql);
    }
   
    function addOrUpdateDepartment($name,$description)
    {
        $existingDepartment = $this->getDepartmentByName($name);

        if ($existingDepartment) {
            return $this->updateDepartment($name, $description);
        } else {
            return $this->addDepartment($name, $description);
        }
    }

    function updateDepartment($name, $description)
    {
        $sql = "UPDATE departments SET description ='$description 'WHERE name =  '$name'";
        return $this->db->update($sql);
    }

    function addDepartment($name, $description)
    {
        $sql = "INSERT INTO departments (name, description) VALUES ('$name', '$description')";
    
        return $this->db->insert($sql);
    }

    function getDepartmentByName($name)
    {
        $sql = "SELECT * FROM departments WHERE name ='$name'";
        $result = $this->db->display($sql);

        return $result;
    }
  




}

?>