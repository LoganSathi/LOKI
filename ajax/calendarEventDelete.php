<?php
include_once '../view/calendar.view.php';
include_once '../controller/calendar.controller.php';
$calendaView = new CalendarView();
$calendarController = new CalendarController();

$id = $_GET['id'];

$calendarController->removeEvent($id);
