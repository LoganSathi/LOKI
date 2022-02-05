<?php
$id = $_GET['id'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="content-delete-title">Are you sure want to remove this warning exception?</div>
<button id="delete-exception-submit">OK</button>

<script>
    $(document).ready(function() {
        var selectedId = '<?php echo $id; ?>';
        $("#delete-exception-submit").click(function() {
            $.ajax({
                url: "../ajax/warningExceptionDelete.php",
                method: "GET",
                data: {
                    id: selectedId
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