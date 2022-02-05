<?php
include_once '../view/class.view.php';
include_once '../controller/class.controller.php';
$classController = new ClassController();
$classView = new ClassView();

$id = $_POST['id'];

$currentTeacher = $classController->fetchTeacherId($id);
$classController->editTeacherType($currentTeacher);
$classController->removeClass($id);
