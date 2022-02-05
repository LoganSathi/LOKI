<?php
include_once '../controller/calendar.controller.php';
include_once '../view/calendar.view.php';
$calendarController = new CalendarController();
$calendarView = new CalendarView();

$date = $_GET['date'];
$dateTemp = date_create($date);
$dateFormat = date_format($dateTemp, "d M Y");
$title = $_GET['title'];

$id = $calendarController->addEvent($date, $title);
/* echo "<div id='event-div'><div id='event-date'>$dateFormat</div><div id='event-title'>$title</div><div id='event-crud-div'><button class='event-edit' value='$id'>Edit</button><button class='event-delete' value='$id'>Delete</button></div></div>"; */
echo "<div class='event-div animate__animated animate__fadeInRight' id='$id-div'><div class='event-date' id='date-$id'>$dateFormat</div><div class='event-title' id='title-$id'>$title</div><div id='event-crud-div'><button class='event-edit' id='edit-$id' value='$id*$dateFormat*$title'></button><button class='event-delete' id='delete-$id' value='$id'></button></div></div>";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var currentId = "<?php echo $id; ?>";
        $("#delete-" + currentId).click(function() {
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

        $("#edit-" + currentId).click(function() {
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