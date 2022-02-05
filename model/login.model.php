<?php
include_once '../config/dbh.config.php';

class LoginModel extends Dbh
{
    protected function getAccount($username)
    {
        $sql = "SELECT account.id as id, account.username as username, account.type as `type` FROM account WHERE account.username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getNameAdmin($id)
    {
        $sql = "SELECT admin.school_name AS `name` FROM admin WHERE account_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getNameCoordinator($id)
    {
        $sql = "SELECT coordinator.name FROM coordinator WHERE account_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getNameTeacher($id)
    {
        $sql = "SELECT teacher.name FROM teacher WHERE account_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function passVerification($id)
    {
        $sql = "SELECT account.password as password FROM account WHERE account.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getClass($id)
    {
        $sql = "SELECT `class`.`id` FROM (`class` INNER JOIN `teacher` ON `class`.`teacher_id` = `teacher`.`id`) INNER JOIN `account` ON `account`.`id` = `teacher`.`account_id` WHERE `account`.`id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        if ($result) {
            foreach ($result as $row) {
                return $row['id'];
            }
        }
    }

    protected function getForm($id)
    {
        $sql = "SELECT `form` FROM `class` WHERE `id`=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        if ($result) {
            foreach ($result as $row) {
                return $row['form'];
            }
        }
    }
}
