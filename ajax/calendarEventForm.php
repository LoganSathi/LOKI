<?php
$date = $_GET['date'];
$dateTemp = date_create($date);
$dateFormat = date_format($dateTemp, "d M Y");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="content-title">Add Event</div>
<div class="input-div-date">
    <div id="date-div"><?php echo $dateFormat ?></div>
</div>
<div class="input-div">
    <input type="text" id="event-add-title" placeholder="Title">
</div>
<button id="add-submit">Save</button>
<div id="add-error"></div>

<script>
    $(document).ready(function() {
        $("#add-submit").click(function() {
            $("#edit-error").html("");
            if (!$("#event-add-title").val()) {
                $('#add-error').html('Please enter an event title');
                $('#add-error').fadeIn(1000);
            } else {
                var Title = $("#event-add-title").val();
                var dateSelected = '<?php echo $date; ?>';
                $.ajax({
                    url: "../ajax/calendarEventAdd.php",
                    method: "GET",
                    data: {
                        title: Title,
                        date: dateSelected
                    },
                    success: function(data) {
                        $('#detail-div').prepend(data);
                    }
                });
                $('#popup-1').toggleClass('active');
            }
        });
    });
</script>