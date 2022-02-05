<?php

include_once '../view/analysis.view.php';
$analysisView = new AnalysisView();

$selectedPeriod = $_POST["selectedPeriod"];
$periodType = $_POST["periodType"];

$statement = $selectedPeriod . '%';

/* $result = $analysisView->fetchGroups();
$forms_arr = array();
if ($result) {
    foreach ($result as $row) {
        array_push($forms_arr, $row['form']);
    }
}

for ($i = 0; $i < sizeof($forms_arr); $i++) {
    $curr_form = $forms_arr[$i];
    $result = $analysisView->groupPercentage($statement, $forms_arr[$i]);
    if ($result) {
        foreach ($result as $row) {
            $total = $row['total'];
            if ($total) {
                echo "<div id='bar'><div id='space' style='width:$total%'><div id='progress-bar'></div></div></div><div id='form'>$curr_form</div><div id='total'>$total%</div>";
            } else {
                echo "<div id='bar'><div id='space' style='width:0%'></div></div><div id='form'>$curr_form</div><div id='total'>0%</div>";
            }
            echo "<a href=\"analysis-class.php?selectedPeriod=$selectedPeriod&periodType=$periodType&form=$curr_form\">VIEW CLASSES</a>";
        }
    }
} */
?>
<div id="form-percentage-id">
    <?php
    $result = $analysisView->fetchGroups();
    $forms_arr = array();
    if ($result) {
        foreach ($result as $row) {
            array_push($forms_arr, $row['form']);
        }
    }

    for ($i = 0; $i < sizeof($forms_arr); $i++) {
        $curr_form = $forms_arr[$i];
        $result = $analysisView->groupPercentage($statement . '%', $forms_arr[$i]);
        if ($result) {
            foreach ($result as $row) {
                $total = $row['total'];
                if ($total) {
                    echo "<a href=\"analysis-class.php?selectedPeriod=$selectedPeriod&periodType=$periodType&form=$curr_form\" class='bar'><div id='space' style='width:$total%'><div id='progress-bar'></div></div><div id='form'>$curr_form</div><div id='total'>$total%</div></a>";
                } else {
                    echo "<a href=\"analysis-class.php?selectedPeriod=$selectedPeriod&periodType=$periodType&form=$curr_form\" class='bar'><div id='space' style='width:0%'></div><div id='form'>$curr_form</div><div id='total'>0%</div></a>";
                }
                /* echo "<div id='view-div'><a href=\"analysis-class.php?selectedPeriod=$currentDate&periodType=daily&form=$curr_form\" class='view-button' id='view-$i'>VIEW CLASSES</a></div>"; */
            }
        }
    }
    ?>
</div>