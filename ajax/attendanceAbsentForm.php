<?php
include_once '../view/attendance.view.php';
$attendanceView = new AttendanceView();

$id = $_POST['id'];
$reason = $attendanceView->fetchAbsent($id);
?>

<div id="edit-div">
    <div id="edit-title">Absent Reason</div>
    <div id="edit-reason-div">
        <input type="text" id="edit-reason" value="<?php echo $reason; ?>">
    </div>
    <button id='edit-submit'>Save Changes</button>
    <div id="edit-success">Successfully Updated</div>
</div>

<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#edit-submit").click(function() {
            var selectedId = <?php echo $id; ?>;
            var reasonNew = $("#edit-reason").val();
            $.ajax({
                url: "../ajax/attendanceAbsent.php",
                method: "POST",
                data: {
                    id: selectedId,
                    reason: reasonNew
                },
                success: function(result) {
                    $("#reason-" + selectedId).html(reasonNew);
                    if (reasonNew) {
                        $("#reason-" + selectedId).css('background', '#fff897');
                    } else {
                        $("#reason-" + selectedId).css('background', '#ff726f');
                    }
                    $('#edit-success').fadeIn(1000).delay(3000).fadeOut(1000);
                }
            });
        });
    });
</script>