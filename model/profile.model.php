<?php
include_once '../config/dbh.config.php';

class ProfileModel extends Dbh
{
    protected function getAdminDetails($id)
    {
        $sql = "SELECT * FROM `admin` WHERE `account_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getCoordinatorDetails($id)
    {
        $sql = "SELECT * FROM `coordinator` WHERE `account_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getTeacherDetails($id)
    {
        $sql = "SELECT * FROM `teacher` WHERE `account_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getClassTeacherDetails($id)
    {
        $sql = "SELECT `class`.`name` AS `class`, `teacher`.`id`, `teacher`.`name`, `teacher`.`contact` FROM (`class` INNER JOIN `teacher` ON `class`.`teacher_id` = `teacher`.`id`) INNER JOIN `account` ON `account`.`id` = `teacher`.`account_id` WHERE `account`.`id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function updateCoordinator($id, $name, $position, $email, $contact, $username)
    {
        $sql = "UPDATE coordinator INNER JOIN account ON account.id = coordinator.account_id SET  `name` = ?, `position` = ?, `email` = ?, `contact` = ?, `account`.`username` = ? WHERE account.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $position, $email, $contact, $username, $id]);
        $rows = $stmt->fetchAll();
    }

    protected function updateTeacher($id, $name, $contact, $username)
    {
        $sql = "UPDATE teacher INNER JOIN account ON account.id = teacher.account_id SET  `name` = ?, `contact` = ?, `account`.`username` = ? WHERE account.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $contact, $username, $id]);
        $rows = $stmt->fetchAll();
    }

    protected function updateAdmin($id, $name, $address, $username)
    {
        $sql = "UPDATE admin INNER JOIN account ON account.id = admin.account_id SET  `school_name` = ?, `school_address` = ?, `account`.`username` = ? WHERE account.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $address, $username, $id]);
        $rows = $stmt->fetchAll();
    }

    protected function passVerification($id)
    {
        $sql = "SELECT account.password as password FROM account WHERE account.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function updatePass($id, $pass)
    {
        $sql = "UPDATE `account` SET `password` = ? WHERE `account`.`id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pass, $id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
