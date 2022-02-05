<?php
include_once '../model/attendance.model.php';

class AttendanceView extends AttendanceModel
{

    public function fetchClass($form)
    {
        return $this->getClass($form);
    }

    public function fetchTeacher($class)
    {
        $result = $this->getTeacher($class);
        if ($result) {
            foreach ($result as $row) {
                return $row['name'];
            }
        }
    }

    public function fetchAttendance($class, $date)
    {
        return $this->getAttendance($class, $date);
    }

    public function fetchAbsent($id)
    {
        $result = $this->getAbsent($id);
        if ($result) {
            foreach ($result as $row) {
                return $row['reason'];
            }
        }
    }
}
