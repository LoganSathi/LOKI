<?php

include_once '../model/backup.model.php';

class BackupController extends BackupModel
{
    public function registerBackup($username, $pass, $name)
    {
        $this->insertBackup($username, $pass, $name);
    }

    public function removeBackup($id)
    {
        $this->deleteBackup($id);
    }
}
