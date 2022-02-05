<?php
include_once '../controller/coordinator.controller.php';
$coordinatorController = new CoordinatorController();

$id = $_POST['accId'];
$username = $_POST['Username'];
$pass = password_hash($_POST['Pass'], PASSWORD_DEFAULT);

$coordinatorController->editAccount($username, $pass, $id);
