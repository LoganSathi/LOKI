<?php
include_once '../config/dbh.config.php';

class ClassModel extends Dbh
{
    protected function getAllClass()
    {
        $sql = "SELECT class.id, class.name, class.form, class.student_amount, teacher.id AS teacherId, teacher.name AS teacherName FROM class INNER JOIN teacher ON class.teacher_id = teacher.id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getTeacherBulkId($name)
    {
        $sql = "SELECT `id` FROM `teacher` WHERE `name` = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getTeacherList()
    {
        $sql = "SELECT teacher.id, teacher.name FROM teacher INNER JOIN account ON teacher.account_id = account.id WHERE account.type = 'Teacher'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function insertClass($form, $class, $teacher)
    {
        $servername = "localhost";
        $uname = "root";
        $password = "";
        $dbname = "qr-sas";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $uname, $password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        try {
            $sql = "INSERT INTO `class` (`name`, `form`, `student_amount`, `teacher_id`) VALUES (?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$class, $form, 0, $teacher]);
            $lastId = $conn->lastInsertId();
            return $lastId;
        } catch (PDOException $e) {
        }
    }

    protected function updateClassTeacher($teacher)
    {
        $sql = "UPDATE account INNER JOIN teacher ON teacher.account_id = account.id SET account.type = 'Class Teacher' WHERE teacher.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$teacher]);
    }

    protected function getDetails($id)
    {
        $sql = "SELECT class.name, class.form, class.student_amount, teacher.name AS teacher, teacher.id AS teacherId FROM class INNER JOIN teacher ON teacher.id = class.teacher_id WHERE class.id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getTeacherId($id)
    {
        $sql = "SELECT teacher.id FROM teacher INNER JOIN class ON teacher.id = class.teacher_id WHERE class.id = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getTeacherName($teacher)
    {
        $sql = "SELECT teacher.name FROM teacher WHERE teacher.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$teacher]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function updateClass($class, $form, $teacher, $id)
    {
        $sql = "UPDATE class SET class.name = ?, class.form = ?, class.teacher_id = ? WHERE class.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$class, $form, $teacher, $id]);
    }

    protected function updateTeacherType($teacher)
    {
        $sql = "UPDATE account INNER JOIN teacher ON teacher.account_id = account.id SET account.type = 'Teacher' WHERE teacher.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$teacher]);
    }

    protected function getAmount($id)
    {
        $sql = "SELECT class.student_amount FROM class WHERE class.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function deleteClass($id)
    {
        $sql = "DELETE FROM class WHERE class.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
