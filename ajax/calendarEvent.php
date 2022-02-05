<?php
include_once '../view/calendar.view.php';
$calendarView = new CalendarView();

$month = $_GET['month'];
$year = $_GET['year'];

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
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
    });
</script>