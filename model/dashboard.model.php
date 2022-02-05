<?php
include_once '../config/dbh.config.php';

class DashboardModel extends Dbh
{
    protected function calcSchoolPerc($date)
    {
        $sql = "SELECT format((SELECT COUNT(*) FROM attendance WHERE date = ? AND status = 1)/ (SELECT COUNT(*) FROM attendance WHERE date = ?)*100,1) as total";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date, $date]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getCalendar($month, $year)
    {
        $sql = "SELECT DATE_FORMAT(date,'%e') AS `date` FROM `calendar` WHERE MONTH(date)=? AND YEAR(date) = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$month, $year]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getEvents($month, $year)
    {
        $sql = "SELECT `id`, `title`, DATE_FORMAT(date,'%d %b %Y') AS `date` FROM `calendar_events` WHERE MONTH(date)=? AND YEAR(date) = ? ORDER BY `date` ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$month, $year]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getGroups()
    {
        $sql = "SELECT DISTINCT form FROM class ORDER BY form ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function calcGroupPerc($statement, $form)
    {
        $sql = "SELECT format( ( SELECT COUNT(*) FROM attendance INNER JOIN student ON attendance.student_id = student.id INNER JOIN class On student.class_id = class.id WHERE attendance.date LIKE ? AND class.form = ? AND attendance.status=1 ) / ( SELECT COUNT(*) FROM attendance INNER JOIN student ON attendance.student_id = student.id INNER JOIN class On student.class_id = class.id WHERE attendance.date LIKE ? AND class.form = ? )*100,1 ) as total";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$statement, $form, $statement, $form]);
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
