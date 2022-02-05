<?php
include_once '../controller/teacher.controller.php';
$teacherController = new TeacherController();

$id = $_POST['accId'];
$username = $_POST['Username'];
$pass = password_hash($_POST['Pass'], PASSWORD_DEFAULT);

$teacherController->editAccount($username, $pass, $id);
