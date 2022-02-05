<?php
include_once 'nav.php';
include_once '../access/reset.access.php';
?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="../css/reset.css">

<title>Reset</title>

<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn">&times;</div>
        <div id="content-body">
        </div>
    </div>
</div>

<div id="outer">
    <div id="reset-box" class="animate__animated animate__fadeInUp">
        <div id="title" class="animate__animated animate__fadeInUp">Reset</div>
        <div id="upper">
            <div id="recommended" class="animate__animated animate__bounceIn">Recommended</div>
        </div>
        <div id="lower">
            <div id="recommended-border">
                <button id='partial' class="animate__animated animate__fadeInUp" value='partial'>Partial Reset</button>
            </div>
            <button id='total' class="animate__animated animate__fadeInUp" value='total'>Total Reset</button>
        </div>
        <div id="success">Successful Reset</div>
    </div>
</div>

</body>

<script>
    $(document).ready(function() {
        $("#partial").click(function() {
            var reset_type = $(this).val();
            $.ajax({
                url: "../ajax/resetForm.php",
                method: "POST",
                data: {
                    resetType: reset_type
                },
                success: function(data) {
                    $('#content-body').html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $("#total").click(function() {
            var reset_type = $(this).val();
            $.ajax({
                url: "../ajax/resetForm.php",
                method: "POST",
                data: {
                    resetType: reset_type
                },
                success: function(data) {
                    $('#content-body').html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $('.close-btn').click(function() {
            $('#popup-1').toggleClass('active');
        });
    });
</script>