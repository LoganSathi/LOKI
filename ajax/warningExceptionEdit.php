<?php
include_once '../controller/warning.controller.php';
include_once '../view/warning.view.php';
$warningController = new WarningController();
$warningView = new WarningView();

$id = $_POST['id'];
$desc = $_POST['desc'];
$fileType = $warningView->fetchFileType($id);
$extension = '';

if (isset($_FILES['file']['name'])) {
    if ($fileType) {
        unlink("../upload/$id.$fileType");
    }
    $file_array = explode(".", $_FILES["file"]["name"]);
    $extension = end($file_array);
    $warningController->addFileType($extension, $id);

    $filename =  $_FILES['file']['name'];
    $location = "../upload/" . $id . "." . $extension;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
    }
}

$warningController->editException($extension, $desc, $id);
