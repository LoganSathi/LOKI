<?php

include_once '../controller/calendar.controller.php';
$calendarController = new CalendarController();

$dateArrChecked = $_GET['ArrDateChecked'];
$dateArrUnchecked = $_GET['ArrDateUnchecked'];
$month = $_GET['month'];
$year = $_GET['year'];

if ($dateArrChecked[0] == (-1)) {
    array_pop($dateArrChecked);
}

if ($dateArrUnchecked[0] == (-1)) {
    array_pop($dateArrUnchecked);
}

if (!empty($dateArrChecked)) {
    $oper = 'insert';
    $calendarController->updateCalendar($oper, $dateArrChecked, $month, $year);
}

if (!empty($dateArrUnchecked)) {
    $oper = 'remove';
    $calendarController->updateCalendar($oper, $dateArrUnchecked, $month, $year);
}
