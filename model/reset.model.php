<?php
include_once '../config/dbh.config.php';

class ResetModel extends Dbh
{
    protected function erasePartial()
    {
        $sql = "TRUNCATE TABLE `student`;TRUNCATE TABLE `parent`;TRUNCATE TABLE `attendance`;TRUNCATE TABLE `class`;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    protected function changeClassTeacherRole()
    {
        $sql = "UPDATE account SET `type` = 'Teacher' WHERE `type` = 'Class Teacher'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    protected function eraseTotal()
    {
        $sql = "TRUNCATE TABLE `student`;TRUNCATE TABLE `parent`;TRUNCATE TABLE `attendance`;TRUNCATE TABLE `class`;TRUNCATE TABLE `warning`;TRUNCATE TABLE `warning_exception`;TRUNCATE TABLE `calendar`;TRUNCATE TABLE `calendar_events`;TRUNCATE TABLE `teacher`;TRUNCATE TABLE `coordinator`;TRUNCATE TABLE `absent`;TRUNCATE TABLE `forcast`;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    protected function removeAccounts()
    {
        $sql = "DELETE FROM `account` WHERE `type` IN ('Coordinator','Teacher','Class Teacher');";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
}
