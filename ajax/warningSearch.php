<?php
include_once '../view/warning.view.php';
$warningView = new WarningView();

if (isset($_REQUEST["form"])) {
    $result = $warningView->fetchClass($_REQUEST["form"]);
    echo "<option value='' selected disable hidden>Choose Class</option>";
    if ($result) {
        foreach ($result as $row) {
            $class_name = $row['name'];
            $class_id = $row['id'];
            echo "<option value=\"$class_id\">$class_name</option>";
        }
    }
} else if (isset($_REQUEST["class"])) {
    $result = $warningView->fetchStudents($_REQUEST["class"]);
    echo "<option value='' selected disable hidden>Choose Student</option>";
    if ($result) {
        foreach ($result as $row) {
            $student_name = $row['name'];
            $student_id = $row['id'];
            echo "<option value=\"$student_id\">$student_name</option>";
        }
    }
}
