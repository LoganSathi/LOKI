<?php
$result = $studentView->fetchClassStudents($class);
if ($result) {
    $studentid_arr = array();
    $studentname_arr = array();
    foreach ($result as $row) {
        array_push($studentid_arr, $row['id']);
        array_push($studentname_arr, $row['name']);
    }
}
?>
<link rel="stylesheet" href="../css/qr-popup.css">

<div class="popup-qr" id="popup-qr">
    <div class="overlay-qr"></div>
    <form action="qrform2.php" method="post" class="content-qr">
        <div class="close-btn-qr">&times;</div>
        <div id="qr-popup-title">Choose Students</div>
        <div id="checkAll-div"><input type="checkbox" id="checkAll">Select All</div>
        <div id="student-list-qr">
            <div>
                <?php
                if (!empty($studentid_arr)) {
                    for ($i = 0; $i < sizeof($studentid_arr); $i++) {
                        echo "<div class='student-name-qr'><input type='checkbox' name='selectedQR[]' id='selectedQR' value='$studentid_arr[$i]'></div>";
                    }
                }
                ?>
            </div>
            <div id="label-div-qr">
                <?php
                if (!empty($studentname_arr)) {
                    for ($i = 0; $i < sizeof($studentname_arr); $i++) {
                        echo "<div class='student-label-qr'>$studentname_arr[$i]</div>";
                    }
                }
                ?>
            </div>
        </div>
        <input type="submit" value="Submit" name="helo" id="qr-submit">
    </form>
</div>
<button id="generateqr" class="animate__animated animate__bounceIn">Qr Codes</button>

<script>
    $(document).ready(function() {
        $('#generateqr').click(function() {
            $('#popup-qr').toggleClass('active');
        });
        $('.close-btn-qr').click(function() {
            $('#popup-qr').toggleClass('active');
        });

        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    });
</script>

</html>