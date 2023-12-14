<?php
 class student{

	
    private $id;
    private $fname;
    private $lname;
    private $nationalId;
    private $birthDate;
    private $email;
    private $password;
    private $phoneNumber;
    private $level;
    private $departmentId;
    private $profilePicPath;
    private $db;


    function __construct() {
		//include_once '../include/DatabaseClass.php';		
		include_once __DIR__ . '/../include/DatabaseClass.php';
		$this->db = new database();
	}


    function setFirstName($fname){
		$this->fname = $fname;
	}
    function setLastName($lname){
		$this->lname = $lname;
	}
    function setNationalId($nationalId){
		$this->nationalId = $nationalId;
	}
    function setBirthDate($birthDate){
		$this->birthDate = $birthDate;
	}

    function setEmail($email){
		$this->email = $email;
	}
    function setPassword($password){
		$this->password = $password;
	}

    function setPhoneNumber($phoneNumber){
		$this->$phoneNumber = $phoneNumber;
	}

    function setLevel($level){
		$this->level = $level;
	}

    //Getter Methodes

    function getID(){
		return $this->id;
	}

    function getFirstName(){
		return $this->fname;
	}
    function getLastName(){
		return $this->lname;
	}
    function grtNationalId(){
		return $this->nationalId;
	}

    function getBirthDate(){
		return $this->birthDate;
	}

    function getEmail(){
		return $this->email;
	}
    function getPassword(){
		return $this->password;
	}

    function getPhoneNumber(){
		return $this->phoneNumber;
	}

    function getLevel(){
		return $this->level;
	}


	//Login Method
	function login($email , $password) {
        $this->email = $email;
		$this->password = $password;
		
		$sql = "SELECT * FROM student WHERE email='$this->email'";
		$row = $this->db->select($sql);

		if (password_verify($this->password, $row['password'])) {
			session_start();
			$_SESSION['id'] = $row['id'];
        //    $_SESSION['fname'] = $row['fname'];
			$_SESSION['email']=$row['email'];
			$_SESSION['type'] = "student";

			return true;
		}
		return false;
    }

	function logout() {
		session_start();
		unset($_SESSION['id']);
    unset($_SESSION['email']);
		unset($_SESSION['type']);
		session_destroy();
    header('Location: ../views/signIn.php');
  }


function getAllStudents() {
    $sql = "SELECT * FROM student";
    return $this->db->display($sql);
}



function getStudentByNationalId($nationalId) {
    $sql = "SELECT * FROM student WHERE nationalId = '$nationalId'";
    return $this->db->select($sql);
 }


//	SignUp Nethod

function SignUp($fname, $lname, $phoneNumber, $nationalId, $email, $password, $levelNumber) {

	$existingStudent = $this->getStudentByNationalId($nationalId);
  $existingEmail = $this->db->select("SELECT * FROM student WHERE email = '$email'");
    if ($existingStudent || $existingEmail) {
        // return false if the nationalId was exists
        return false;
    }


    $this->fname = $fname;
    $this->lname = $lname;
    $this->phoneNumber = $phoneNumber;
    $this->nationalId = $nationalId;
    $this->email = $email;
    $this->password = $password;
    $this->level = $levelNumber;

    // insert new student
    $sql = "INSERT INTO student(fname, lname, phoneNumber, nationalId, email, password, level) VALUES ('$fname','$lname',$phoneNumber,$nationalId,'$email','$password', '$levelNumber')";
    $data = $this->db->insert($sql);

    // can remove this con
    if ($data) {
        session_start();
        $_SESSION['id'] = $this->db->getLastRecordData('student')['id'];
        $_SESSION['email']=$email;
        $_SESSION['type'] = "student";
        return true;
    }

    return false;
  }



  function getStudentById($id){
    $sql = "SELECT * FROM student WHERE id = '$id'";
    return $this->db->select($sql);
  }

  function getStudentByLevel($levelNumber){
    $sql = "SELECT * FROM student WHERE level = '$levelNumber'";
    return $this->db->display($sql);
  }

  function deleteStudent($id){
      $sql = "DELETE FROM student WHERE id = '$id'";
      return $this->db->delete($sql);
  }

  function getStudentsByDeptId($deptId){
    $sql = "SELECT * FROM student WHERE departmentId = '$deptId'";
    return $this->db->display($sql);
  }

  function updateProfilePicPath($id , $newPath){
    $sql = "UPDATE student SET profilePicPath = '" . $newPath . "' 
            WHERE id = " . $id;
    $this->profilePicPath = $newPath;
    return $this->db->update($sql);
  }

  function updateDepartment($id , $departmentId){
    $sql = "UPDATE student SET departmentId = '" . $departmentId . "' 
            WHERE id = " . $id;
    $this->departmentId = $departmentId;
    return $this->db->update($sql);
  }

    function getProfilePicPath($id){
        $sql = "SELECT profilePicPath FROM student WHERE id = $id";
        return $this->db->select($sql);
    }




}

 


?>