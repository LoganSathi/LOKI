<?php

include_once '../config/dbh.config.php';

class AnalysisModel extends Dbh
{
    protected function calcSchoolPerc($statement)
    {
        $sql = "SELECT format((SELECT COUNT(*) FROM attendance WHERE date LIKE ? AND status = 1)/ (SELECT COUNT(*) FROM attendance WHERE date LIKE ?)*100,1) as total";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$statement, $statement]);
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

    //Analysis-Class

    protected function getClasses($form)
    {
        $sql = "SELECT class.id, class.name, class.student_amount FROM class WHERE class.form = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$form]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function calcClassPerc($id, $selectedPeriod)
    {
        $sql = "SELECT format( (SELECT COUNT(*) FROM attendance INNER JOIN student ON attendance.student_id = student.id INNER JOIN class ON student.class_id = class.id WHERE class.id = ? AND attendance.status=1 AND attendance.date LIKE ?) / (SELECT COUNT(*) FROM attendance INNER JOIN student ON attendance.student_id = student.id INNER JOIN class ON student.class_id = class.id WHERE class.id = ? AND attendance.date LIKE ?)*100,1) as total";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $selectedPeriod, $id, $selectedPeriod]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getStudents($classId)
    {
        $sql = "SELECT student.name, student.id FROM student WHERE class_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$classId]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function calcStudentPerc($id, $selectedPeriod)
    {
        $sql = "SELECT format( (SELECT COUNT(*) FROM attendance WHERE student_id=? AND date LIKE ? AND status=1) / (SELECT COUNT(*) FROM attendance WHERE student_id=? AND date LIKE ?) *100,1) as total";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $selectedPeriod, $id, $selectedPeriod]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    /* Complexity || Linear Regression */

    protected function getData()
    {
        $sql = "SELECT `date`, `attendance`, DATE_FORMAT(date,'%a') AS `day` FROM `forcast` WHERE `attendance` != 0;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    protected function getDay()
    {
        $sql = "SELECT DATE_FORMAT(date,'%a') AS `day`, `date` FROM `forcast`;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
}
