<?php
include_once '../controller/warning.controller.php';
$warningController = new WarningController();

$id = $_GET['id'];

$warningController->removeWarning($id);
unlink("../TCPDF-main/generated-warning/$id.pdf");
