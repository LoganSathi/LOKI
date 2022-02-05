<?php
include_once '../controller/student.controller.php';
$studentController = new StudentController();

$id = $_POST['id'];

$studentController->substractAmount($id);
$studentController->removeStudent($id);
