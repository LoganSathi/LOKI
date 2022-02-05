<?php

$selectedPeriod = $_POST["selectedPeriod"];
$periodType = $_POST["periodType"];

$date = date_create($selectedPeriod);

if ($periodType == "daily") {
    echo date_format($date, "d F Y");
} elseif ($periodType == "monthly") {
    echo date_format($date, "F Y");
} elseif ($periodType == "yearly") {
    $date = date_create($selectedPeriod . "-01-01");
    echo date_format($date, "Y");
}
