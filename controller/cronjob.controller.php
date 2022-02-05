<?php

include_once '../model/cronjob.model.php';

class CronController extends CronModel
{
    public function isSchool($date)
    {
        $result = $this->checkDate($date);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function todayAttendance($date)
    {
        $studentList = $this->getStudentList();
        if ($studentList) {
            foreach ($studentList as $row) {
                $id = $row['id'];
                $this->createAttendance($date, $id);
            }
        }
    }

    public function fetchStudentList()
    {
        return $this->getStudentList();
    }

    public function fetchWarningException($date)
    {
        return $this->getWarningException($date);
    }

    public function incrementAbsentDays($id)
    {
        $this->updateAbsentDays($id);
    }

    public function fetchStudentAbsentCons()
    {
        return $this->getStudentAbsentCons();
    }

    public function addWarningLetter($id, $type)
    {
        return $this->insertWarningLetter($id, $type);
    }

    public function resetConsDay($id)
    {
        $this->setConsDay($id);
    }

    public function fetchStudentAbsentTotal()
    {
        return $this->getStudentAbsentTotal();
    }

    public function resetTotalDay($id)
    {
        $this->setTotalDay($id);
    }

    public function editAnalysis($date)
    {
        $result = $this->calcSchoolPerc($date);
        if ($result) {
            foreach ($result as $row) {
                $percentage = $row['total'];
                $this->updateAnalysis($percentage, $date);
            }
        }
    }
}
