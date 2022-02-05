<?php
include_once '../model/warning.model.php';

class WarningView extends WarningModel
{
    public function fetchList()
    {
        return $this->getList();
    }

    public function fetchListException()
    {
        return $this->getListException();
    }

    public function fetchException($id)
    {
        return $this->getException($id);
    }

    public function fetchClass($form)
    {
        return $this->getClass($form);
    }

    public function fetchStudents($class)
    {
        return $this->getStudents($class);
    }

    public function fetchFileType($id)
    {
        $result = $this->getFileType($id);
        if ($result) {
            foreach ($result as $row) {
                return $row['file_type'];
            }
        }
    }
}
