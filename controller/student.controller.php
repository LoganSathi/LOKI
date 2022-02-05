<?php

include_once '../model/student.model.php';

class StudentController extends StudentModel
{
    public function registerStudent($name, $gender, $dob, $relationship, $pname, $pcontact, $email, $class)
    {
        return $this->insertStudent($name, $gender, $dob, $relationship, $pname, $pcontact, $email, $class);
    }

    public function addAmount($class)
    {
        $this->incrementAmount($class);
    }

    public function substractAmount($student)
    {
        $this->decrementAmount($student);
    }

    public function editStudent($name, $gender, $dob, $relationship, $pname, $pcontact, $email, $class, $id)
    {
        $this->updateStudent($name, $gender, $dob, $relationship, $pname, $pcontact, $email, $class, $id);
    }

    public function removeStudent($id)
    {
        $this->deleteStudent($id);
    }
}
