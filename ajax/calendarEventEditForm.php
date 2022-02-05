<?php
$id = $_GET['id'];
$date = $_GET['date'];
$title = $_GET['title'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="content-title">Edit Event</div>
<div class="input-div-date">
    <div id="date-div"><?php echo $date ?></div>
</div>
<div class="input-div">
    <input type="text" id="event-edit-title" value="<?php echo $title ?>" placeholder='Title'>
</div>
<button id="edit-submit">Save</button>
<div id="edit-error"></div>

<script>
    $(document).ready(function() {
        var selectedId = '<?php echo $id ?>';
        var selectedDate = '<?php echo $date ?>';
        $("#edit-submit").click(function() {
            $("#edit-error").html("");
            if (!$("#event-edit-title").val()) {
                $('#edit-error').html('Please enter an event title');
                $('#edit-error').fadeIn(1000);
            } else {
                var newTitle = $("#event-edit-title").val();
                $.ajax({
                    url: "../ajax/calendarEventEdit.php",
                    method: "GET",
                    data: {
                        id: selectedId,
                        title: newTitle
                    },
                    success: function(data) {
                        $('#title-' + selectedId).html(data);
                        var newValue = selectedId + "*" + selectedDate + "*" + newTitle;
                        $("#edit-" + selectedId).attr('value', newValue)
                        $('#popup-1').toggleClass('active');
                    }
                });
            }
        });
    });
</script>