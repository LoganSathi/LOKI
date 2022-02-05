<?php
include_once '../view/attendance.view.php';
$attendanceView = new AttendanceView();

$form = $_POST['form'];
$selectedClass = '';
if (isset($_POST['class'])) {
    $selectedClass = $_POST['class'];
}
$result = $attendanceView->fetchClass($form);
if ($result) {
    foreach ($result as $row) {
        $class_name = $row['name'];
        $class_id = $row['id'];
        if ($selectedClass == $class_id) {
            echo "<option value=\"$class_id\" selected>$class_name</option>";
        } else {
            echo "<option value=\"$class_id\">$class_name</option>";
        }
    }
}
