<?php
$id = $_POST['id'];
$name = $_POST['name'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="content-title-delete">Are you sure want to restore this backup?</div>
<button id="restore-submit">OK</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        var selectedId = '<?php echo $id; ?>';
        var selectedName = '<?php echo $name; ?>';
        $("#restore-submit").click(function() {
            $.ajax({
                url: "../ajax/backupRestore.php",
                method: "POST",
                data: {
                    id: selectedId,
                    name: selectedName
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