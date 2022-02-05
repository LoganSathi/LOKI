<?php

include_once '../config/dbh.config.php';

class CronModel extends Dbh
{
    protected function checkDate($date)
    {
        $sql = "SELECT `calendar`.`date` FROM `calendar` WHERE `calendar`.`date` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getStudentList()
    {
        $sql = "SELECT `student`.`id` FROM `student`";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function createAttendance($date, $id)
    {
        $sql = "INSERT INTO `attendance` (`date`, `student_id`, `status`) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date, $id, 0]);
    }

    protected function getWarningException($date)
    {
        $sql = "SELECT `student_id` FROM `warning_exception` WHERE `start_date` <= ? AND `end_date` >= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date, $date]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function updateAbsentDays($id)
    {
        $sql = "UPDATE `student` SET `total_absent_days` = `total_absent_days` + 1, `cons_absent_days` = `cons_absent_days` + 1 WHERE `id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function getStudentAbsentCons()
    {
        $sql = "SELECT student.id, student.name, parent.name AS parent,  parent.email FROM student INNER JOIN parent ON parent.id = student.parent_id WHERE student.cons_absent_days = 4";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function insertWarningLetter($id, $type)
    {
        $servername = "localhost";
        $uname = "root";
        $password = "";
        $dbname = "qr-sas";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $uname, $password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        try {
            $sql = "INSERT INTO `warning` (`case`, `student_id`) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$type, $id]);
            $lastId = $conn->lastInsertId();
            return $lastId;
        } catch (PDOException $e) {
        }
    }

    protected function setConsDay($id)
    {
        $sql = "UPDATE `student` SET `cons_absent_days` = 1 WHERE `id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function getStudentAbsentTotal()
    {
        $sql = "SELECT student.id, student.name, parent.name AS parent,  parent.email FROM student INNER JOIN parent ON parent.id = student.parent_id WHERE student.total_absent_days=11";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function setTotalDay($id)
    {
        $sql = "UPDATE `student` SET `total_absent_days` = 1 WHERE `id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function calcSchoolPerc($date)
    {
        $sql = "SELECT format((SELECT COUNT(*) FROM attendance WHERE date = ? AND status = 1)/ (SELECT COUNT(*) FROM attendance WHERE date = ?)*100,1) as total";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date, $date]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function updateAnalysis($percentage, $date)
    {
        $sql = "UPDATE `forcast` SET `attendance` = ? WHERE `date` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$percentage, $date]);
    }
}
