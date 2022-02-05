
<?php
include_once '../view/backup.view.php';
include_once '../controller/backup.controller.php';
$backupController = new BackupController();
$backupView = new BackupView();

$id = $_POST['id'];
$name = $_POST['name'];

unlink('../backup/' . $name . '  qr-sas.sql');

$backupController->removeBackup($id);
?>  