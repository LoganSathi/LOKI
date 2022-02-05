<?php
include_once '../controller/reset.controller.php';
$resetController = new ResetController();

$resetType = $_POST['resetType'];

if ($resetType == 'partial') {
    $resetController->resetPartial();
} else {
    $resetController->resetTotal();
}
