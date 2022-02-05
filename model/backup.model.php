<?php
include_once '../config/dbh.config.php';

class BackupModel extends Dbh
{
    protected function getAllBackups()
    {
        $sql = "SELECT * FROM backup";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function deleteBackup($id)
    {
        $sql = "DELETE FROM backup WHERE backup.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
