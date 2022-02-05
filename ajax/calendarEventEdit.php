<?php
include_once '../controller/calendar.controller.php';
$calendarController = new CalendarController();

$id = $_GET['id'];
$title = $_GET['title'];

$calendarController->editEvent($id, $title);
echo $title;
