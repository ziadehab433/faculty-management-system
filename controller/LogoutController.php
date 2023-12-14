<?php
	session_start();
	if(!isset($_SESSION['id'])){
		include '../models/AdminClass.php';
		$user = new Admin();
	}elseif($_SESSION['type'] == 'student'){
		include '../models/StudentClass.php';
		$user = new Student();
	}else{
		include '../models/ProfessorClass.php';
		$user = new Professor();
	}
	$user->logout();
?>
