<?php

class StudentEnrolledCourse {
    private $studentId;
    private $courseId;
    private $grade;
    private $db;

    public function __construct() {
        include_once __DIR__ . '/../include/DatabaseClass.php';
        $this->db = new database();
    }

    public function enrollCourse($studentId, $courseId) {
        $this->studentId = $studentId;
        $this->courseId = $courseId;

        $sql = "INSERT INTO studentenrolledcourse (studentId, courseId) VALUES ('$studentId','$courseId')";
        return $this->db->insert($sql);
    }

    public function getEnrolledCourses($studentId) {
        $sql = "SELECT * FROM studentenrolledcourse WHERE studentId = '$studentId'";
        $results = $this->db->display($sql);
        return $results;
    }

    public function removeEnrollment($studentId, $courseId) {
        $sql = "DELETE FROM studentenrolledcourse  WHERE studentId = '$studentId' AND courseId = '$courseId'";
        $this->db->delete($sql);
    }
    
    public function getGrades($studentId) {
         $sql="SELECT subjectCode, grade FROM StudentEnrolledCourse
         JOIN course ON StudentEnrolledCourse.courseId = course.courseId
         WHERE studentId = '$studentId'" ;
         return $this->db->display($sql);
    }

    public function getTranscript($studentId) {
            $sql = "SELECT course.subjectCode, studentenrolledcourse.grade AS totalMarks, 
                    CASE 
                        WHEN studentenrolledcourse.grade >= 50 THEN 'Passed'
                        ELSE 'Failed'
                    END AS state
                    FROM studentenrolledcourse
                    JOIN course ON studentenrolledcourse.courseId = course.courseId
                    WHERE studentenrolledcourse.studentId = '$studentId'
                    ";
    
            return $this->db->display($sql);
    }

    public function getStudentsEnrolled($courseId){
        $sql = "SELECT * FROM studentenrolledcourse where courseId = $courseId";
        return $this->db->display($sql);
    }
}

?>

