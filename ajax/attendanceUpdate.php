<?php
include_once '../controller/attendance.controller.php';
$attendanceController = new AttendanceController();

$idArr = $_POST['idArr'];
$valArr = $_POST['valArr'];

for ($i = 0; $i < sizeof($valArr); $i++) {
    $attendanceController->updateAttendance($valArr[$i], $idArr[$i]);
    if ($valArr[$i] == 1) {
        $attendanceController->removeAbsent($idArr[$i]);
    }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

    });
</script>