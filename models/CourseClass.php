<?php 
class Course {
    private $courseId;
	private $subjectCode;
    private $profId;
    private $time;
	private $weekDayNum;
	private $room;
    private $question;
    private $departmentId;
    private $db;
    

    public function __construct() {
        include_once __DIR__.'/../include/DatabaseClass.php';		
		$this->db = new database();
}


public function addcourse($subjectCode, $profId, $time, $weekDayNum, $room, $departmentId) {
    $sql = "INSERT INTO course (subjectCode, profId, time, weekDayNum, room, departmentId) 
    VALUES ('$subjectCode', '$profId', '$time', '$weekDayNum', '$room' , '$departmentId')";
     return $this->db->insert($sql);

}

public function modifycourses($courseId,$subjectCode,$profId,$time,$weekDayNum,$room) {
    $sql = "UPDATE COURSE 
    SET subjectCode = '$subjectCode', 
        profId = '$profId', 
        time = '$time', 
        weekDayNum = '$weekDayNum', 
        room = '$room' 
    WHERE ID = $courseId";
    return $this->db->update($sql);
}

public function deleteCourse($courseId) {
    $sql = "DELETE FROM course WHERE courseId = $courseId";
    return $this->db->delete($sql);
}

public function getAllCourses(){
    $sql = "SELECT * FROM course";
    return $this->db->display($sql);
}

public function getCourseById($id){
    $sql = "SELECT * FROM course WHERE courseId = '$id'";
    return $this->db->select($sql);
}

public function getCoursesByProfessorId($id){
    $sql = "SELECT * FROM course WHERE profId = '$id'";
    return $this->db->display($sql);
}

public function getQuestionByCourseId($id) {
    $sql = "SELECT * FROM course WHERE courseId = " . $id;
    return $this->db->select($sql);
}

public function updateQuestion($course_id, $newQuestion) {
    $sql = "UPDATE course SET question = '" . $newQuestion . "' 
            WHERE courseId = " . $course_id;
    $this->question = $newQuestion;
    return $this->db->update($sql);
}

public function getCoursesByDepartmentId($id) {
    $sql = "SELECT * FROM course WHERE departmentId = " . $id;
    return $this->db->display($sql);
}

public function getProfessorsForAddCourse(){
    $sql = 'SELECT * FROM professor';
    return $this->db->display($sql);
}

public function getDepartmentsForAddCourse(){
    $sql= " select * from  department ";
    return $this->db->display($sql);         
}

public function getRoomsForAddCourse(){
    $sql = 'SELECT * FROM room';
    return $this->db->display($sql);
}

    
function getcourseID(){
    return $this->courseId;
}

    
function getsubjectcode(){
    return $this->subjectCode;
}

function getprofID(){
    return $this->profId;
}

function gettime(){
    return $this->time;
}
function getWeekDayNum(){
    return $this->weekDayNum;
}
function getRoom(){
    return $this->room;
}

function setcousreid($courseId){
    $this->courseId = $courseId;
}

function setsubject_code($subjectCode){
    $this->subjectCode = $subjectCode;
}
function setprofID($profId){
        $this->profId = $profId;
}
function setTime($time){
    $this->time = $time;
}
function setWeekDayNum($weekDayNum){
    $this->weekDayNum = $weekDayNum;
}
function setRoom($room){
    $this->room = $room;
}


}
?>