<?php

include_once '../view/calendar.view.php';
$calendarView = new CalendarView();

$month = $_GET['month'];
$year = $_GET['year'];


$result = $calendarView->fetchSelectedDate($month, $year);
$data = array();
if ($result) {
    foreach ($result as $row) {
        array_push($data, $row['date']);
    }
}
$d = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$startDay = date("D", mktime(0, 0, 0, $month, 1, $year));
echo "<tr>";
$space;
if ($startDay == 'Sun') {
    $space = 0;
} elseif ($startDay == 'Mon') {
    $space = 1;
} elseif ($startDay == 'Tue') {
    $space = 2;
} elseif ($startDay == 'Wed') {
    $space = 3;
} elseif ($startDay == 'Thu') {
    $space = 4;
} elseif ($startDay == 'Fri') {
    $space = 5;
} elseif ($startDay == 'Sat') {
    $space = 6;
}
$dateVal = 0;
$totalCell = $d + $space + (ceil(($d + $space) / 7) * 7 - ($d + $space));
for ($i = 0; $i < $totalCell; $i++) {
    if ($space > 0) {
        echo "<td><div class='parent empty animate__animated animate__bounceIn'><div class=\"child\"></div></div></td>";
        $space = $space - 1;
    } elseif ($space <= 0 && $dateVal < $d) {
        $dateVal = $dateVal + 1;

        if (in_array($dateVal, $data)) {
            echo "<td><div class=\"parent animate__animated animate__bounceIn\">
                        <div class=\"child\">
                        <div id='child-upper'><input type=\"checkbox\" id=\"date\" class=\"check\" name=\"date[]\" value=\"$dateVal\" checked=\"checked\">
                        <div class=\"child-label\">$dateVal</div></div><div id='child-lower'><button class='add-event' value='$dateVal'></button></div></div>
                        </div></td>";
        } else {
            echo "<td><div class=\"parent animate__animated animate__bounceIn\">
                        <div class=\"child\">
                        <div id='child-upper'><input type=\"checkbox\" id=\"date\" class=\"check\" name=\"date[]\" value=\"$dateVal\">
                        <div class=\"child-label\">$dateVal</div></div><div id='child-lower'><button class='add-event' value='$dateVal'></button></div></div>
                        </div></td>";
        }
    } else {
        echo "<td><div class='parent empty animate__animated animate__bounceIn'><div class=\"child\"></div></div></td>";
    }

    if (($i + 1) % 7 == 0) {
        echo "</tr><tr>";
    }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.parent').css('animation-delay', '0.2s');
        $('.add-event').click(function() {
            selectedPeriod = $("#date-picker").val();
            var tempArr = selectedPeriod.split("-");
            var selectedYear = tempArr[0];
            var selectedMonth = tempArr[1];
            var selectedDay = $(this).val();
            var selectedDate = selectedYear + "-" + selectedMonth + "-" + selectedDay;
            $.ajax({
                url: "../ajax/calendarEventForm.php",
                method: "GET",
                data: {
                    date: selectedDate
                },
                success: function(data) {
                    $('#content-body').html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });
    });
</script>