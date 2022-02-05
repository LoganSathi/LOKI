<?php
include_once '../controller/cronjob.controller.php';
$cronController = new CronController();

$today = date('Y-m-d');

$isSchool = $cronController->isSchool($today);

if ($isSchool) {
    $warningArr = $cronController->fetchWarningException($today);
    $studentList = $cronController->fetchStudentList();
    if ($studentList) {
        foreach ($studentList as $row) {
            $id = $row['id'];
            if (binarySearch($warningArr, $id) == false) {
                $cronController->incrementAbsentDays($id);
            }
        }
    }
}

function binarySearch(array $arr, $x)
{
    // check for empty array
    if (count($arr) === 0) return false;
    $low = 0;
    $high = count($arr) - 1;

    while ($low <= $high) {

        // compute middle index
        $mid = floor(($low + $high) / 2);

        // element found at mid
        if ($arr[$mid]['student_id'] == $x) {
            return true;
        }

        if ($x < $arr[$mid]['student_id']) {
            // search the left side of the array
            $high = $mid - 1;
        } else {
            // search the right side of the array
            $low = $mid + 1;
        }
    }

    // If we reach here element x doesnt exist
    return false;
}
