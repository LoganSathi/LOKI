<?php
$resetType = $_POST['resetType'];

if ($resetType == 'partial') {
    $title = "Partial Reset";
    $consent = "<div>1) Partial Reset will erase the folowing records:<div id='list-div'><ul id='list'><li>Students</li><li>Parents</li><li>Attendance</li><li>Classes</li></ul></div>2) It is recommended to do a backup before the reset.</div>";
} else {
    $title = "Total Reset";
    $consent = "<div>1) Total Reset will erase the folowing records:<div id='list-div'><ul id='list'><li>Students</li><li>Parents</li><li>Attendance</li><li>Classes</li><li>Warning Letters</li><li>Warning Exceptions</li><li>Calendar Events</li><li>Academic Calendar</li><li>Teachers</li><li>Coordinators</li></ul></div>2) It is recommended to do a backup before the reset.<br>3) Please be informed that only the admin's account details will be retained.</div>";
}
?>

<div id="reset-wrapper">
    <div id="reset-header">
        <div id="popup-title"><?php echo $title; ?> - <span id="sub-title">Consent Form<span></div>
        <div id="logo" class='las la-exclamation-triangle'></div>
    </div>
    <div id="consent-box">
        <div id="consent-body">
            <?php
            echo $consent;
            ?>
        </div>
        <div id="agree-div">
            <input type="checkbox" id="agreed" value='agree'>I have read the consent form and I'm fully aware of the consequences of the reset
        </div>
        <div id="reset-button-div">
            <button id="reset-submit">Reset</button>
        </div>
    </div>
</div>

<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function() {
        $("#reset-submit").click(function() {
            var type = '<?php echo $resetType; ?>';
            var agreed = $('#agreed').is(":checked");
            if (agreed) {
                $.ajax({
                    url: "../ajax/resetNow.php",
                    method: "POST",
                    data: {
                        resetType: type
                    },
                    success: function(data) {
                        $('#success').fadeIn(1000).delay(3000).fadeOut(1000);
                    }
                });
                $('#popup-1').toggleClass('active');
            } else {
                $("#agree-div").effect("shake", {
                    times: 2,
                    distance: 5
                }, 500);
            }
        });
    });
</script>