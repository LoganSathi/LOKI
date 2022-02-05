<?php

include_once '../model/teacher.model.php';

class TeacherController extends TeacherModel
{
    public function registerTeacher($username, $pass, $name)
    {
        return $this->insertTeacher($username, $pass, $name);
    }

    public function removeTeacher($id)
    {
        $this->deleteTeacher($id);
    }

    public function removeAccount($id)
    {
        $this->deleteAccount($id);
    }

    public function editAccount($username, $pass, $id)
    {
        $this->updateAccount($username, $pass, $id);
    }

    public function isUsername($username)
    {
        return $this->checkUsername($username);
    }
}
