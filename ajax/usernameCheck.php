<?php
include_once '../controller/coordinator.controller.php';
$coordinatorController = new CoordinatorController();

$username = $_POST['Username'];

$result = $coordinatorController->isUsername($username);
if ($result) {
    echo "exist";
} else {
    echo "okay";
}
