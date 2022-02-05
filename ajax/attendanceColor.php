<?php
include_once '../view/attendance.view.php';
$attendanceView = new AttendanceView();

$id = $_POST['id'];

$reason = $attendanceView->fetchAbsent($id);
if ($reason) {
    echo '#fff897';
} else {
    echo '#ff726f';
}
