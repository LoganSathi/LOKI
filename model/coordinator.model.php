<?php
include_once '../config/dbh.config.php';

class CoordinatorModel extends Dbh
{
    protected function getAllAccounts()
    {
        $sql = "SELECT account.id as account_id, coordinator.id, coordinator.name, coordinator.position, account.username FROM coordinator INNER JOIN account ON account.id = coordinator.account_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function insertCoordinator($username, $pass, $name, $position)
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
            $stmt->execute([$username, $pass, 'Coordinator']);
            $lastId = $conn->lastInsertId();
            $sql = "INSERT INTO `coordinator` (`name`, `position`, `account_id`) VALUES (?,?,?);";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$name, $position, $lastId]);
            return $lastId;
        } catch (PDOException $e) {
        }
    }

    protected function getDetails($id)
    {
        $sql = "SELECT coordinator.name, coordinator.position, coordinator.email, coordinator.contact, account.username, coordinator.account_id FROM coordinator INNER JOIN account ON account.id = coordinator.account_id WHERE coordinator.id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getId($id)
    {
        $sql = "SELECT coordinator.id FROM coordinator WHERE account_id=?";
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

    protected function deleteCoordinator($id)
    {
        $sql = "DELETE FROM coordinator WHERE coordinator.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function getUsername($id)
    {
        $sql = "SELECT username, coordinator.id FROM account INNER JOIN coordinator ON coordinator.account_id = account.id WHERE account.id=?";
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
}
