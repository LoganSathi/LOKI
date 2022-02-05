<?php

include_once '../model/attendance.model.php';

class AttendanceController extends AttendanceModel
{
    public function updateAttendance($status, $id)
    {
        return $this->changeAttendance($status, $id);
    }

    public function removeAbsent($id)
    {
        return $this->deleteAbsent($id);
    }

    public function addAbsent($status, $id)
    {
        return $this->insertAbsent($status, $id);
    }
}
