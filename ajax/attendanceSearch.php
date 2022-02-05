<?php
include_once '../view/attendance.view.php';
$attendanceView = new AttendanceView();

if (isset($_REQUEST["form"])) {
    $result = $attendanceView->fetchClass($_REQUEST["form"]);
    echo "<option value='' selected disable hidden>Choose Class</option>";
    if ($result) {
        foreach ($result as $row) {
            $class_name = $row['name'];
            $class_id = $row['id'];
            echo "<option value=\"$class_id\">$class_name</option>";
        }
    }
} else if (isset($_REQUEST["class"])) {
    $teacher = $attendanceView->fetchTeacher($_REQUEST["class"]);
    echo "<span id='teacher-label' class='animate__animated animate__fadeInRight'>Class Teacher Name:</span><span id='class-teacher' class='animate__animated animate__fadeInRight'>$teacher</span>";
}
