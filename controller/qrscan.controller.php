<?php
include_once '../model/qrscan.model.php';

class QrscanController extends QrscanModel
{
    public function scanAttendance($id, $date)
    {
        $this->updateAttendance($id, $date);
    }

    public function editAbsent($id)
    {
        $this->updateAbsent($id);
    }
}
