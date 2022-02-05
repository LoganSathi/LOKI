<?php
include_once '../view/coordinator.view.php';
include_once '../controller/coordinator.controller.php';
$coordinatorController = new CoordinatorController();
$coordinatorView = new CoordinatorView();

$id = $_POST['id'];
$accountid = $_POST['accId'];

$coordinatorController->removeAccount($accountid);
$coordinatorController->removeCoordinator($id);
