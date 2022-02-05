<?php
$id = $_POST['id'];

include_once '../view/class.view.php';
$classView = new ClassView();

$amount = $classView->fetchAmount($id);
if ($amount) {
    echo "<div id='logo-warning' class='las la-exclamation-triangle animate__animated animate__swing'></div>";
    echo "<div id='content-title-delete' class='animate__animated animate__heartBeat'><span class='red sorry'>Sorry!</span> You can't remove this class.</div>";
    echo "<div id='content-body-delete' class='animate__animated animate__slideInUp'>There are $amount students in this class</div>";
    echo "<div id='content-body-delete' class='animate__animated animate__slideInUp'>Please assign the students to different class before deleting the class</div>";
} else {
    echo "<div id='content-title-delete-now'>Are you sure want to remove this class?</div>";
    echo "<button id='delete-submit'>OK</button>";
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        var selectedId = '<?php echo $id; ?>';
        $("#delete-submit").click(function() {
            $.ajax({
                url: "../ajax/classDelete.php",
                method: "POST",
                data: {
                    id: selectedId
                },
                success: function(data) {
                    $("#" + selectedId + "-row").fadeOut(function() {
                        $(this).remove();
                    });
                    $('#popup-1').toggleClass('active');
                    $.ajax({
                        url: "../ajax/classTeacherUpdate.php",
                        success: function(update) {
                            $("#teacher").html(update);
                        }
                    });
                }
            });
        });
    });
</script>