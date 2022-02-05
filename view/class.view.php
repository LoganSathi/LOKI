<?php
include_once '../model/class.model.php';

class ClassView extends ClassModel
{
    public function fetchAllClass()
    {
        return $this->getAllClass();
    }

    public function fetchTeacherList()
    {
        return $this->getTeacherList();
    }

    public function fetchDetails($id)
    {
        return $this->getDetails($id);
    }

    public function fetchAmount($id)
    {
        $result = $this->getAmount($id);
        if ($result) {
            foreach ($result as $row) {
                return $row['student_amount'];
            }
        }
        return $this->getAmount($id);
    }

    public function fetchTeacherBulkId($name)
    {
        $result = $this->getTeacherBulkId($name);
        if ($result) {
            foreach ($result as $row) {
                return $row['id'];
            }
        }
    }
}
