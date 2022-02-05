<?php
include_once '../config/dbh.config.php';

class QRscanModel extends Dbh
{
    protected function isDate($date)
    {
        $sql = "SELECT calendar.date FROM calendar WHERE date=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function isAttendance($id, $date)
    {
        $sql = "SELECT attendance.status FROM attendance WHERE student_id=? AND date=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $date]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getStudent($id)
    {
        $sql = "SELECT student.name FROM student WHERE student.id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function updateAttendance($id, $date)
    {
        $sql = "UPDATE attendance SET status=1 WHERE attendance.date=? AND attendance.student_id=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date, $id]);
    }

    protected function updateAbsent($id)
    {
        $sql = "UPDATE `student` SET `total_absent_days` = `total_absent_days` - 1, `cons_absent_days` = 0 WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
