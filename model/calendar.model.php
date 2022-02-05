<?php

include_once '../config/dbh.config.php';

class CalendarModel extends Dbh
{
    protected function getSelectedDate($month, $year)
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

    protected function insertEvent($date, $title)
    {
        $servername = "localhost";
        $uname = "root";
        $password = "";
        $dbname = "qr-sas";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $uname, $password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        try {
            $sql = "INSERT INTO `calendar_events` (`date`,`title`) VALUES (?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$date, $title]);
            $lastId = $conn->lastInsertId();
            return $lastId;
        } catch (PDOException $e) {
        }
    }

    protected function updateEvent($id, $title)
    {
        $sql = "UPDATE `calendar_events` SET `title`=? WHERE `id`=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $id]);
    }

    protected function deleteEvent($id)
    {
        $sql = "DELETE FROM `calendar_events` WHERE `id`=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    protected function insertDates($dateArr, $month, $year)
    {
        foreach ($dateArr as $date) {
            try {
                $date = $year . '-' . $month . '-' . $date;
                $sql = "INSERT INTO calendar (date) VALUES (?);";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$date]);
            } catch (PDOException $e) {
            }
        }
    }

    protected function insertForcast($dateArr, $month, $year)
    {
        foreach ($dateArr as $date) {
            try {
                $date = $year . '-' . $month . '-' . $date;
                $sql = "INSERT INTO `forcast` (date) VALUES (?);";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$date]);
            } catch (PDOException $e) {
            }
        }
    }

    protected function removeDates($dateArr, $month, $year)
    {
        foreach ($dateArr as $date) {
            try {
                $date = $year . '-' . $month . '-' . $date;
                $sql = "DELETE FROM calendar WHERE date= ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$date]);
            } catch (PDOException $e) {
            }
        }
    }

    protected function removeForcast($dateArr, $month, $year)
    {
        foreach ($dateArr as $date) {
            try {
                $date = $year . '-' . $month . '-' . $date;
                $sql = "DELETE FROM `forcast` WHERE date= ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$date]);
            } catch (PDOException $e) {
            }
        }
    }
}
