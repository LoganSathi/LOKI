<?php

include_once '../model/warning.model.php';

class WarningController extends WarningModel
{
    public function addException($id, $start, $end, $desc)
    {
        return $this->insertException($id, $start, $end, $desc);
    }

    public function removeWarning($id)
    {
        $this->deleteWarning($id);
    }

    public function removeWarningException($id)
    {
        $this->deleteWarningException($id);
    }

    public function addFileType($extension, $lastId)
    {
        $this->insertFileType($extension, $lastId);
    }

    public function editException($extension, $desc, $id)
    {
        $this->updateException($extension, $desc, $id);
    }
}
