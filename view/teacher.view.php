<?php
include_once '../model/teacher.model.php';

class TeacherView extends TeacherModel
{
    public function fetchAllAccounts()
    {
        return $this->getAllAccounts();
    }

    public function fetchDetails($id)
    {
        return $this->getDetails($id);
    }

    public function fetchId($id)
    {
        $result = $this->getId($id);
        if ($result) {
            foreach ($result as $row) {
                return $row['id'];
            }
        }
    }

    public function fetchUsername($id)
    {
        return $this->getUsername($id);
    }

    public function fetchType($id)
    {
        return $this->getType($id);
    }

    public function fetchClass($id)
    {
        $result = $this->getClass($id);
        if ($result) {
            foreach ($result as $row) {
                return $row['name'] . "(" . $row['form'] . ")";
            }
        }
    }
}
