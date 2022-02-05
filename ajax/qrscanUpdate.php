<?php
include_once '../view/qrscan.view.php';
include_once '../controller/qrscan.controller.php';
$qrscanView = new QrscanView();
$qrscanController = new QrscanController();

$id = $_POST['id'];
$date = $_POST['date'];

if ($id && $date) {
    $checkDate = $qrscanView->checkDate($date);
    if ($checkDate) {
        $result = $qrscanView->fetchStudent($id);
        if ($result) {
            foreach ($result as $row) {
                $checkAttendance = $qrscanView->checkAttendance($id, $date);
                if ($checkAttendance) {
                    echo "<div id='student'>This student has already scanned</div>";
                } else {
                    $qrscanController->scanAttendance($id, $date);
                    $qrscanController->editAbsent($id);
                    $name = $row['name'];
                    echo "<div id='student'>$name</div>";
                }
            }
        } else {
            echo "<div id='student'>The system is unable to recognise the QR Code</div>";
        }
    } else {
        echo "<div id='student'>Admin has set today as holiday</div>";
    }
}
