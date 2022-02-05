<?php
include_once '../view/teacher.view.php';
include_once '../controller/teacher.controller.php';
$teacherController = new TeacherController();
$teacherView = new TeacherView();

$id = $_POST['id'];
$accountid = $_POST['accId'];

$teacherController->removeAccount($accountid);
$teacherController->removeTeacher($id);
