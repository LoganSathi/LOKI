<?php
include_once '../view/dashboard.view.php';
$dashboardView = new dashboardView();
$month = date('m');
$year = date('Y');
$result = $dashboardView->fetchCalendar($month, $year);
$data = array();
if ($result) {
    foreach ($result as $row) {
        array_push($data, $row['date']);
    }
}
?>

<table id="calendar-table" class="animate__animated animate__fadeInUp">
    <thead>
        <tr>
            <td>
                <div class="days-head">
                    <div class='days'>Sun</div>
                </div>
            </td>
            <td>
                <div class="days-head">
                    <div class='days'>Mon</div>
                </div>
            </td>
            <td>
                <div class="days-head">
                    <div class='days'>Tue</div>
                </div>
            </td>
            <td>
                <div class="days-head">
                    <div class='days'>Wed</div>
                </div>
            </td>
            <td>
                <div class="days-head">
                    <div class='days'>Thu</div>
                </div>
            </td>
            <td>
                <div class="days-head">
                    <div class='days'>Fri</div>
                </div>
            </td>
            <td>
                <div class="days-head">
                    <div class='days'>Sat</div>
                </div>
            </td>
        </tr>
    </thead>
    <tbody id="table-body">
        <?php
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
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
        $totalCell = $daysInMonth + $space + (ceil(($daysInMonth + $space) / 7) * 7 - ($daysInMonth + $space));
        for ($i = 0; $i < $totalCell; $i++) {
            if ($space > 0) {
                echo "<td><div class=\"child\"></div></td>";
                $space = $space - 1;
            } elseif ($space <= 0 && $dateVal < $daysInMonth) {
                $dateVal = $dateVal + 1;

                if (in_array($dateVal, $data)) {
                    echo "<td><div class='school-day'>$dateVal</div></td>";
                } else {
                    echo "<td><div class='holiday'>$dateVal</div></td>";
                }
            } else {
                echo "<td><div class=\"child\"></div></td>";
            }

            if (($i + 1) % 7 == 0
            ) {
                echo "</tr><tr>";
            }
        }
        ?>
    </tbody>
</table>

<div id="detail-div" class="animate__animated animate__fadeInUp">
    <?php
    $result = $dashboardView->fetchEvents($month, $year);
    if ($result) {
        foreach ($result as $row) {
            $eventId = $row['id'];
            $eventTitle = $row['title'];
            $eventDate = $row['date'];
            echo "<div class='event-div animate__animated animate__flipInX'><div class='event-date'>$eventDate</div><div class='event-title'>$eventTitle</div></div>";
        }
    }
    ?>
</div>