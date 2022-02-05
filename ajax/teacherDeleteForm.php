<?php
$id = $_POST['id'];
$accId = $_POST['accId'];

include_once '../view/teacher.view.php';
$teacherView = new TeacherView();

$result = $teacherView->fetchType($accId);
if ($result) {
    foreach ($result as $row) {
        if ($row['type'] == 'Class Teacher') {
            $className = $teacherView->fetchClass($id);
            echo "<div id='logo-warning' class='las la-exclamation-triangle animate__animated animate__swing'></div>";
            echo "<div id='content-title-delete' class='animate__animated animate__heartBeat'><span class='red sorry'>Sorry!</span> You can't remove this teacher.</div>";
            echo "<div id='content-body-delete' class='animate__animated animate__slideInUp'>This teacher is assigned as a Class Teacher.</div>";
            echo "<div id='content-body-delete' class='animate__animated animate__slideInUp'>Please assign a different class teacher to <b id='emphasize'>$className</b></div>";
        } else {
            echo "<div id='content-title-delete-now'>Are you sure want to remove this teacher account?</div>";
            echo "<button id='delete-submit'>OK</button>";
        }
    }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        var selectedId = '<?php echo $id; ?>';
        var accountId = '<?php echo $accId; ?>';
        $("#delete-submit").click(function() {
            $.ajax({
                url: "../ajax/teacherDelete.php",
                method: "POST",
                data: {
                    id: selectedId,
                    accId: accountId
                },
                success: function(data) {
                    $("#" + selectedId + "-row").fadeOut(function() {
                        $(this).remove();
                    });
                    $('#popup-1').toggleClass('active');
                }
            });
        });
    });
</script>