<?php
include_once '../controller/class.controller.php';
$classController = new ClassController();

$id = $_POST['id'];
$class = $_POST['class'];
$form = $_POST['form'];
$teacher = $_POST['teacher'];

$currentTeacher = $classController->fetchTeacherId($id);
$classController->editTeacherType($currentTeacher);
$classController->editClass($class, $form, $teacher, $id);
$teacherName = $classController->fetchTeacherName($teacher);
echo $teacherName;
