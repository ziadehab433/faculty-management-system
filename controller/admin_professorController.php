<?php

include_once '../models/ProfessorClass.php';

$model = new Professor();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    switch ($action) {
        case 'add':
            addProfessor($model);
            break;
        case 'update':
            updateProfessor($model);
            break;
        case 'delete':
            deleteProfessor($model);
            break;
    }
}

function addProfessor($model)
{
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $degree = $_POST['degree'];
    $gender = $_POST['gender'];
    $nationalId = $_POST['nationalId'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $department = $_POST['departmentId'];

    $model->insertProfessor($firstName, $lastName, $degree, $gender, $nationalId, $dateOfBirth, $userName, $password, $phoneNumber, $department);
}

function updateProfessor($model)
{
    $id = $_POST['id'];
    $newFirstName = $_POST['newFirstName'];
    $newLastName = $_POST['newLastName'];
    $newDegree = $_POST['newDegree'];
    $newGender = $_POST['newGender'];
    $newNationalId = $_POST['newNationalId'];
    $newDateOfBirth = $_POST['newDateOfBirth'];
    $newUserName = $_POST['newUserName'];
    $newPhoneNumber = $_POST['newPhoneNumber'];
    $newDepartment = $_POST['newDepartment'];
    $newCourse = $_POST['newCourse'];

    $model->updateProfessor($id, $newFirstName, $newLastName, $newDegree, $newGender, $newNationalId, $newDateOfBirth, $newUserName, $newPhoneNumber, $newDepartment, $newCourse);
}

function deleteProfessor($model)
{
    $id = $_POST['id'];
    $model->deleteProfessor($id);
}

$result = $model->getAllProfessors();

include '../views/admin_professor.php';
