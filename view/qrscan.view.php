<?php
include_once '../model/qrscan.model.php';

class QrscanView extends QrscanModel
{
    public function fetchStudent($id)
    {
        return $this->getStudent($id);
    }

    public function checkDate($date)
    {
        return $this->isDate($date);
    }

    public function checkAttendance($id, $date)
    {
        $result = $this->isAttendance($id, $date);
        if ($result) {
            foreach ($result as $row) {
                return $row['status'];
            }
        } else {
            return "Error";
        }
    }
}
