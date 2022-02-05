<?php
include_once '../model/calendar.model.php';

class CalendarController extends CalendarModel
{
    public function updateCalendar($oper, $dateArr, $month, $year)
    {
        if ($oper == 'insert') {
            $this->insertDates($dateArr, $month, $year);
            $this->insertForcast($dateArr, $month, $year);
        }
        if ($oper == 'remove') {
            $this->removeDates($dateArr, $month, $year);
            $this->removeForcast($dateArr, $month, $year);
        }
    }

    public function addEvent($date, $title)
    {
        return $this->insertEvent($date, $title);
    }

    public function editEvent($id, $title)
    {
        $this->updateEvent($id, $title);
    }

    public function removeEvent($id)
    {
        $this->deleteEvent($id);
    }
}
