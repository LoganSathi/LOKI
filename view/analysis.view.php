<?php
include_once '../model/analysis.model.php';

class AnalysisView extends AnalysisModel
{
    //Analysis-Group
    public function schoolPercentage($statement)
    {
        return $this->calcSchoolPerc($statement);
    }

    public function fetchGroups()
    {
        return $this->getGroups();
    }

    public function groupPercentage($statement, $form)
    {
        return $this->calcGroupPerc($statement, $form);
    }

    //Analysis-Class
    public function fetchClasses($form)
    {
        return $this->getClasses($form);
    }

    public function classPercentage($id, $selectedPeriod)
    {
        return $this->calcClassPerc($id, $selectedPeriod);
    }

    public function fetchStudents($classId)
    {
        return $this->getStudents($classId);
    }

    public function studentPercentage($id, $selectedPeriod)
    {
        return $this->calcStudentPerc($id, $selectedPeriod);
    }

    public function fetchData()
    {
        return $this->getData();
    }

    public function fetchDay()
    {
        return $this->getDay();
    }
}
