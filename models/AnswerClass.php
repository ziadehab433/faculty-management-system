<?php
class Answer {
    private $answer_id;
    private $question_id;
    private $student_id;
    private $course_id;
    private $prof_id; 
    private $answer;
    private $db;

    function __construct() {
        include_once '../include/DatabaseClass.php';
        $this->db = new Database();
    }

    function getAnswerID() {
        return $this->answer_id;
    }

    function getQuestionID() {
        return $this->question_id;
    }

    function getStudentID() {
        return $this->student_id;
    }

    function getCourseID() {
        return $this->course_id;
    }

    function getProfID() {
        return $this->prof_id;
    }

    function getAnswer() {
        return $this->answer;
    }

    function addAnswer($student_id, $course_id, $answer) {
        $sql = "INSERT INTO answer (studentId, courseId, answer) 
                VALUES (" . $student_id . ", " . $course_id . ", '" . $answer . "')";
        return $this->db->insert($sql);
    }

    function updateAnswer($newAnswer, $student_id, $course_id) {
        $sql = "UPDATE answer SET answer = '" . $newAnswer . "' 
                WHERE studentId = " . $student_id . " AND profId = " . $course_id;
        $this->answer = $newAnswer;
        return $this->db->update($sql);
    }
}
?>

