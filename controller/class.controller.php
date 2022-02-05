<?php

include_once '../model/class.model.php';

class ClassController extends ClassModel
{
    public function registerClass($form, $class, $teacher)
    {
        $this->assignClassTeacher($teacher);
        return $this->insertClass($form, $class, $teacher);
    }

    public function assignClassTeacher($teacher)
    {
        $this->updateClassTeacher($teacher);
    }

    public function editClass($class, $form, $teacher, $id)
    {
        $this->assignClassTeacher($teacher);
        $this->updateClass($class, $form, $teacher, $id);
    }

    public function editTeacherType($teacher)
    {
        $this->updateTeacherType($teacher);
    }

    public function fetchTeacherId($id)
    {
        $result = $this->getTeacherId($id);
        if ($result) {
            foreach ($result as $row) {
                return $row['id'];
            }
        }
    }

    public function fetchTeacherName($teacher)
    {
        $result = $this->getTeacherName($teacher);
        if ($result) {
            foreach ($result as $row) {
                return $row['name'];
            }
        }
    }

    public function removeClass($id)
    {
        $this->deleteClass($id);
    }

    /* public function registerClass($class, $form)
    {
        $this->insertClass($class, $form);
    }

    public function removeClass($id)
    {
        $this->deleteClass($id);
    }
    public function editClass($id)
    {
        $this->updateClass($id);
    } */
}
