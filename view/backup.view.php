<?php
include_once '../model/backup.model.php';

class BackupView extends BackupModel
{
    public function fetchAllBackups()
    {
        return $this->getAllBackups();
    }
}
