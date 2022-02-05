<?php

$periodType = $_POST["periodType"];
$monthCurr = date("m");

if ($periodType == "daily") {

    echo "<input type=\"date\" name=\"\" id=\"periodical-input-type-id\" value=\"" . date("Y-m-d") . "\">";
} elseif ($periodType == "monthly") {

    echo "<input type=\"month\" name\"\" id=\"periodical-input-type-id\" value=\"" . date("Y-m") . "\">";
} elseif ($periodType == "yearly") {

    echo "<select name=\"year_name\" id=\"periodical-input-type-id\">";

    $yearCurr = date("Y");
    $yearArr = array($yearCurr - 1, $yearCurr, $yearCurr + 1, $yearCurr + 2);

    for ($i = 0; $i < 4; $i++) {
        if ($yearCurr == $yearArr[$i]) {
            echo "<option value\" $yearArr[$i]\" selected=\"selected\"> $yearArr[$i]</option>";
        } else {
            echo "<option value\" $yearArr[$i]\"> $yearArr[$i]</option>";
        }
    }

    echo "</select>";
}
