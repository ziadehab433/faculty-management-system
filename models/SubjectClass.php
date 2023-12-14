<?php


class Subject
{
    private $subjectId;
    private $name;
    private $code;
    private $description;
    private $level;
    private $semester;
    private $db;
    
    public function __construct()
    {
        include_once __DIR__ . '/../include/DatabaseClass.php';
        $this->db = new database();
    }

    public function setsubjectId($subjectId)
    {
        $this->subjectId = $subjectId;
    }

    public function setname($name)
    {
        $this->name = $name;
    }

    public function setcode($code)
    {
        $this->code = $code;
    }

    public function setdescription($description)
    {
        $this->description = $description;
    }

    public function setlevel($level)
    {
        $this->level = $level;
    }

    public function setsemester($semester)
    {
        $this->semester = $semester;
    }

    public function getAllSubjects()
    {
        $sql = "SELECT * FROM subject ";
        $results = $this->db->select($sql);
        return $results;
    }

    public function addSubject($name, $code, $description, $level, $semester)
    {
        $sql = "INSERT INTO subject(name,code,description,level,semester) VALUES('$name','$code','$description','$level','$semester')";
        $this->db->insert($sql);
    }

   
    public function deleteSubject($code)
    {
        $sql = "DELETE FROM subject WHERE code ='$code'";
        $this->db->delete($sql);
    }
}

?>
