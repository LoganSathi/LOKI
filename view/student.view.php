<?php
include_once '../model/student.model.php';

class StudentView extends StudentModel
{
    public function fetchClassName($id)
    {
        $result = $this->getClassName($id);
        if ($result) {
            foreach ($result as $row) {
                return $row['name'];
            }
        }
    }

    public function fetchClassId($name)
    {
        $result = $this->getClassId($name);
        if ($result) {
            foreach ($result as $row) {
                return $row['id'];
            }
        }
    }

    public function fetchClass($form)
    {
        return $this->getClass($form);
    }

    public function fetchId($parentId)
    {
        $result = $this->getId($parentId);
        if ($result) {
            foreach ($result as $row) {
                return $row['id'];
            }
        }
    }

    public function fetchClassStudents($class)
    {
        return $this->getClassStudents($class);
    }

    public function fetchAllStudents()
    {
        return $this->getAllStudents();
    }

    public function fetchDetails($id)
    {
        return $this->getDetails($id);
    }

    public function fetchName($id)
    {
        return $this->getName($id);
    }
}
