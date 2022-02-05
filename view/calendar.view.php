<?php
include_once '../model/calendar.model.php';

class CalendarView extends CalendarModel
{
    public function fetchSelectedDate($month, $year)
    {
        return $this->getSelectedDate($month, $year);
    }

    public function fetchEvents($month, $year)
    {
        return $this->getEvents($month, $year);
    }
}
