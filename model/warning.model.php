<?php

include_once '../config/dbh.config.php';

class WarningModel extends Dbh
{
    protected function getList()
    {
        $sql = "SELECT student.name, warning.id, warning.student_id, class.name AS 'class', warning.case FROM warning INNER JOIN student ON student.id = warning.student_id INNER JOIN class ON class.id = student.class_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getListException()
    {
        $sql = "SELECT student.name, warning_exception.id, DATE_FORMAT(start_date,'%d %b %Y') AS 'start_date', DATE_FORMAT(end_date,'%d %b %Y') AS 'end_date', warning_exception.student_id, warning_exception.description, class.name AS 'class', warning_exception.file_type FROM warning_exception INNER JOIN student ON student.id = warning_exception.student_id INNER JOIN class ON class.id = student.class_id;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getException($id)
    {
        $sql = "SELECT student.name, warning_exception.id, DATE_FORMAT(start_date,'%d %b %Y') AS 'start_date', DATE_FORMAT(end_date,'%d %b %Y') AS 'end_date', warning_exception.description, class.name AS 'class', class.form, warning_exception.file_type FROM warning_exception INNER JOIN student ON student.id = warning_exception.student_id INNER JOIN class ON class.id = student.class_id WHERE warning_exception.id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getClass($form)
    {
        $sql = "SELECT class.name as `name`, class.id as id FROM class WHERE form=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$form]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getStudents($class)
    {
        $sql = "SELECT name, id FROM student WHERE class_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$class]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function deleteWarning($id)
    {
        $sql = "DELETE FROM warning WHERE warning.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function insertException($id, $start, $end, $desc)
    {
        $servername = "localhost";
        $uname = "root";
        $password = "";
        $dbname = "qr-sas";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $uname, $password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        try {
            $sql = "INSERT INTO `warning_exception` (`student_id`,`start_date`,`end_date`, `description`) VALUES (?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id, $start, $end, $desc]);
            $lastId = $conn->lastInsertId();
            return $lastId;
        } catch (PDOException $e) {
        }
    }

    protected function deleteWarningException($id)
    {
        $sql = "DELETE FROM `warning_exception` WHERE `id`=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }


    protected function insertFileType($extension, $lastId)
    {
        $sql = "UPDATE warning_exception SET `file_type` = ? WHERE `id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$extension, $lastId]);
    }

    protected function getFileType($id)
    {
        $sql = "SELECT file_type FROM warning_exception WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function updateException($extension, $desc, $id)
    {
        $sql = "UPDATE warning_exception SET `file_type` = ?, `description`=? WHERE `id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$extension, $desc, $id]);
    }
}
