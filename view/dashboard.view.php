<?php
include_once '../model/dashboard.model.php';

class DashboardView extends DashboardModel
{
    public function schoolPercentage($date)
    {
        $result = $this->calcSchoolPerc($date);
        if ($result) {
            foreach ($result as $row) {
                return $row['total'];
            }
        }
    }

    public function fetchCalendar($month, $year)
    {
        return $this->getCalendar($month, $year);
    }

    public function fetchEvents($month, $year)
    {
        return $this->getEvents($month, $year);
    }

    public function fetchGroups()
    {
        return $this->getGroups();
    }

    public function groupPercentage($statement, $form)
    {
        $result = $this->calcGroupPerc($statement, $form);
        if ($result) {
            foreach ($result as $row) {
                return $row['total'];
            }
        }
    }
}
