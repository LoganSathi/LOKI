<?php
include 'nav.php';
include_once '../access/calendar.access.php';
include_once '../view/calendar.view.php';
$calendarView = new CalendarView();

$month = date('m');
$year = date('Y');
$result = $calendarView->fetchSelectedDate($month, $year);
$data = array();
if ($result) {
    foreach ($result as $row) {
        array_push($data, $row['date']);
    }
}
?>

<link rel="stylesheet" href="../css/calendar.css">
<link rel="stylesheet" href="../css/jqDatepicker.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/datepicker.css">
<title>Calendar</title>
<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn">&times;</div>
        <div id="content-body">
        </div>
    </div>
</div>
<div id="outer">
    <div id="wrapper-div">
        <div id="sub-wrapper-div1">
            <div class="animate__animated animate__fadeInUp" id="period-div">
                <input type="month" id="date-picker" value='<?php echo $year . "-" . $month ?>'>
                <button id="submit">Submit</button>
            </div>
            <div class="animate__animated animate__fadeInUp" id="calendar-wrapper-div">
                <table id="calendar-table">
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
                                echo "<td><div class='parent empty animate__animated animate__bounceIn'><div class=\"child\"></div></div></td>";
                                $space = $space - 1;
                            } elseif ($space <= 0 && $dateVal < $daysInMonth) {
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

                            if (($i + 1) % 7 == 0
                            ) {
                                echo "</tr><tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="save-button-div"><button id="save-button">Save</button></div>
            <div id="success">Successfully Updated</div>
        </div>
        <div id="sub-wrapper-div2">
            <div class="animate__animated animate__fadeInRight" id="detail-div">
                <?php
                $result = $calendarView->fetchEvents($month, $year);
                if ($result) {
                    foreach ($result as $row) {
                        $eventId = $row['id'];
                        $eventTitle = $row['title'];
                        $eventDate = $row['date'];
                        echo "<div class='event-div animate__animated animate__flipInX' id='$eventId-div'><div class='event-date' id='date-$eventId'>$eventDate</div><div class='event-title' id='title-$eventId'>$eventTitle</div><div id='event-crud-div'><button class='event-edit' id='edit-$eventId' value='$eventId*$eventDate*$eventTitle'></button><button class='event-delete' value='$eventId'></button></div></div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    $(document).ready(function() {
        $("#submit").click(function() {
            selectedPeriod = $("#date-picker").val();
            var tempArr = selectedPeriod.split("-");
            var selectedYear = tempArr[0];
            var selectedMonth = tempArr[1];
            if (selectedYear && selectedMonth) {
                $.ajax({
                    url: "../ajax/calendarShow.php",
                    method: "GET",
                    data: {
                        month: selectedMonth,
                        year: selectedYear
                    },
                    success: function(data) {
                        $('#table-body').html(data);
                    }
                });

                $.ajax({
                    url: "../ajax/calendarEvent.php",
                    method: "GET",
                    data: {
                        month: selectedMonth,
                        year: selectedYear
                    },
                    success: function(data) {
                        $('#detail-div').html(data);
                    }
                });
            }
        });

        $(".event-delete").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/calendarEventDeleteForm.php",
                method: "GET",
                data: {
                    id: selectedId
                },
                success: function(data) {
                    $('#content-body').html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $(".event-edit").click(function() {
            selectedPeriod = $(this).val();
            var tempArr = selectedPeriod.split("*");
            var selectedId = tempArr[0];
            var selectedDate = tempArr[1];
            var selectedTitle = tempArr[2];
            $.ajax({
                url: "../ajax/calendarEventEditForm.php",
                method: "GET",
                data: {
                    id: selectedId,
                    date: selectedDate,
                    title: selectedTitle
                },
                success: function(data) {
                    $('#content-body').html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

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

        $('#save-button').click(function() {
            modified = 0;
            var dateArrChecked = [];
            var dateArrUnchecked = [];
            var month = $("#month").val();
            var year = $("#year").val();

            $('#date:checked').each(function(i) {
                dateArrChecked.push($(this).val());
            });

            if (dateArrChecked.length === 0) {
                dateArrChecked.push(-1);
            }

            $('#date:not(:checked)').each(function(i) {
                dateArrUnchecked.push($(this).val());
            });

            if (dateArrUnchecked.length === 0) {
                dateArrUnchecked.push(-1);
            }

            selectedPeriod = $("#date-picker").val();
            var tempArr = selectedPeriod.split("-");
            var selectedYear = tempArr[0];
            var selectedMonth = tempArr[1];

            $.ajax({
                url: "../ajax/calendarUpdate.php",
                method: "GET",
                data: {
                    ArrDateChecked: dateArrChecked,
                    ArrDateUnchecked: dateArrUnchecked,
                    month: selectedMonth,
                    year: selectedYear
                },
                success: function(data) {
                    $('#success').fadeIn(1000).delay(3000).fadeOut(1000);
                }
            });
            /* $("#submission").load("../ajax/calendarUpdate.php", {
                ArrDateChecked: dateArrChecked,
                ArrDateUnchecked: dateArrUnchecked,
                monthSel: month,
                yearSel: year
            }); */
        });

        $('.close-btn').click(function() {
            $('#popup-1').toggleClass('active');
        });
    });
</script>

</html>