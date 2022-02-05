<?php
include_once '../config/dbh.config.php';

class AttendanceModel extends Dbh
{
    protected function getClass($form)
    {
        $sql = "SELECT class.name as `name`, class.id as id FROM class WHERE form=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$form]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getTeacher($class)
    {
        $sql = "SELECT teacher.name FROM teacher INNER JOIN class ON class.teacher_id = teacher.id WHERE class.id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$class]);
        $rows = $stmt->fetchAll();
        return $rows;
    }


    protected function getAttendance($class, $date)
    {
        $sql = "SELECT attendance.id, attendance.status, student.name AS name FROM ((attendance INNER JOIN student ON student.id = attendance.student_id) INNER JOIN class ON class.id = student.class_id) WHERE class.id = ? AND attendance.date = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$class, $date]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function changeAttendance($status, $id)
    {
        $sql = "UPDATE attendance SET status= ? WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status, $id]);
    }

    protected function getAbsent($id)
    {
        $sql = "SELECT absent.reason FROM `absent` WHERE attendance_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function deleteAbsent($id)
    {
        $sql = "DELETE FROM `absent` WHERE `absent`.attendance_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function insertAbsent($reason, $id)
    {
        $sql = "INSERT INTO `absent` (`reason`, `attendance_id`) VALUES (?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reason, $id]);
    }
}
