<?php
include_once '../config/dbh.config.php';

class TeacherModel extends Dbh
{
    protected function getAllAccounts()
    {
        $sql = "SELECT account.id as account_id, teacher.id, teacher.name, teacher.contact, account.username, account.type FROM teacher INNER JOIN account ON account.id = teacher.account_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function insertTeacher($username, $pass, $name)
    {
        $servername = "localhost";
        $uname = "root";
        $password = "";
        $dbname = "qr-sas";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $uname, $password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        try {
            $sql = "INSERT INTO `account` (`username`, `password`, `type`) VALUES (?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $pass, 'Teacher']);
            $lastId = $conn->lastInsertId();
            $sql = "INSERT INTO `teacher` (`name`, `account_id`) VALUES (?,?);";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name, $lastId]);
            return $lastId;
        } catch (PDOException $e) {
        }
    }

    protected function getDetails($id)
    {
        $sql = "SELECT teacher.name, teacher.contact, account.username, teacher.account_id, account.type FROM teacher INNER JOIN account ON account.id = teacher.account_id WHERE teacher.id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getId($id)
    {
        $sql = "SELECT teacher.id FROM teacher WHERE account_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function deleteAccount($id)
    {
        $sql = "DELETE FROM account WHERE account.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function deleteTeacher($id)
    {
        $sql = "DELETE FROM teacher WHERE teacher.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function getUsername($id)
    {
        $sql = "SELECT username, teacher.id FROM account INNER JOIN teacher ON teacher.account_id = account.id WHERE account.id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function updateAccount($username, $pass, $id)
    {
        $sql = "UPDATE account SET account.username = ?, account.password = ? WHERE account.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $pass, $id]);
    }

    protected function checkUsername($username)
    {
        $sql = "SELECT `id` FROM `account` WHERE `username` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getType($id)
    {
        $sql = "SELECT `type` FROM `account` WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getClass($id)
    {
        $sql = "SELECT class.name, class.form FROM class INNER JOIN teacher ON class.teacher_id = teacher.id WHERE teacher.id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
