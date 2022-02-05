<?php
$id = $_GET['id'];
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div id="content-delete-title">Are you sure want to remove this warning letter?</div>
<button id="delete-submit">OK</button>

<script>
    $(document).ready(function() {
        var selectedId = '<?php echo $id; ?>';
        $("#delete-submit").click(function() {
            $.ajax({
                url: "../ajax/warningDelete.php",
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