<?php
$id = $_POST['id'];
$accId = $_POST['accId'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="content-title-delete">Are you sure want to remove this coordinator account?</div>
<button id="delete-submit">OK</button>

<script>
    $(document).ready(function() {
        var selectedId = '<?php echo $id; ?>';
        var accountId = '<?php echo $accId; ?>';
        $("#delete-submit").click(function() {
            $.ajax({
                url: "../ajax/coordinatorDelete.php",
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