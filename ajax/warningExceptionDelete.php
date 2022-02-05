<?php
include_once '../controller/warning.controller.php';
include_once '../view/warning.view.php';
$warningController = new WarningController();
$warningView = new WarningView();

$id = $_GET['id'];
$fileType = $warningView->fetchFileType($id);

$warningController->removeWarningException($id);
if (is_file("../upload/$id.$fileType")) {
    unlink("../upload/$id.$fileType");
}
