<?php
include_once '../controller/student.controller.php';
$studentController = new StudentController();
include_once '../view/student.view.php';
$studentView = new StudentView();

$id = $_POST['Id'];
$name = $_POST['Name'];
$gender = $_POST['Gender'];
$dob = $_POST['DOB'];
$relationship = $_POST['Relationship'];
$pname = $_POST['Pname'];
$pcontact = $_POST['Pcontact'];
$email = $_POST['Email'];
$class = $_POST['class'];

$studentController->substractAmount($id);
$studentController->editStudent($name, $gender, $dob, $relationship, $pname, $pcontact, $email, $class, $id);
$studentController->addAmount($class);
$className = $studentView->fetchClassName($class);
echo $className;
