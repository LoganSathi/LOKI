<?php
$id = $_GET['id'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="content-title-delete">Are you sure want to remove this event?</div>
<button id="delete-submit">OK</button>

<script>
    $(document).ready(function() {
        var selectedId = '<?php echo $id; ?>';
        $("#delete-submit").click(function() {
            $.ajax({
                url: "../ajax/calendarEventDelete.php",
                method: "GET",
                data: {
                    id: selectedId
                },
                success: function(data) {
                    $("#" + selectedId + "-div").fadeOut(function() {
                        $(this).remove();
                    });
                    $('#popup-1').toggleClass('active');
                }
            });
        });
    });
</script>